<?php
class Collectedtickets
{

    use Controller;

    public function index()
    {
        $collectedticket = new Collectedticket();
        $collectedtickets = $collectedticket->getCollectedtickets();

        // $data = [];
     
        $this->view('collectedticket', ['collectedtickets' => $collectedtickets]);
    }

}