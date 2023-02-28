<?php

class Adminusers
{

    use Controller;

    public function index()
    {
        $user = new User();
        $users = $user->getUsers();

        if (isset($_GET['delete'])) {
            $user->deleteUser($_GET['delete']);
            redirect('adminusers');
        }
        
        $this->userview('admin', 'adminusers', ['users' => $users]);
    }
}