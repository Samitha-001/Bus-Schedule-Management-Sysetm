<?php
class Activetickets
{

    use Controller;

    public function index()
    {
        $activeticket = new Activeticket();
        $activetickets = $activeticket->getActivetickets();

        // $data = [];
     
        $this->view('activeticket', ['activetickets' => $activetickets]);
    }

}