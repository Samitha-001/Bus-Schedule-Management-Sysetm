<?php


class Buses {

    use Controller;

    public function index() {
        $bus = new Bus();
        $buses = $bus->getBuses();

        $data = [];

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            show($_POST);
            if($bus->validate($_POST)) {
                $bus->insert($_POST);

                redirect('buses');
            }

            $data['errors'] = $bus->errors;
        }


		$this->view('bus', ['buses' => $buses]);
    }
}
