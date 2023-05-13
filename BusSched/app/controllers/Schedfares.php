<?php


class Schedfares
{

    use Controller;

    public function index()
    {   

        $fareinstance = new Fareinstance();
        $fares = $fareinstance->getFareInstances();


        $halt = new Halt();
        $halts = $halt->getHalts();
        $data['halts'] = $halts;
        $data['fares'] = $fares;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the instance and fare values from the form
            $instance = $_POST['instance'];
            $fare = $_POST['fare'];
            
            // Insert the new data into the database
            
            $fareinstance->addFare($_POST);
            
            // Redirect back to the same page to prevent form resubmission
            redirect('schedfares');
        }
        

        $data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $this->view('schedfare', $data);

        
        
    }
    
    public function api_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            
            // Process the request data and perform the update
            $fare = new Fareinstance();
            // remove field availability from the array
            $id = $postData['instance'];
            unset($postData['instance']);
            $data = [];
            foreach($postData as $key => $value){
                    $data[$key] = $value;
            }
            $fare->updateFareinstance($id, $data);
        
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
   
    // public function api_delete()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Retrieve the POST data
    //         $postData = json_decode(file_get_contents('php://input'), true);

    //         // Process the request data and perform the update
    //         $fare = new Fare();
    //         $id = $postData['id'];
    //         $fare->deleteFares($id);
        
    //         // Send a response
    //         $response = array('status' => 'success', 'data' => $postData);
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     } else {
    //         $response = array('status' => 'error', 'data' => 'Invalid request');
    //         header('Content-Type: application/json');
    //         echo json_encode($response);
    //     }
    // }
    public function updateFareInstance()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Retrieve the POST data
            $p = $_POST['percentage'];
            $l = $_POST['limit'];
            $instance = new Fareinstance();
            $instance->updateInstanceByPercentage($p,$l);
        }
    }


}
