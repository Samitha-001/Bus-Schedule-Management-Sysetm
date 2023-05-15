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

    // function to get unassigned drivers
    public function getUnassignedDrivers()
    {
        // all drivers
        $all_drivers = $this->findAll('username');
        // all buses
        $bus = new Bus();
        $all_buses = $bus->findAll();
        // unassigned drivers
        $unassigned_drivers = [];
        foreach ($all_drivers as $driver) {
            $assigned = false;
            foreach ($all_buses as $bus) {
                if ($driver->username == $bus->driver) {
                    $assigned = true;
                    break;
                }
            }
            if (!$assigned) {
                array_push($unassigned_drivers, $driver);
            }
        }

        return $unassigned_drivers;
    }
}
