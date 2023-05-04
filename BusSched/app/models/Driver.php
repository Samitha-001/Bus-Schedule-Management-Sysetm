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
        'assigned_bus',
        'rating',
        'no_of_reviews'
    ];

    public function driverInfo()
    {
        return $this->findAll();
    }

    public function updateDriver($id, $data)
    {
        $this->update($id, $data, 'username');
    }
}
