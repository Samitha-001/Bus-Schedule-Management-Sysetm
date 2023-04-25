<?php

class Rating extends Model
{
    protected $table = 'ratings';

    // editable columns
    protected $allowedColumns = [
        'id',
        'ticket_id',
        'rater',
        'trip_id',
        'bus_no',
        'bus_rating',
        'conductor',
        'conductor_rating',
        'driver',
        'driver_rating',
        'time_updated'
    ];

    public function validate($data)
    {
        $this->errors = [];
        // bus_rating, conductor_rating, driver_rating from 1 to 5
        if (empty($data['bus_rating'])) {
            $this->errors['bus_rating'] = "Bus rating is required";
        } else
        if ($data['bus_rating'] < 1 || $data['bus_rating'] > 5) {
            $this->errors['bus_rating'] = "Bus rating must be between 1 and 5";
        }
    }

    public function getRatings()
    {
        return $this->findAll();
    }

    public function getConductorRatings($conductor)
    {
        return $this->where(['conductor_id' => $conductor]);
    }

    public function deleteRating($id)
    {
        $this->delete($id);
    }

    public function addRating($data)
    {
        $this->insert($data);
    }
}