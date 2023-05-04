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
        'timestamp'
    ];

    // function to add new location update record
    public function addLocationUpdate($data)
    {
        return $this->insert($data);
    }

    // function to get updates relevant to each trip
    public function getUpdates($trip)
    {
        $data = ['trip' => $trip];
        return $this->where($data);
    }
}