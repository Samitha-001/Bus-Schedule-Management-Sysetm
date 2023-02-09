<?php

class Schedpendingticket
{
    use Controller;

    public function index()
    {
        $this->view('pendingticketsscheduler');
    }
}