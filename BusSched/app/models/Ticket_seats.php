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

    /**
     * @param $trip_id
     * @param $src
     * @param $halt
     * @return array
     * Description: function to get seats reserved for a given trip
     */
    public function getSeatsReserved($trip_id, $src, $halt)
    {
        $sql = "Select e_ticket.trip_id,e_ticket.source_halt,e_ticket.dest_halt,ticket_seats.seat from ticket_seats inner join e_ticket on ticket_seats.ticket_id = e_ticket.id where e_ticket.trip_id = ?";
        $data = [$trip_id];
        $reserved = $this->query($sql, $data);
        $rseats = [];
        $h = new Halt();
        if ($reserved) {
            foreach ($reserved as $r) {
                if ($h->isOverlapping($src, $halt, $r->source_halt, $r->dest_halt)) {
                    $rseats[] = $r->seat;
                }
            }
        }
        return $rseats;
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