<?php

class Adminhalts
{
    use Controller;

    public function index()
    {
        $halt = new Halt();
        $halts = $halt->getHalts();

        if (isset($_GET['delete'])) {
            $halt->deleteHalt($_GET['delete']);
            redirect('adminhalts');
        }

        $this->userview('admin', 'adminhalts', ['halts' => $halts]);
    }

    // api edit function
    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            // ...
            $halt = new Halt();
            // remove field availability from the array
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach($postData as $key => $value){
                    $data[$key] = $value;
            }
            $halt->updateHalt($id, $data);
        
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