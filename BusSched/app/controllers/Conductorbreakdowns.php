<?php
class Conductorbreakdowns
{
    use Controller;

    public function index()
    {
        $username = $_SESSION['USER']->username;
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getConductorBreakdowns($username);
        
        $this->userview('conductor', 'breakdown', ['breakdowns' => $breakdowns]);
    }

    // function to add new breakdown
    public function api_add_breakdown(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $post = json_decode(file_get_contents('php://input'), true);
            $trip = $post['trip_id'];
            $bus = $post['bus_no'];
            $description = $post['description'];
            $time_to_repair = $post['time_to_repair'];
            $breakdown = new Breakdown();
            $breakdown->addBreakdown(['bus_no'=>$bus,'description'=>$description,'time_to_repair'=>$time_to_repair],$trip);
            $breakdown->sendBreakdownNotification($bus,$trip);
            $breakdown->breakdownDecision($trip,$time_to_repair);
            $response = array('status' => 'success', 'data' => $post);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    // function to call when breakdown is repaired
    public function repairBreakdown($id) {
        $breakdown = new Breakdown();
        $breakdown->repairBreakdown($id);
        redirect('conductorbreakdowns');
    }

    // function to modify breakdown
    public function modifyBreakdown($id) {
        $breakdown = new Breakdown();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $breakdown->update($id, ['time_to_repair'=>$_POST['time_to_repair']]);
            // return ($_POST);
            redirect('conductorbreakdowns');
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

}
