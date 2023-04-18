<?php

class Passengertickets
{
    use Controller;

    public function index()
    {
        $passenger = new Passenger();
        $tickets = $passenger->getPassengerTickets();
        $this->userview('passenger', 'passengertickets', ['tickets' => $tickets]);
    }

    public function updateTicketStatus($id, $status)
    {
        $ticket = new E_ticket();
        $ticket->updateTicket($id, ['status' => $status]);
        redirect('passengertickets');
    }

    public function api_update_location()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);


            $id = $postData['id'];
            // $id = 12;
            $this->updateTicketStatus($id, 'inactive');

            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requestss');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}