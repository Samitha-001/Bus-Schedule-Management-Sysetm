<?php
class Ownercontactowners
{

    use Controller;

    public function index()
    {
        $contactowner = new Ownercontactowner();
        $contactowners = $contactowner->getContactowners();

        // $data = [];
     
        $this->view('ownercontactowner', ['ownercontactowners' => $contactowners]);
    }

}