<?php

class Passenger extends Model
{
    protected $table = 'passenger';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address',
        'dob',
        'profile_pic',
        'points',
        'points_expiry'
    ];

    public function passengerInfo()
    {
        return $this->findAll();
    }

    // updatepassenger function
    public function updatePassenger($id, $data)
    {
        $this->update($id, $data, 'username');
    }
}
