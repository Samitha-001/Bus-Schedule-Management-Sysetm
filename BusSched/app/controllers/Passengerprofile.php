<?php

class Passengerprofile
{

    use Controller;

    public function index()
    {
        $data = [];

        $passenger = new Passenger();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $passenger->first($arr);

        $this->view('passengerprofile', [$row]);
    }
}
