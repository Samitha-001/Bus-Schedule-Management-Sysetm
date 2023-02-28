<?php

class Rating extends Model
{
    protected $table = 'ratings';

    // editable columns
    protected $allowedColumns = [
        'id',
        'trip_id',
        'bus_id',
        'bus_rating',
        'conductor_id',
        'conductor_rating',
        'driver_id',
        'driver_rating'
    ];

    public function validate($data)
    {
        // $this->errors = [];

        // if (empty($data['bus_no'])) {
        //     $this->errors['bus_no'] = "Bus number is required";
        // } else
        // if (empty($data['description'])) {
        //     $this->errors['description'] = "Enter Description";
        // } else
        // if (empty($data['time_to_repair'])) {
        //     $this->errors['time_to_repair'] = "Enter estimate time to repair";
        // }


        // if (empty($this->errors)) {
        //     return true;
        // }

        // return false;
    }

    public function getRatings()
    {
        return $this->findAll();
    }
}