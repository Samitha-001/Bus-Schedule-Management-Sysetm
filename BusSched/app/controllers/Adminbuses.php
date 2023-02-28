<?php

class Adminbuses
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        $buses = $bus->getBuses();

        // $data = [];
        // if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //     $_POST['bus_no'] = strtoupper($_POST['bus_no']);
        //     if ($bus->validate($_POST)) {
        //         $bus->insert($_POST);

        //         adminredirect('buses');
        //     }

        //     $data['errors'] = $bus->errors;
        // }

        $this->userview('admin', 'adminbuses', ['buses' => $buses]);
    }
}