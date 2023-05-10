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
        'seats_reserved',
        'ticket_number',
        'source_halt',
        'dest_halt',
        'booking_time',
        'status',
        'passenger_count',
        'arrival_time',
        'departure_time',
        'collected_time',
        'price',
        'payment_method'
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

    public function getBusTickets($trip)
    {
        return $this->where(['trip_id' => $trip]);
    }

    public function getTicket($ticket_no)
    {
        return $this->where(['ticket_no' => $ticket_no]);
    }


    public function getBusActiveTickets($status,$trip_id)
    {
        return $this->where(['status' => $status,'trip_id'=>$trip_id]);
    }

    public function getBusCollectedTickets($status,$trip_id)
    {
        return $this->where(['status' => $status,'trip_id'=>$trip_id]);
    }

    // add ticket
    public function addTicket($data)
    {
        return $this->insert($data);
    }

    // find ticket
    public function findTicket($id)
    {
        return $this->first(['id'=>$id]);
    }

    // update ticket
    public function updateTicket($id, $data)
    {
        return $this->update($id, $data);
    }

}
