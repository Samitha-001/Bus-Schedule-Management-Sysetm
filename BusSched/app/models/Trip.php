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
        'location_updated_time',
        'status'

    ];

    public function getTrips()
    {
        return $this->findAll();
    }

    public function getBusTrips($bus)
    {
        return $this->where(['bus_no' => $bus]);
    }

    // get trip by id
    public function getTrip($data)
    {
        return $this->first($data);
    }


    // get bus of a trip
    public function getBus($trip_no)
    {
        $b = $this->getTrip(['id' => $trip_no])->bus_no;
        return (new Bus())->first(['bus_no' => $b]);
    }

    // update last_updated_halt and location_updated_time
    public function updateTripLocation($tripID, $location)
    {
        $data = ['last_updated_halt' => $location, 'location_updated_time' => date('Y-m-d H:i:s')];
        $this->update($tripID, $data);
    }

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
            $ws = new Client("ws://" . SOCKET_HOST . ":8080");
            $ws->text(json_encode([
                "event_type" => "trip-start",
                "data" => [
                    "message" => 'Your bus just left '.$h,
                ],
                "role" => ["passenger"],
                "usernames" => $passengers
            ]));
        }
    }

}