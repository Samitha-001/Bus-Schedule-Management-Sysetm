<?php
class Ownercontactdrivers
{

    use Controller;

    public function index()
    {
        $contactdriver = new Ownercontactdriver();
        $contactdrivers = $contactdriver->getContactdrivers();

        // $data = [];
     
        $this->userview('owner', 'ownercontactdriver', ['ownercontactdrivers' => $contactdrivers]);
    }

}