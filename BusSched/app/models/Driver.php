<?php

class Driver extends Model
{
    protected $table = 'driver';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address',
        'licence_no',
        'date_of_birth',
        'assigned_bus'
    ];

    public function driverInfo()
    {
        return $this->findAll();
    }
}