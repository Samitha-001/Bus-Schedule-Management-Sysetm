<?php


class Ownerfares
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
                redirect('ownerfares');
            }

            $data['errors'] = $fare->errors;
        }

        $this->userview('owner', 'ownerfare', ['fares' => $fares,'halts'=>$halts]);
    }
}
