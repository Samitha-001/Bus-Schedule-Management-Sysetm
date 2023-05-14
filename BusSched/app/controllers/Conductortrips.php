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
        $et = new E_ticket();
        $etickets = $et->getTripTickets($id);
        $hm = new Halt();
        $ending_halt = $trips->starting_halt == "Piliyandala"? "Pettah" : "Piliyandala";
        $h = $hm->getHaltRange($trips->starting_halt, $ending_halt);
        $bus = (new Bus())->getConductorBuses($_SESSION['USER']->username)[0];
        $data = ['trips' => $trips, 'tickets' => $etickets, 'halts' => $h, 'bus' => $bus];
        $this->userview('conductor','conductortripdetail', $data);
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

            // $postData has trip_id: trip_id, location: location,
            $data = [
                'tripID' => $postData['trip_id'],
                'halt' => $postData['location']
            ];

            $location_update->addLocationUpdate($data, 'conductor');

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

    // let url = ${ROOT}/conductortrips/api_ticket_collected;
    //     data = {
    //         ticket_id: id,
    //         status: status
    //     }

    // mark ticket as collected or booked, based on the given status
    public function api_ticket_collected()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // add, location update record
            $ticket = new E_ticket();

            $data = [
                'status' => $postData['status']
            ];

            $ticket->updateTicket($postData['ticket_id'], $data);

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