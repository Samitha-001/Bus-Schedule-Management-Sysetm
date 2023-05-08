<?php

class Location_update extends Model
{
    protected $table = 'location_update';

    // editable columns
    protected $allowedColumns = [
        'id',
        'username',
        'user_role',
        'ticket',
        'halt',
        'tripID',
        'timestamp'
    ];

    // function to add new location update record
    public function addLocationUpdate($data)
    {
        // win loyalty point for updating location
        $point = new Point();
        $point->deductPoints(-1);

        // data being sent
        // $data = [
        //     'username' => $postData['username'],
        //     'user_role' => $postData['user_role'],
        //     'ticket' => $postData['id'],
        //     'halt' => $postData['halt'],
        //     'timestamp' => date('Y-m-d H:i:s')
        // ];

        // calls update trip location function, conditions are checked there
        $this->updateTripLocation($data['tripID'], $data['halt']);

        return $this->insert($data);
    }

    // function to get updates relevant to each trip
    public function getUpdates($trip, $location="", $role="passenger")
    {
        $data['tripID'] = $trip;
        $data['user_role'] = $role;
        if ($location != "") {$data['halt'] = $location;}
        return $this->where($data);
    }

    // update location on trip
    public function updateTripLocation($tripID, $location)
    {
        // $trip  = $trips->getTrip(['id' => $tripID]);
        
        // get updates for the trip by passenger
        $passengerUpdates = $this->getUpdates($tripID, $location);
        
        // get updates for the trip by conductor
        $conductorUpdates = $this->getUpdates($tripID, $location, 'conductor');
        
        // if there are 3 passenger updates and 1 conductor update
        if (count($passengerUpdates) >= 3 && count($conductorUpdates) >= 1) {
            $trips = new Trip();
            $trips->updateTripLocation($tripID, $location);
        }
    }


}