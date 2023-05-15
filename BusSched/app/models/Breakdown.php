<?php

use WebSocket\Client;

require __DIR__ . '/../../vendor/autoload.php';

class Breakdown extends Model
{
    protected $table = 'breakdown';

    // editable columns
    protected $allowedColumns = [
        'id',
        'breakdown_time',
        'trip_no',
        'bus_no',
        'description',
        'status',
        'repaired_time',
        'time_to_repair'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        } else
            if (empty($data['description'])) {
                $this->errors['description'] = "Enter Description";
            } else
                if (empty($data['time_to_repair'])) {
                    $this->errors['time_to_repair'] = "Enter estimate time to repair";
                }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getBreakdowns()
    {
        return $this->where(['status' => "repairing"]);
    }

    public function getmyBreakdowns($busno)
    {
        return $this->where(['bus_no' => $busno]);
    }

    // repair breakdown
    /**
     * Updates breakdown status as repaired given the breakdown id
     * @param int $id
     * @return bool
     */
    public function repairBreakdown($id)
    {
        return $this->updateBreakdown($id, ['status' => "repaired", 'repaired_time' => date("Y-m-d H:i:s")]);
    }

    public function getConductorhistoryBreakdowns($busno)
    {
        return $this->where(['bus_no' => $busno]);
    }

    public function getConductorBreakdowns($conductor)
    {
        // return $this->findAll();
        $data['conductor'] = $conductor;
        // // show($data);
        $bus = new Bus();
        $breakdowns = $bus->join('breakdown', 'bus.bus_no', 'breakdown.bus_no', $data);
        return $breakdowns;
        // ->where(['Status' => "repairing"]);

        // return $this->where(['Status' => "repairing"],['conductor' => $conductor]);
    }

    // public function getConductorBreakdowns($conductor)
    // {
    //     $data['conductor'] = $conductor;
    //     return $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data)
    //                 ->where(['Status' => 'repairing', 'conductor' => $conductor])
    //                 ->findAll();
    // }
    
    public function getOwnerBreakdowns($owner, $status=null)
    {
        // return $this->findAll();
        $data['owner'] = $owner;
        // show($data);
        if (!$status) {
            $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data, 'breakdown.id, breakdown.breakdown_time, breakdown.trip_no, breakdown.bus_no, breakdown.description, breakdown.status, breakdown.repaired_time, breakdown.time_to_repair');
        }
        else if($status = 'repairing') {
            $data['status'] = $status;
            $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data, 'breakdown.id, breakdown.breakdown_time, breakdown.trip_no, breakdown.bus_no, breakdown.description, breakdown.status, breakdown.repaired_time, breakdown.time_to_repair');
//            $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data);
        }
        else {
            $data['status'] = $status;
            $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data, 'breakdown.id, breakdown.breakdown_time, breakdown.trip_no, breakdown.bus_no, breakdown.description, breakdown.status, breakdown.repaired_time, breakdown.time_to_repair');
