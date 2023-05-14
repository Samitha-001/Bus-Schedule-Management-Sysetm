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
    public function addBreakdown() {
        $breakdown = new Breakdown();
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['bus_no'] = strtoupper($_POST['bus_no']);
            if ($breakdown->validate($_POST)) {
                $breakdown->addBreakdown($_POST);

                redirect('breakdowns');
            }

            $data['errors'] = $breakdown->errors;
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
            $breakdown->updatemyBreakdown($id, $_POST);
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
