<?php

class Conductorrating extends Model
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
    ];

    // public function getConductorRatings()
    // {
    //     return $this->findAll();
    // }

    // public function validate($data)
    // {
    //     $this->errors = [];

    //     if (empty($this->errors)) {
    //         return true;
    //     }

    //     return false;
    // }

    public function getConductorRatings($conductor)
    {
        // return $this->findAll();
        // $data['conductor'] = $conductor;
        // show($data);
        // $ratings = $this->join('bus', 'ratings.bus_no', '', $data);
        // return $ratings;

        $ratings=$this->findAll($conductor);

        return $ratings;

        
    }
}