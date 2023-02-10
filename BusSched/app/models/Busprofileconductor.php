<?php

class Busprofileconductor extends Model
{
    protected $table = 'busprofileconductor';

    // editable columns
    protected $allowedColumns = [
        'bus_no',
        'source',
        'destination',
        'owner',
        'license_no',
        'assigned_conductor',
        'conductor_contact',
        'assigned_driver',
        'driver_contact'
        
    ];

    // public function validate($data)
    // {
    //     $this->errors = [];

    //     if (empty($data['bus_no'])) {
    //         $this->errors['bus_no'] = "Bus number is required";
    //     } else
    //     if (empty($data['description'])) {
    //         $this->errors['description'] = "Enter Description";
    //     } else
    //     if (empty($data['time_to_repair'])) {
    //         $this->errors['time_to_repair'] = "Enter estimate time to repair";
    //     }


    //     if (empty($this->errors)) {
    //         return true;
    //     }

    //     return false;
    // }

    public function getBusprofileconductors()
    {
        return $this->findAll();
    }
}
