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
}