//            $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data);
        }
        return $breakdowns;
    }


    /**
     * Summary of addBreakdown
     * @param array<array> $data
     * @param int $tripno
     * @return bool
     */
    public function addBreakdown($data, $tripno=null)
    {
        // validate and add
        // if ($this->validate($data)) {
        if (!$tripno) {
            return $this->insert(['bus_no' => $data['bus_no'], 'description' => $data['description'], 'time_to_repair' => $data['time_to_repair'], 'status' => 'repairing']);
        } else {
            return $this->insert(['bus_no' => $data['bus_no'], 'description' => $data['description'], 'time_to_repair' => $data['time_to_repair'], 'status' => 'repairing', 'trip_no' => $tripno]);
        }
        // }
        // return false;
    }

    public function deleteBreakdown($id)
    {
        return $this->delete($id);
    }


    public function updateBreakdown($id, $data)
    {
        return $this->update($id, ['status' => $data['status'], 'repaired_time' => $data['repaired_time']]);
    }

    public function updatemyBreakdown($id, $data)
    {
        return $this->update($id, ['description' => $data['description'], 'time_to_repair' => $data['time']]);
    }
    
    public function updateOwnerBreakdown($id, $data)
    {
        return $this->update($id, ['description' => $data['description'],'time_to_repair' => $data['time']]);
    }


    /**
     *Send notification to (all passengers of a trip if a trip exists), bus owner, conductor and all schedulers in the event of a breakdown
     * @param string $bus_no
     * @param numeric $trip_no
     */
    public function sendBreakdownNotification($bus_no, $trip_no = 0): void
    {
        $bus = (new Bus())->getBus($bus_no);
        if (!$bus) return;
        $owner = $bus->owner;
        $driver = $bus->driver;
        $conductor = $bus->conductor;

        if ($trip_no != 0) {
            //Send notification to all passengers
            $uNameList = (new Trip())->getPassengers($trip_no);
            if ($uNameList) {
                try {
                    $ws = new Client("ws://" . SOCKET_HOST . ":8080");
                    $ws->text(json_encode([
                        "event_type" => "breakdown",
                        "data" => [
                            "message" => "Bus " . $bus_no . " has broken down",
                        ],
                        "role" => ["passenger"],
                        "usernames" => $uNameList
                    ]));
                }catch (Exception $e){
                    //do nothing
                }
            }
        }
        try {//send notification to owner driver schedulers and conductor
            $ws = new Client("ws://" . SOCKET_HOST . ":8080");
            $ws->text(json_encode([
                "event_type" => "breakdown",
                "data" => [
                    "message" => "Bus " . $bus_no . " has broken down",
                ],
                "role" => ["scheduler"],
            ]));

            $ws = new Client("ws://" . SOCKET_HOST . ":8080");
            $ws->text(json_encode([
                "event_type" => "breakdown",
                "data" => [
                    "message" => "Bus " . $bus_no . " has broken down",
                ],
                "role" => ["driver"],
                "usernames" => [$driver]
            ]));

            $ws = new Client("ws://" . SOCKET_HOST . ":8080");
            $ws->text(json_encode([
                "event_type" => "breakdown",
                "data" => [
                    "message" => "Bus " . $bus_no . " has broken down",
                ],
                "role" => ["owner"],
                "usernames" => [$owner]
            ]));

            $ws = new Client("ws://" . SOCKET_HOST . ":8080");
            $ws->text(json_encode([
                "event_type" => "breakdown",
                "data" => [
                    "message" => "Bus " . $bus_no . " has broken down",
                ],
                "role" => ["conductor"],
                "usernames" => [$conductor]
            ]));
        } catch (Exception $e) {
            //do nothing
        }


    }

    /**
     *Send notification to (all passengers of a trip if a trip exists) in the event of a delay
     * @param numeric $trip_no
     * @param numeric $delay
     */
    public function sendDelayNotification($trip_no, $delay): void
    {
        $uNameList = (new Trip())->getPassengers($trip_no);
        if ($uNameList) {
            try {
                $ws = new Client("ws://" . SOCKET_HOST . ":8080");
                $ws->text(json_encode([
                    "event_type" => "delay",
                    "data" => [
                        "message" => "Trip " . $trip_no . " has been delayed by " . $delay . " minutes",
                    ],
                    "role" => ["passenger"],
                    "usernames" => $uNameList
                ]));
            }catch (Exception $e){
                //do nothing
            }
        }
    }

    /**
     *Send notification to passengers in the event of a refund
     * @param numeric $trip_no
     */
    public function sendRefundNotification($trip_no): void
    {
        $uNameList = (new Trip())->getPassengers($trip_no);
        if ($uNameList) {
            try {
                $ws = new Client("ws://" . SOCKET_HOST . ":8080");
                $ws->text(json_encode([
                    "event_type" => "refund",
                    "data" => [
                        "message" => "Your ticket for trip " . $trip_no . " has been refunded with points",
                    ],
                    "role" => ["passenger"],
                    "usernames" => $uNameList
                ]));
            }catch (Exception $e){
                //do nothing
            }
        }
    }

    /**
     *Decide whether to send a delay notification or a refund notification
     * @param numeric $trip_no
     * @param numeric $repairTime in minutes
     */
    public function breakdownDecision($trip_no,$repairTime):void{
        $gap = (new Trip())->findGapWithNextTrip($trip_no);
        if($gap/2 > 15){
            $factor = 15;
        }else{
            $factor = $gap/2;
        }
        if($repairTime < $factor){
            $this->sendDelayNotification($trip_no,$repairTime);
        }else{
            $this->sendRefundNotification($trip_no);
        }
    }

}