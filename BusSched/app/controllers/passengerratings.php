<?php

class Passengerratings
{
    use Controller;

    public function index()
    {
        $this->userview('passenger', 'passengerrating');
    }
}