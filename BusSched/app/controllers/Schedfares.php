<?php


class Schedfares
{

    use Controller;

    public function index()
    {
        $schedfare = new fare();
        $schedfares = $schedfare->getFares();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($schedfare->validate($_POST)) {
                $schedfare->insert($_POST);
                redirect('schedfares');
            }

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
