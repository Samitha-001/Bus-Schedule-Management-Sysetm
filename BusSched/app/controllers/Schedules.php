<?php


class Schedules
{

    use Controller;

    public function index()
    {
        $sched = new Schedule();
        $bus = new Bus();
        $buses = $bus->getBuses();
        // $scheds = $schedule->generateSchedule();
        // $schedules = $schedule->generateSchedule1($scheds);
        $busesOfA = [];
        $busesOfB = [];
        
        $bus = json_decode(json_encode($buses), true);
        
        $schedules = $sched->busSchedule($bus, date('Y/m/d'));
        $schedNext = null;
        // if(isset($_POST['gen'])){
        //     $schedNext = $sched->nextDaySchedule();
        // }
            // if(isset($_POST['action']) && $_POST['action'] == 'get_data'){
            //     $schedNext = $sched->nextDaySchedule();
            //     echo $schedNext;
            // }

        $data = [];
                
                $sched->insertMany($schedules);

            

            $data['errors'] = $sched->errors;
    

        $this->view('schedule', ['schedules' => $schedules]);
    }

    // public function scheduleGenerate(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Retrieve the POST data
    //         $postData = json_decode(file_get_contents('php://input'), true);

    //         $schedule = new Schedule();
    //         $bus = new Bus();
    //         $buses = $bus->getBuses();
    //     // $scheds = $schedule->generateSchedule();
    //     // $schedules = $schedule->generateSchedule1($scheds);
        
    //     $bus = json_decode(json_encode($buses), true);
        
    //     $schedules = $schedule->busSchedule($bus, date("Y-m-d"));
    //     }
    //     return $sche
    
// }

    public function generate(){
        $trip = new Schedule();
        $bus = new Bus();
        $buses = $bus->getBuses();

        $currentDate = date('Y/m/d');
        $nextDate = date('Y/m/d', strtotime($currentDate.'1 day'));
        $bus = json_decode(json_encode($buses), true);
        $sched = $trip->busSchedule($bus, $nextDate);
        echo json_encode(array($sched, $nextDate));
    }

    public function api_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $trip = new Schedule();
            $id = $postData['id'];
            // $trip->removeTrip($id);
        
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
