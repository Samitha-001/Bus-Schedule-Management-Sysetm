<?php

class Conductors
{

    use Controller;

    public function index()
    {
        $data = [];

        $conductor = new Conductor();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $conductor->first($arr);

        $this->view('conductorhome', [$row]);
    }
}
