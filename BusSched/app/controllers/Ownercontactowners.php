<?php
class Ownercontactowners
{

    use Controller;

    public function index()
    {
        $contactowner = new user();
        $contactowners = $contactowner->getContactDetails('owner');

        // $data = [];
     
        $this->userview('owner', 'ownercontactowner', ['ownercontactowners' => $contactowners]);
    }

}