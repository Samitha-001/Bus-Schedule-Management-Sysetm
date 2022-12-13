<?php


class Breakdowns {

    use Controller;

    public function index() {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdown();

        $data = [];
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('breakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }

		$this->view('bus', ['buses' => $breakdowns]);
    }
}