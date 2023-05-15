<?php

class UnavailableBus extends Model
{
    protected $table = 'unavailable_buses';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'availability',
        'date'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        }
        if (empty($data['type'])) {
            $this->errors['type'] = "Choose bus type";
        }
        if (empty($data['seats_no'])) {
            $this->errors['seats_no'] = "Enter number of available seats";
        }
        if (empty($data['route'])) {
            $this->errors['route'] = "Enter bus route";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function add($data){
        return $this->insert($data);
    }

    public function getAvailableBuses()
    {
        return $this->where(['availability' => 1]);
    }

    public function getBuses(){
        return $this->findAll();
    }
}