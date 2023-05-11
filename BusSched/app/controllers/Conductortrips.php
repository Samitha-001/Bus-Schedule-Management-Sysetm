<?php
class Conductortrips
{

    use Controller;

     public function index()
    {
        $conductortrip = new Trip();
        $conductortrips = $conductortrip->getTrips();

        // $data = [];
     
        $this->view('conductortrip', ['conductortrips' => $conductortrips]);
    
              
    }

    public function updateTripStatus($id)
    {
        $trip=new Trip();
        $trip->updateTrip($id,['status' => "started"]);
        redirect('conductortrip');
    }
    
}