<?php
class Ownercontactdrivers
{

    use Controller;

    public function index()
    {
        $contactdriver = new user();
        $contactdrivers = $contactdriver->getContactDetails('driver');

        // $data = [];
     
        $this->userview('owner', 'ownercontactdriver', ['ownercontactdrivers' => $contactdrivers]);
    }

}