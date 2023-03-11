<?php

class ownernotifications
{
    use Controller;

    public function index()
    {
        $this->userview('owner', 'ownernotification');
    }
}