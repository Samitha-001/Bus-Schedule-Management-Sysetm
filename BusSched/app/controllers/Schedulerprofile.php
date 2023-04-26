<?php

class Schedulerprofile
{

    use Controller;

    public function index()
    {
        $data = [];

        $scheduler = new Scheduler();
        $arr['username'] = $_SESSION['USER']->username;
        $row = $scheduler->first($arr);

        $this->view('schedulerprofile', [$row]);
        
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $scheduler = new Scheduler();
            $id = $postData['id'];
            unset($postData['id']);
            $data = [];
            foreach ($postData as $key => $value) {
                $data[$key] = $value;
            }
            $scheduler->updateScheduler($id, $data);

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

}