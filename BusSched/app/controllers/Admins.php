<?php

class Admins {

    use Controller;

    public function index() {
        $admin = new Admin();
        $personalinfo = $admin->adminInfo();
		
        $this->view('adminhome', $personalinfo);
    }
}