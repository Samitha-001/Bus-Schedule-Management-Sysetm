<?php

class ownerincome
{
    use Controller;

    public function index()
    {
        $this->userview('owner', 'ownerincome');
    }
}