<?php
class Conductorlocations
{

    use Controller;

     public function index()
    {
        $conductortrip = new Trip();
        $conductortrips = $conductortrip->getTrips();

        // $data = [];
     
        $this->view('conductorlocation', ['conductortrips' => $conductortrips]);
    
              
    }

    
}