<?php


class Schedules
{

    use Controller;

    public function index()
    {
        $schedule = new Schedule();
        $bus = new Bus();
        $buses = $bus->getBuses();
        // $scheds = $schedule->generateSchedule();
        // $schedules = $schedule->generateSchedule1($scheds);
        
        $bus = json_decode(json_encode($buses), true);
        
        $schedules = $schedule->schedule($bus);
        
        

        $data = [];

            if ($schedule->validate($schedules)) {
                $schedule->insertMany($schedules);
                redirect('schedules');
            }

            $data['errors'] = $schedule->errors;
    

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
