<?php

class Passengertickets
{
    use Controller;

    public function index()
    {
        $passenger = new Passenger();
        $tickets = $passenger->getPassengerTickets();
        $this->userview('passenger', 'passengertickets', ['tickets' => $tickets]);
    }
}