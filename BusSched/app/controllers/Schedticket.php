<?php

class Schedticket
{
    use Controller;

    public function index()
    {
        $this->view('busticketsscheduler');
    }
}