<?php


class Halts {

    use Controller;

    public function index() {
        $halt = new Halt();
        $halts = $halt->getHalts();

        $data = [];
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if($halt->validate($_POST)) {
                $halt->insert($_POST);

                redirect('halts');
            }

            $data['errors'] = $halt->errors;
        }


		$this->view('halt', ['halts' => $halts]);
    }
}
