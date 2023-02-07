<?php


class Halts
{

    use Controller;

    public function index()
    {
        $halt = new Halt();
        $halts = $halt->getHalts();

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($halt->validate($_POST)) {
                $halt->addHalt($_POST);
                redirect('halts');
            }
        }

        $data['errors'] = $halt->errors;
        $data['halts'] = $halts;
        $this->view('halt', $data);
    }
}
