<?php
class Ownercontactconductors
{

    use Controller;

    public function index()
    {
        $contactconductor = new user();
        $contactconductors = $contactconductor->getContactDetails('conductor');

        // $data = [];
     
        $this->userview('owner', 'ownercontactconductor', ['ownercontactconductors' => $contactconductors]);
    }

}