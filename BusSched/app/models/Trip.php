<?php

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
    public function getBus($data)
    {
        $bus = new Bus();
        return $bus->first(['bus_no' => $data['bus_no']]);
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

}