<?php


class Schedbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdowns();
        
        $un_buses = new UnavailableBus();
        //print_r($breakdowns);
        foreach($breakdowns as $b){
            $un_buses->add(array("",$b->bus_no, 0, date('Y-m-d') ));
        }
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Check if a delete button was clicked
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
                // Call the delete method to delete the breakdown
                if ($breakdown->deleteBreakdown($id)) {
                    redirect('schedbreakdowns');
                } else {
                    $data['error'] = 'Error deleting breakdown.';
                    echo $data['error'];
                }
            } 
        }
    
        $this->view('schedulebreakdown', ['breakdowns' => $breakdowns]);
    }

    public function api_add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $fare = new Fare();
            $data = [];
            foreach($postData as $key => $value){
                $data[$key] = $value;
            }
            
            $fare->addFare($data);
        
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
