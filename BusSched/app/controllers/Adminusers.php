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

    // api edit function
    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            // ...
            $user = new User();
            // remove field availability from the array
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach($postData as $key => $value){
                    $data[$key] = $value;
            }
            $user->updateUser($id, $data);
        
            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid request');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
               
    }
}