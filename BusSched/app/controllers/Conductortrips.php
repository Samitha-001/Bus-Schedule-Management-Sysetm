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

    /**
     * Description- updates trip status as started
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

            $trip->sendTripStartNotification($data['trip_id']);

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

    /**
     * Description- updates trip status as ended
     * @return void
     */
    public function api_end_trip(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $post = json_decode(file_get_contents('php://input'), true);
            $trip_id = $post['trip_id'];

            // updates trip status as ended
            (new Trip())->updateTrip($trip_id, "ended");
            (new Trip())->updateTripLocation($trip_id, $post['ending_halt']);

            // Send a response
            $response = array('status' => 'success', 'data' => $post);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requests');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function trips($id): void
    {
        //check get parameter
        $tm = new Trip();
        $trips = $tm->getTrip(['id' => $id]);
        $this->userview('conductor','conductortripdetail', ['trips' => $trips]);
    }

    // function to add breakdown for a trip
    /**
     * Adds breakdown given a trip number
     * @param int $tripno
     * @param array $data
     * @return bool
     */
    public function addBreakdownForTrip($tripno, $data)
    {
        // get bus of the trip
        $trip = new Trip();
        $busno = $trip->getBus($tripno);
        $trip = new Breakdown();

        $d = [
            'bus_no' => $busno,
            'description' => $data['description'],
            'time_to_repair' => $data['time_to_repair']
        ];
        return $trip->addBreakdown($d, $tripno);
    }

    // function to update trip location
    public function api_update_location()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            
            // add, location update record
            $location_update = new Location_update();
            
            $data = [
                'username' => $postData['username'],
                'user_role' => $postData['user_role'],
                'tripID' => $postData['tripID'],
                'halt' => $postData['halt'],
                'timestamp' => date('Y-m-d H:i:s')
            ];

            $location_update->addLocationUpdate($data, $postData['user_role']);

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