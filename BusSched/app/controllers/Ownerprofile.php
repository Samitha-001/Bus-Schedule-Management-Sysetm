<?php

class Ownerprofile
{

    use Controller;

    public function index()
    {
        $data = [];

        $owner = new Owner();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $owner->first($arr);

        $this->userview('owner', 'ownerprofile', [$row]);
    }
}
