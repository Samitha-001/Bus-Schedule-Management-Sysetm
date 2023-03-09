<?php

class Registernewbus extends Model
{
    protected $table = 'registernewbus';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'source',
        'dest',
        'owner',
        'license_no',
        'cond',
        'cond_cont_no',
        'driver',
        'dri_cont_no',
        
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus No is required";
        } else
        if (empty($data['source'])) {
            $this->errors['source'] = "Source is required";
        } else
        if (empty($data['dest'])) {
            $this->errors['dest'] = "Destination is required";
        } else
        if (empty($data['owner'])) {
            $this->errors['owner'] = "Bus owner is required";
        } else
        if (empty($data['license_no'])) {
            $this->errors['license_no'] = "License No is required";
        } else
        if (empty($data['con'])) {
            $this->errors['con'] = "Conductor is required";
        } else
        if (empty($data['cond_cont_no'])) {
            $this->errors['cond_cont_no'] = "Conductor Contact Number is required";
        } else
        if (empty($data['driver'])) {
            $this->errors['driver'] = "driver is required";
        } else
        if (empty($data['dri_cont_no'])) {
            $this->errors['dri_cont_no'] = "Driver Contact Number is required";
        }


        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getRegisternewbuses()
    {
        return $this->findAll();
    }
}
