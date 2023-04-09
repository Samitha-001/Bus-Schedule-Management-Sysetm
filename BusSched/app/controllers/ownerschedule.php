<?php

class ownerschedule
{
    use Controller;

    public function index()
    {
        $this->userview('owner', 'ownerschedule');
    }
}