<?php

class Adminusers
{

    use Controller;

    public function index()
    {
        $user = new User();
        $users = $user->getUsers();

        if (!isset($_GET['role'])) {
            $this->userview('admin', 'adminusers', ['users' => $users]);
        } else {
            $users = $user->getUsersDetails($_GET['role']);
            // $users = array_merge($users, $userinfo);
            if ($_GET['role'] == 'passenger') {
                $this->userview('admin/userviews', 'adminpassengers', ['users' => $users]);
            } else
            if ($_GET['role'] == 'driver') {
                $this->userview('admin/userviews', 'admindrivers', ['users' => $users]);
            } else 
            if ($_GET['role'] == 'conductor') {
                $this->userview('admin/userviews', 'adminconductors', ['users' => $users]);
            } else
            if ($_GET['role'] == 'scheduler') {
                $this->userview('admin/userviews', 'adminschedulers', ['users' => $users]);
            } else
            if ($_GET['role'] == 'owner') {
                // merge the arrays users with userinfo
                $this->userview('admin/userviews', 'adminowners', ['users' => $users]);
            } else {
                $this->userview('admin', 'adminusers', ['users' => $users]);
            }
        }
    }

    // Object
    //     (
    //         [id] => 22
    //         [username] => owner2
    //         [email] => owner2@gmail.com
    //         [password] => $2y$10$gb1e8dxlEbRJICSWRO9Wy.NQYlqAO4z6sE3IZdTnNh/QCLa.1r7N2
    //         [role] => owner
    //     )

    // [10] => stdClass Object
    //     (
    //         [id] => 24
    //         [username] => passenger3
    //         [email] => passenger3@gmail.com
    //         [password] => $2y$10$plgImcQAUY0bbPoZKJdKQu1Zzh3sLA4nugciAgjqtpAQGx7jkUcim
    //         [role] => passenger
    //     )

    // [11] => stdClass Object
    //     (
    //         [id] => 5
    //         [username] => passenger1
    //         [email] => passenger1@gmail.com
    //         [password] => $2y$10$PCP8OdTRkI1srnomErM.q.2uEOQVYYEfOyscXAdqwW6uEL76djL0e
    //         [role] => passenger
    //         [name] => John Doe
    //         [phone] => 
    //         [address] => 
    //         [dob] => 
    //         [profile_pic] => 
    //         [points] => 
    //         [points_expiry] => 
    //     )

    // api edit function
    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $user = new User();
            // remove field availability from the array
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach($postData as $key => $value){
                    $data[$key] = $value;
            }$user->updateUser($id, $data);
        
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

    // api add function
    public function api_add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            // ...
            $user = new User();
            $data = [];
            foreach($postData as $key => $value){
                    $data[$key] = $value;
            }
            // hash the password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
            $user->insert($data);
        
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

    // api delete function
    public function api_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $user = new User();
            $id = $postData['id'];
            $user->deleteUser($id);
        
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