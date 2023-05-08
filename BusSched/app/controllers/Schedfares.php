<?php


class Schedfares
{

    use Controller;

    public function index()
    {
        $schedfare = new Fareinstance();
        $schedfares = $schedfare->getFareInstances();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            

            $data['errors'] = $schedfare->errors;
        }

        $this->view('schedfare', ['schedfares' => $schedfares]);
    }

    public function api_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $fare = new Fare();
            $id = $postData['id'];
            $fare->deleteFares($id);
        
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
