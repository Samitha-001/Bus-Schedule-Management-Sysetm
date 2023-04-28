<?php
class Ownercontactdrivers
{

    use Controller;

    public function index()
    {
        $contactdriver = new contact();
        $contactdrivers = $contactdriver->getContact();

        // $data = [];
     
        $this->userview('owner', 'ownercontactdriver', ['ownercontactdrivers' => $contactdrivers]);
    }

}