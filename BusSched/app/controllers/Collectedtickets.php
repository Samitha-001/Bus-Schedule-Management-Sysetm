<?php
class Collectedtickets
{

    use Controller;

    public function index()
    {
        $collectedticket = new E_ticket();
        $collectedtickets = $collectedticket->getTickets();

        // $data = [];
     
        $this->view('collectedticket', ['collectedtickets' => $collectedtickets]);
    }

}