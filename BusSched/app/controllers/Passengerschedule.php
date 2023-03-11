<?php

class Passengerschedule
{
    use Controller;

    public function index()
    {
        $this->userview('passenger', 'passengerschedule');
    }
}