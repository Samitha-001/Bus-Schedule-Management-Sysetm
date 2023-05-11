<?php
class Collecttickets
{

    use Controller;

     public function index()
    {
        $collectticket = new E_ticket();
        $collecttickets = $collectticket->getTickets();

        // $data = [];
     
        $this->view('collectticket', ['collecttickets' => $collecttickets]);
    

              
    }

    public function collectTicket($id) {
        $ticket = new E_ticket();
        $ticket->updateTicket($id, ['status' => "collected"]);

        redirect('activetickets');
    }
}