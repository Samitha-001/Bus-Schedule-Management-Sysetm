
<?php


class Ownerbuses
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        // get username from session
        $owner = $_SESSION['USER']->username;
        $buses = $bus->getOwnerBuses($owner);

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($bus->validate($_POST)) {
                $bus->insert($_POST);
                // redirect('registernew');
            }

            $data['errors'] = $bus->errors;
        }

        $this->view('ownerbus', ['buses' => $buses]);
    }
}
