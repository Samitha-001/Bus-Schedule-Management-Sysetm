<?php


class Conductorfares
{

    use Controller;

    public function index()
    {
        $fare = new Fare();
        $fares = $fare->getFares();
       
        $halt = new Halt();
        $halts = $halt->getHalts();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($fare->validate($_POST)) {
                $fare->insert($_POST);
                redirect('conductorfares');
            }

            $data['errors'] = $fare->errors;
        }

        $this->view('conductorfare', ['fares' => $fares,'halts'=>$halts]);
    }
}
