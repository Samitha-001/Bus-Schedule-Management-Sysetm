<?php

class Passengerschedule
{
    use Controller;

    public function index()
    {
        $trip = new Trip();
        $trips = $trip->getTrips();
        $this->userview('passenger', 'passengerschedule', ['trips' => $trips]);
    }
}