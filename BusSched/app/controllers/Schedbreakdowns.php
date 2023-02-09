<?php


class Schedbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdowns();

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['bus_no'] = strtoupper($_POST['bus_no']);
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('breakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->view('schedulebreakdown', ['breakdowns' => $breakdowns]);
    }
}
