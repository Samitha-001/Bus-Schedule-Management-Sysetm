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
        // win loyalty point for updating location
        $point = new Point();
        $point->deductPoints(-1);

        return $this->insert($data);
    }

    // function to get updates relevant to each trip
    public function getUpdates($trip)
    {
        $data = ['trip' => $trip];
        return $this->where($data);
    }
}