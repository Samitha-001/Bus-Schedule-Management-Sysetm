<?php

class Adminschedules
{
    use Controller;

    public function index()
    {
        $trip = new Trip();
        $trips = $trip->getTrips();
        $data['schedules'] = $trips;

        $this->userview('admin', 'adminschedules', $data);
    }
}