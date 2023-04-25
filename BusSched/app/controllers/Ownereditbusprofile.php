
<?php


class Ownereditbusprofile
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        // get username from session
        $owner = $_SESSION['USER']->username;
        $buses = $bus->getBuses();
        
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($bus->validate($_POST)) {
                // add session user id to the POST
                $_POST['owner'] = $owner;
                $bus->addBus($_POST);
                redirect('ownerbuses');
            }
            
            $data['errors'] = $bus->errors;
        }

        $this->userview('owner', 'ownereditbusprofile', ['buses' => $buses]);
    }
}

