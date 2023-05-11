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
            $ticket->addTicket($data);

            // get ticket id of the ticket just added
            $ticket_id = $ticket->first(['passenger'=>$data['passenger'], 'booking_time'=>$data['booking_time']])->id;

            // reserve seats
            $ticket_seat = new Ticket_seats();
            $ticket_seat->reserveSeats($data['seats'], $ticket_id);

            // if payment is points, deduct points from passenger
            if ($data['payment_method'] == 'points') {
                $point = new Point();
                $point->deductPoints($data['price']);
            }

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

    // calculate fare from source halt to destination halt
    public function api_get_fare() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            
            // Process the request data and perform the update
            $halt = new Halt();
            $fee = $halt->calculateFare($postData['from'], $postData['to']);
            $response = array('status' => 'success', 'data' => $fee);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid request');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}