<?php

class Passengerlocation
{
    use Controller;

    public function index()
    {
        $this->userview('passenger','passengerlocationupdate');
    }
}