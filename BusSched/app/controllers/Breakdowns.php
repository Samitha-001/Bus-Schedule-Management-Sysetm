<?php
class Breakdowns
{
    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdowns();

        $un_buses = new UnavailableBus();
        // $un_buses->add(array("",$breakdowns['bus_no'], 0, date('Y-m-d') ));
        

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['bus_no'])) {
                $_POST['bus_no'] = strtoupper($_POST['bus_no']);
            }
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);
                $un_buses->add(array( 'bus_no'=> $_POST['bus_no'], 'date'=>date('Y-m-d')));
                redirect('breakdowns');
            }
        
            $data['errors'] = $breakdown->errors;
        }
        $this->view('breakdown', ['breakdowns' => $breakdowns,'status'=>"repairing"]);
    }

    public function addBreakdown(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $trip = $_POST['trip_id'];
            $bus = $_POST['bus_no'];
            $description = $_POST['description'];
            $time_to_repair = $_POST['time_to_repair'];
            (new Breakdown())->addBreakdown(['bus_no'=>$bus,'description'=>$description,'time_to_repair'=>$time_to_repair],$trip);
            redirect('breakdowns');
        }
    }
}
