<?php

class E_ticket extends Model
{
    protected $table = 'e_ticket';

    // editable columns
    protected $allowedColumns = [
        'id',
        'passenger',
        'trip_id',
        'seat_number',
        'ticket_number',
        'booking_time',
        'source_halt',
        'dest_halt',
        'booking_time',
        'status'
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

    public function getTickets()
    {
        return $this->findAll();
    }

    // add ticket
    public function addTicket($data)
    {
        // show($data);
        return $this->insert($data);
    }
}
