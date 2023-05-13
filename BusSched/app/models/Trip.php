<?php
use WebSocket\Client;

require __DIR__ . '/../../vendor/autoload.php';
class Trip extends Model
{
    protected $table = 'trip';

    // editable columns
    protected $allowedColumns = [
        'id',
        'trip_date',
        'departure_time',
        'starting_halt',
        'bus_no',
        'status',
        'last_updated_halt',
        'location_updated_time'

    ];

    // function to get all trips
    public function getTrips($n = 0)
    {
        if ($n == 0) {
            return $this->findAll();
        } else {
            return $this->findN($n);
        }
    }

    // function to get bus of a given bus
    public function getBusTrips($bus)
    {
        return $this->where(['bus_no' => $bus]);
    }

    // get trip by id
    public function getTrip($data)
    {
        return $this->first($data);
    }

    /**
     * @param number $trip_no
     * @return Object|false
     * Description: get Bus of a trip
     */
    public function getBus($trip_no): object|bool
    {
        $b = $this->getTrip(['id' => $trip_no]);
        if(!$b){
            return false;
        }
        return (new Bus())->first(['bus_no' => $b->bus_no]);
    }

    // update last_updated_halt and location_updated_time
    public function updateTripLocation($tripID, $location)
    {
        $data = ['last_updated_halt' => $location, 'location_updated_time' => date('Y-m-d H:i:s')];
        $this->update($tripID, $data);
    }

    // update trip
    public function updateTrip($id, $data)
    {
        return $this->update($id, ['status' => $data['status']]);
    }

    /**
     * @param number $tripID
     * @return array
     * Description: get passengers of a trip
     */
    public function getPassengers($tripID): array
    {
        //get trip data
        $tripdata = $this->getTrip(['id' => $tripID]);
        if (!$tripdata) {
            return [];
        }
        $bus = $tripdata->bus_no;
        $eTickets = (new E_ticket())->getTripBusTickets($bus);
        $userIDs = [];
        $pm = new Passenger();
        foreach ($eTickets as $eTicket) {
            $userIDs[] = $eTicket->passenger;
        }
        return $userIDs;
    }

    /**
     * @param number $tripID
     * Description: Send notification to passengers of a trip that it started
     */
    public function sendTripStartNotification($tripID):void{

        $tripdata = $this->getTrip(['id' => $tripID]);
        if (!$tripdata) {
            return;
        }
        $h=$tripdata->starting_halt;
        $passengers = $this->getPassengers($tripID);
        if ($passengers) {
            try {
                $ws = new Client("ws://" . SOCKET_HOST . ":8080");
                $ws->text(json_encode([
                    "event_type" => "trip-start",
                    "data" => [
                        "message" => 'Your bus just left ' . $h,
                    ],
                    "role" => ["passenger"],
                    "usernames" => $passengers
                ]));
            }catch (Exception $e){
                // show($e->getMessage());
            }
        }
    }

    // get tranferable trips
    public function getTransferableTrips($tripID, $seats=0)
    {
        $trip = $this->getTrip(['id' => $tripID]);
        // get date and time of trip
        $date = $trip->trip_date;
        $src = $trip->starting_halt;
        // $time = $trip->departure_time;

        // get trips on same date
        $trips = $this->where(['trip_date' => $date, 'status' => 'scheduled', 'starting_halt' => $src]);
        $transferableTrips = [];
        
        foreach ($trips as $t) {
            // if seats are specified, check if seats are available
            if ($seats == 0) {
                if ($t->id != $tripID) {
                    array_push($transferableTrips, $t);
                }
            } else {
                $ticket_seat = new Ticket_seats();
                $unreserved_seats = $ticket_seat->getUnreservedSeats($t->id);
                $t->unreserved_seats = $unreserved_seats;

                if($unreserved_seats >= $seats) {
                    array_push($transferableTrips, $t);
                } else {
                    continue;
                }
            }
        }
        return $transferableTrips;
    }

    // function to find gap between two trips
    /**
     * Find gap between two trips at departure
     * @param mixed $tripID1
     * @param mixed $tripID2
     * @return int
     */
    public function findGap($tripID1, $tripID2)
    {
        $trip1 = $this->getTrip(['id' => $tripID1]);
        $trip2 = $this->getTrip(['id' => $tripID2]);

        $time1 = $trip1->departure_time;
        $time2 = $trip2->departure_time;

        $time1 = strtotime($time1);
        $time2 = strtotime($time2);

        $gap = $time2 - $time1;
        // format to minutes
        $gap = $gap / 60;
        return $gap;
    }

    // function to find gap with the next bus of the trip
    public function findGapWithNextTrip($tripID)
    {
        $trip = $this->getTrip(['id' => $tripID]);
        // get trips of the day sorted by departure time
        $tripsOfDay = $this->where(['trip_date'=>$trip->trip_date, 'starting_halt'=>$trip->starting_halt],'departure_time');

        // find index of the trip next to the given trip in tripsOfDay
        $nextTripID = 0;
        $index = 0;
        foreach ($tripsOfDay as $t) {
            if ($t->id == $tripID) {
                $nextTripID = $tripsOfDay[$index+1]->id;
                $index++;
                break;
            }
            $index++;
        }

        $gap = $this->findGap($tripID, $nextTripID);

        return $gap;
    }
}