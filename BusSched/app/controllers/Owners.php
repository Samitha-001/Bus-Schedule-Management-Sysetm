<?php

class Owners
{

    use Controller;

    public function index()
    {
        $data = [];

        $owner = new Owner();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $owner->first($arr);

        $this->view('ownerhome', [$row]);
    }
}