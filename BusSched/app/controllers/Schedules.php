<?php


class Schedules
{

    use Controller;

    public function index()
    {
        $schedule = new Schedule();
        $bus = new Bus();
        $buses = $bus->getBuses();
        $schedules = $schedule->generateSchedule();
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
