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
        $breakdown->updateBreakdown($id, ['status' => "repaired"]);

        redirect('breakdowns');
    }

    // function to modify breakdown
    public function modifyBreakdown($id) {
        $breakdown = new Breakdown();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $breakdown->updatemyBreakdown($id, $_POST);
            redirect('breakdowns');
        }
    }

}
