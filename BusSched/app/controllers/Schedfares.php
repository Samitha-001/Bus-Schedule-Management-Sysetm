<?php


class Schedfares
{

    use Controller;

    public function index()
    {
        $schedfare = new Schedfare();
        $schedfares = $schedfare->getFares();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($schedfare->validate($_POST)) {
                $schedfare->insert($_POST);
                redirect('schedfares');
            }

            $data['errors'] = $schedfare->errors;
        }

        $this->view('schedfare', ['schedfares' => $schedfares]);
    }
}
