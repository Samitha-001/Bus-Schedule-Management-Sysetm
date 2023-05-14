
<?php


class Ownerregisterbus
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        // get username from session
        $owner = $_SESSION['USER']->username;
        $buses = $bus->getBuses();

        $conductor = new Conductor();
        $unassigned_conductors = $conductor->getUnassignedConductors();

        $driver = new Driver();
        $unassigned_drivers = $driver->getUnassignedDrivers();
        
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

        $this->userview('owner', 'ownerregisterbus', ['buses' => $buses, 'unassigned_conductors' => $unassigned_conductors, 'unassigned_drivers' => $unassigned_drivers, 'data' => $data, ]);
    }

    // register bus
    public function registerBus()
    {
        $bus = new Bus();
        // get username from session
        $owner = $_SESSION['USER']->username;
        $buses = $bus->getBuses();
        
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            // add session user id to the POST
            $_POST['owner'] = $owner;
            
            $bus->addBus($_POST);
            redirect('ownerbuses');
        }
    }
}
