<?php

class Admins {

    use Controller;

    public function index() {
        $data = [];

        $admin = new Admin();
        $personalinfo = $admin->adminInfo();
        $data['personalinfo'] = $personalinfo;

        $this->view('adminhome', $data);
    }
}