<?php


class OwnerBreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new OwnerBreakdown();
        $breakdowns = $breakdown->getBreakdowns();

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['bus_no'] = strtoupper($_POST['bus_no']);
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('ownerbreakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->userview('owner', 'ownerbreakdown', ['ownerbreakdowns' => $breakdowns]);
    }
}
