<?php

class OwnerBreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
          // get username from session
         $owner = $_SESSION['USER']->username;
        $breakdowns = $breakdown->getOwnerBreakdowns($owner);

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            if ($breakdown->validate($_POST)) {
                $breakdown->insert($_POST);

                redirect('ownerbreakdowns');
            }

            $data['errors'] = $breakdown->errors;
        }
        $this->userview('owner', 'ownerbreakdown', ['breakdowns' => $breakdowns]);
    }

       // function to call when breakdown is repaired
       public function repairBreakdown($id) {
        $breakdown = new Breakdown();
        $breakdown->updateBreakdown($id, ['status' => "repaired"]);

        redirect('ownerbreakdowns');
    }


     // function to modify breakdown
     public function modifyOwnerBreakdown($id) {
        $breakdown = new Breakdown();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $breakdown->updateOwnerBreakdown($id, $_POST);
            redirect('ownerbreakdowns');
        }
    }

}
