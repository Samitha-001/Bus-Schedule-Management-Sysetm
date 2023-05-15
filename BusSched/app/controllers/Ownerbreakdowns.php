<?php

class OwnerBreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
          // get username from session
         $owner = $_SESSION['USER']->username;
        $breakdowns = $breakdown->getOwnerBreakdowns($owner,'repairing');

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('ownerbreakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->userview('owner', 'ownerbreakdown', ['breakdowns' => $breakdowns]);
    }

       // function to call when breakdown is repaired
       public function repairBreakdown($id) {
        $breakdown = new Breakdown();
        $breakdown->updateBreakdown($id, ['status' => "repaired"]);

        redirect('ownerbreakdowns');
    }


     // function to modify breakdown
     public function modifyOwnerBreakdown($id) {
        $breakdown = new Breakdown();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $breakdown->updateOwnerBreakdown($id, $_POST);
            redirect('ownerbreakdowns');
        }
    }

    // repair breakdown api
    public function api_repair_breakdown() 
    {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            $breakdown = new Breakdown();
            $breakdown->repairBreakdown($postData['breakdownID']);

            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requests');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    
    // function to modify breakdown
    public function modifyBreakdown($id) {
        $breakdown = new Breakdown();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $breakdown->update($id, ['time_to_repair'=>$_POST['time_to_repair']]);
//            show($id);
             redirect('ownerbreakdowns');
        }
    }
}
