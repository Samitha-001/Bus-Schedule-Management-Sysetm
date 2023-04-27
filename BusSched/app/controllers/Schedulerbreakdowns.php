<?php


class Schedulerbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
          // get username from session
         $scheduler = $_SESSION['USER']->username;
        $breakdowns = $breakdown->getOwnerBreakdowns($scheduler);

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            if (isset($_GET['delete'])) {
                $breakdown->deleteBreakdown($_GET['delete']);
                redirect('schedulerbreakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->userview('scheduler', 'schedulerbreakdown', ['breakdowns' => $breakdowns]);
    }

    public function api_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $bus = new Breakdown();
            $id = $postData['id'];
            $bus->deleteBreakdown($id);
        
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
