<?php
class Ownercontactowners
{

    use Controller;

    public function index()
    {
        $contactowner = new contact();
        $contactowners = $contactowner->getContact();

        // $data = [];
     
        $this->userview('owner', 'ownercontactowner', ['ownercontactowners' => $contactowners]);
    }

}