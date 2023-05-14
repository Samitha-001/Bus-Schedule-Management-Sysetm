<?php

class Conductorincome
{
    use Controller;

    public function index()
    {
        $this->userview('conductor', 'conductorincome');
    }
}