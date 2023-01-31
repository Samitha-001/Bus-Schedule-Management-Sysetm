<?php

class Drivers
{

    use Controller;

    public function index()
    {
        $data = [];

        $driver = new Driver();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $driver->first($arr);

        $this->view('driverhome', [$row]);
    }
}
