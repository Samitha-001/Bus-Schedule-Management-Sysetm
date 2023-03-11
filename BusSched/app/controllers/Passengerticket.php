<?php

class Passengerticket
{
    use Controller;

    public function index()
    {
        $this->userview('passenger', 'passengerticket');
    }
}