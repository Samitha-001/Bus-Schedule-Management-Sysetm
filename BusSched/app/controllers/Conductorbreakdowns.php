<?php


class Conductorbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
          // get username from session
        $conductor = $_SESSION['USER']->username;
        $breakdowns = $breakdown->getConductorBreakdowns($conductor);

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('conductorbreakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->userview('conductor', 'conductorbreakdown', ['breakdowns' => $breakdowns]);
    }
}