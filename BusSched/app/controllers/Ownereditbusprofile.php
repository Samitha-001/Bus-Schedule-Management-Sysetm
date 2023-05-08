
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
        
  
        $this->userview('owner', 'ownereditbusprofile', ['buses' => $buses]);
    }

    public function updateOwnerBus()
    {
        $bus = new Bus();
        // $data = $_POST['']
        $bus->updateBus($_POST['id'], $_POST);

        $redirectto = "ownereditbusprofile?bus_id=".$_POST['id'];
        redirect($redirectto);
    }

    
}

