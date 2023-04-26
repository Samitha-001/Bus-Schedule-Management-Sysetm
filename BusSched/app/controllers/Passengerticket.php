<?php

class Passengerticket
{
    use Controller;

    public function index()
    {
        $this->userview('passenger', 'passengerticket');
    }
    
    public function api_add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            
            // Process the request data and perform the update
            $ticket = new E_ticket();
            $data = [];
            foreach($postData as $key => $value){
                $data[$key] = $value;
            }
            $data['passenger'] = $_SESSION['USER']->username;
            // booking time is current time
            $data['booking_time'] = date('Y-m-d H:i:s');
            $halt = new Halt();
            $fee = $halt->calculateFare($data['source_halt'], $data['dest_halt']);
            $data['price'] = $fee;
            $ticket->addTicket($data);

            // Send a response
            $response = array('status' => 'success', 'data' => $data);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid request');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}