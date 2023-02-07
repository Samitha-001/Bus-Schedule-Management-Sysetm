<?php

class Admins
{

    use Controller;

    public function index()
    {
        $data = [];

        $admin = new Admin();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $admin->first($arr);

        $this->view('adminhome', [$row]);
    }
}
