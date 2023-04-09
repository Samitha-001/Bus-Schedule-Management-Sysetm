<?php

class Passengerprofile
{

    use Controller;

    public function index()
    {
        $data = [];

        $passenger = new Passenger();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $passenger->first($arr);

        $this->userview('passenger', 'passengerprofile', [$row]);
    }

    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $passenger = new Passenger();
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach ($postData as $key => $value) {
                $data[$key] = $value;
            }
            $passenger->updatePassenger($id, $data);

            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid request');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
