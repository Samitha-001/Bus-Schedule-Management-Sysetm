<?php

class Passengerprofile
{

    use Controller;

    public function index()
    {
        $data = [];

        $passenger = new Passenger();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $passenger->first($arr);

        $this->userview('passenger', 'passengerprofile', [$row]);
    }

    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $passenger = new Passenger();
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach ($postData as $key => $value) {
                $data[$key] = $value;
            }
            $passenger->updatePassenger($id, $data);

            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requestss');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function api_gift_points()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $point = new Point();
            $data = [];
            foreach($postData as $key => $value){
                $data[$key] = $value;
            }

            $point->giftPoints($data);
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

    // api to add profile picture
    function api_upload_profile_pic() {
        if (!isset($_FILES['profile-pic'])) {
          die(json_encode(['success' => false, 'message' => 'No file uploaded.']));
        }
      
        // Get the username from the request body
        // Define the upload directory and target file path
        $upload_dir = 'assets/images/profile-pics/';
        $target_file = $upload_dir . basename($_FILES['profile-pic']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        
        if (!in_array($imageFileType, $allowed_extensions)) {
            http_response_code(400); // bad request
            echo json_encode(array('success' => false, 'message' => 'Only JPG, JPEG and PNG files are allowed'));
            return;
        }

        $username = $_POST['username'];
        $upload_path = $upload_dir . $username . '.jpg';
      

        // Check if a file with the same name but different extension exists
        $files = glob($upload_dir . $username . '.*');
        foreach ($files as $file) {
        //   $extension = pathinfo($file, PATHINFO_EXTENSION);
          if (file_exists($target_file)) {
            unlink($file);
          }
        }
      
        // Save the uploaded file
        if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $upload_path)) {
          die(json_encode(['success' => true, 'message' => 'Profile picture uploaded.']));
        } else {
          die(json_encode(['success' => false, 'message' => 'Error uploading profile picture.']));
        }
      }
    
}
