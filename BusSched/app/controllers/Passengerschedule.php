<?php

class Passengerschedule
{
    use Controller;

    public function index()
    {
        $trip = new Trip();
        $trips = $trip->getTrips();
        $this->userview('passenger', 'passengerschedule', ['trips' => $trips]);
    }

    // api to estimate time of departure and arrival
    public function api_get_estimated_time()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            // postData has the tripID as id, username, user_role

            // get trip
            $halt = new Halt();
            
            // source and time of departure of trip
            $starting_halt = $postData['starting_halt'];
            $starting_time = $postData['starting_time'];

            // time to reach from input
            $data['departure_time'] = $halt->estimateTime($starting_halt, $postData['from'], $starting_time);

            // time to reach to input
            $data['arrival_time'] = $halt->estimateTime($starting_halt, $postData['to'], $starting_time);

            // Send a response
            $response = array('status' => 'success', 'data' => $data);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}