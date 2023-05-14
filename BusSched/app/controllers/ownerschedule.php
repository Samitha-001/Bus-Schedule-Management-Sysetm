<?php

class Ownerschedule
{
    use Controller;

    public function index()
    {
        $trip = new Trip();
        // date 
        $today = date("Y-m-d");
        // tomorrow
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        $trips = $trip->where(['trip_date' => $today]);
        // add tomorrow's trips
        $trips = array_merge($trips, $trip->where(['trip_date' => $tomorrow]));

        $bus = new Bus();
        $buses = $bus->getOwnerBuses($_SESSION['USER']->username);
        
        $this->userview('owner', 'ownerschedule', ['trips' => $trips, 'buses' => $buses]);
    }
}