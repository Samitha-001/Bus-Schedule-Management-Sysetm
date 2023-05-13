<?php
class Conductorschedules
{

    use Controller;

    public function index()
    {
        $trip = new Trip();
        $trips = $trip->getTrips();

        // $data = [];
     
        $this->userview('conductor', 'conductorschedule', ['trips' => $trips]);
    }

}