<?php

class Ticket_seats extends Model
{
    protected $table = 'ticket_seats';

    // editable columns
    protected $allowedColumns = [
        'id',
        'seat',
        'ticket_id'
    ];

    // function to get bus of the ticket
    public function findTripOfTicket($ticket_id)
    {
        $ticket = new E_ticket();
        $tripid = $ticket->findTicket($ticket_id)->trip_id;
        $trip = new Trip();
        $tripinfo = $trip->getTrip(['id' => $tripid]);
        return $tripinfo;
    }

    // function to get seats reserved for a given trip
    public function getSeatsReserved($trip_id) {
        $ticket = new E_ticket();
        $tickets = $ticket->where(['trip_id' => $trip_id]);
        $data = [];
        // tickets relevant to the trip
        if($tickets) {
            foreach ($tickets as $t) {
                array_push($data, $t->id);
            }
        }

        $seats = [];
        // for each ticket, get seats
        foreach ($data as $d) {
            $seats_reserved = $this->where(['ticket_id' => $d]);
            if(!$seats_reserved) {
                continue;
            }
            foreach ($seats_reserved as $s) {
                array_push($seats, $s->seat);
            }
        }
        return $seats;
    }

    // function to reserve seats/add record
    public function reserveSeats($seats, $ticket_id) {
        foreach ($seats as $seat) {
            $this->insert(['seat' => $seat, 'ticket_id' => $ticket_id]);
        }
    }

    // function to get number of unreserved seats in bus
    public function getUnreservedSeats($trip_id) {
        $trip = new Trip();
        $busno = $trip->getTrip(['id' => $trip_id])->bus_no;
        $bus = new Bus();
        $bus = $bus->getBus($busno);
        $seats = $bus->seats_no;
        $reserved = $this->getSeatsReserved($trip_id);
        $unreserved = $seats - count($reserved);
        return $unreserved;
    }
}