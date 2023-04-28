
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



    public function api_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);

            // Process the request data and perform the update
            $bus = new Bus();
            $id = $postData['id'];
            $bus->deleteBus($id);
        
            // Send a response
            $response = array('status' => 'success', 'data' => $postData);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid request');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}

