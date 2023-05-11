<?php

class Admintickets
{
    use Controller;

    public function index()
    {
        $ticket = new E_ticket();
        $tickets = $ticket->getTickets();

        // if (isset($_GET['delete'])) {
        //     $rating->deleteRating($_GET['delete']);
        //     redirect('adminratings');
        // }

        $this->userview('admin', 'admintickets', ['tickets' => $tickets]);
    }
}