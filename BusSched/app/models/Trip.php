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
        'bus_id'
    ];

    public function getTrips()
    {
        return $this->findAll();
    }

    // get trip by id
    public function getTrip($data)
    {
        return $this->first($data);
    }
}