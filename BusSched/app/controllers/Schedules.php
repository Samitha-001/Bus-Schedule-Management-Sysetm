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

        $numBusesFromA = 7;
        $numBusesFromB = 5;
        $constantBuses = 3;
        $schedules = $schedule->assignBusesToTimeSlots($numBusesFromA, $numBusesFromB, $constantBuses);
        

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {



            if ($schedule->validate($_POST)) {
                $schedule->insert($_POST);
                redirect('schedules');
            }

            $data['errors'] = $schedule->errors;
        }

        $this->view('schedule', ['schedules' => $schedules]);
    }
}
