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

    

    public function locationUpdate($id) {
        $location = new Location_update();
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $location->addLocationUpdate($_POST, "Conductor");
            show($_POST);
            // redirect("http://localhost/Bus-Schedule-Management-System/bussched/public/conductorlocations?tripID=11");


        }
    }
    
}