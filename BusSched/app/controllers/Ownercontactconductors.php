<?php
class Ownercontactconductors
{

    use Controller;

    public function index()
    {
        $contactconductor = new contact();
        $contactconductors = $contactconductor->getContact();

        // $data = [];
     
        $this->userview('owner', 'ownercontactconductor', ['ownercontactconductors' => $contactconductors]);
    }

}