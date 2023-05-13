<?php
class Conductortrips
{

    use Controller;

     public function index()
    {
        $conductortrip = new Trip();
        $conductortrips = $conductortrip->getTrips();

        // $data = [];
     
        $this->userview('conductor', 'conductortrip', ['conductortrips' => $conductortrips]);
    
              
    }

    public function updateTripStatus()
{
    $trip = new Trip();
    $trip->updateTrip($_POST['tripID'], ['status' => "started"]);
    // $id=$_POST['tripID'];
    // header("Location: conductorlocations.php?trip_id={$id}");
}
    
}