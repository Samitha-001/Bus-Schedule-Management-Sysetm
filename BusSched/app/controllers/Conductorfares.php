<?php


class Conductorfares
{

    use Controller;

    public function index()
    {
        $conductorfare = new Conductorfare();
        $conductorfares = $conductorfare->getFares();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($conductorfare->validate($_POST)) {
                $conductorfare->insert($_POST);
                redirect('conductorfares');
            }

            $data['errors'] = $conductorfare->errors;
        }

        $this->view('conductorfare', ['conductorfares' => $conductorfares]);
    }
}
