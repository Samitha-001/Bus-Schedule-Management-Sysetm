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
    }

    public function api_update_location()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            $id = $postData['id'];
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

    public function api_read_ticket()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            $id = $postData['id'];
            
            // method to get ticket info
            $ticket = new E_ticket();
            $dataticket = $ticket->findTicket($id);

            // getting trip details relevant to the ticket
            $trip = new Trip();
            $tripData = $trip->getTrip(['id' => $dataticket->trip_id]);
            
            // getting driver ID and conductor ID relevant to the bus
            $bus = new Bus();
            $busData = $bus->getBus($tripData->bus_no);

            $driver_id = $busData->driver;
            $conductor_id = $busData->conductor;
            // get array with just driver ID and conductor ID
            $busData = ['driver' => $driver_id, 'conductor' => $conductor_id];

            // trip data and ticket data
            $data['trip'] = $tripData;
            $data['ticket'] = $dataticket;
            $data['bus'] = $busData;

            $response = array('status' => 'success', 'data' => $data);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requests');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function api_read_halts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            $src = $postData['src'];
            $dest = $postData['dest'];
            
            $halt = new Halt();
            // method to get ticket info
            $data = $halt->getHaltRange($src, $dest);

            // Send a response
            $response = array('status' => 'success', 'data' => $data);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requestss');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    // add passenger rating
    public function api_add_rating()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            $rating = new Rating();
            $rating->addRating($postData);

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