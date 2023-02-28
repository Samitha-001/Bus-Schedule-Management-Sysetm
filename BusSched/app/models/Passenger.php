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
        'profile_pic'
        
    ];

    public function passengerInfo()
    {
        return $this->findAll();
    }
}
