<?php
class Activetickets
{

    use Controller;

     public function index()
    {
        $activeticket = new E_ticket();
        $activetickets = $activeticket->getTickets();

        // $data = [];
     
        $this->view('activeticket', ['activetickets' => $activetickets]);
    

              
    }

    public function api_collect_tickets()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            $ticket_no = $postData['ticket_no'];
            
            
            $ticket = new E_ticket();
            // method to get ticket info
            $data = $ticket->getTicket($ticket_no);

            // Send a response
            $response = array('ticket_no' => 'ticket_no', 'data' => $data);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('ticket_no' => 'error', 'data' => 'Invalid requestss');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}