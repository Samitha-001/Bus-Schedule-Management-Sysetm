<?php

class Passengertickets
{
    use Controller;

    public function index()
    {
        $this->userview('passenger', 'passengertickets');
    }
}