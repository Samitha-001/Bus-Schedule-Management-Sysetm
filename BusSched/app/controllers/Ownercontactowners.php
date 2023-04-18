<?php
class Ownercontactowners
{

    use Controller;

    public function index()
    {
        $contactowner = new Ownercontactowner();
        $contactowners = $contactowner->getContactowners();

        // $data = [];
     
        $this->userview('owner', 'ownercontactowner', ['ownercontactowners' => $contactowners]);
    }

}