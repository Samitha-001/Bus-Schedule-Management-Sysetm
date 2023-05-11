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

    
}