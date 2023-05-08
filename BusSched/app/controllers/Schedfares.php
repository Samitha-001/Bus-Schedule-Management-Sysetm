<?php


class Schedfares
{

    use Controller;

    public function index()
    {   

        $fareinstance = new Fareinstance();
        $fares = $fareinstance->getFareInstances();


        $halt = new Halt();
        $halts = $halt->getHalts();
        $data['halts'] = $halts;
        $data['fares'] = $fares;

        $data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $this->view('schedfare', $data);

        
        
    }

    // public function api_delete()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Retrieve the POST data
    //         $postData = json_decode(file_get_contents('php://input'), true);

    //         // Process the request data and perform the update
    //         $fare = new Fare();
    //         $id = $postData['id'];
    //         $fare->deleteFares($id);
        
    //         // Send a response
    //         $response = array('status' => 'success', 'data' => $postData);
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     } else {
    //         $response = array('status' => 'error', 'data' => 'Invalid request');
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     }
    // }
}
