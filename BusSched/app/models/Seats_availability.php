<?php

class Seats extends Model
{
    protected $table = 'seats_availability';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'trip_id',
        'seat_no',
        'availability'
    ];

    // function to get available seats
    public function getAvailableSeats($trip_id)
    {
        return $this->where(['trip_id' => $trip_id, 'availability' => 'available']);
    }

    // function to get reserved seats
    public function getBookedSeats($trip_id)
    {
        return $this->where(['trip_id' => $trip_id, 'availability' => 'reserved']);
    }
}