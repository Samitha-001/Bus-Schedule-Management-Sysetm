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
}
