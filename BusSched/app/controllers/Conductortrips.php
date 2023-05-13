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

    // public function updateTripStatus()
    // {
    //     $trip = new Trip();
    //     $trip->updateTrip($_POST['tripID'], ['status' => "started"]);
    //     // $id=$_POST['tripID'];
    //     // header("Location: conductorlocations.php?trip_id={$id}");
    // }

    // function to start trip
    /**
     * updates trip status as started
     * @return void
     */
    public function api_start_trip()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
    
            // Process the request data and perform the update
            $trip = new Trip();
            $data = [];
            foreach($postData as $key => $value){
                $data[$key] = $value;
            }
            
            // updates trip status as started
            $trip->updateTrip($data['trip_id'], "started");

            // updated last updated halt as source
            $trip->update($data['trip_id'], ['last_updated_halt' => $data['starting_halt']]);

            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requests');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    
}