
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
        
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($bus->validate($_POST)) {
                // add session user id to the POST
                $_POST['owner'] = $owner;

                // if conductor is empty, remove it from the POST
                if (empty($_POST['conductor'])) {
                    unset($_POST['conductor']);
                }
                // if driver is empty, remove it from the POST
                if (empty($_POST['driver'])) {
                    unset($_POST['driver']);
                }
                // if start is empty, remove it from the POST
                if (empty($_POST['start'])) {
                    unset($_POST['start']);
                }
                // if dest is empty, remove it from the POST
                if (empty($_POST['dest'])) {
                    unset($_POST['dest']);
                }
                $bus->addBus($_POST);
                redirect('ownerbuses');
            }
            
            $data['errors'] = $bus->errors;
        }

        $this->userview('owner', 'ownerregisterbus', ['buses' => $buses]);
    }
}
