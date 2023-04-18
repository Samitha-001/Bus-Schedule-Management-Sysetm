<?php
class Contactdrivers
{

    use Controller;

    public function index()
    {
        $contactdriver = new Contactdriver();
        $contactdrivers = $contactdriver->getContactdrivers();

        // $data = [];
     
        $this->view('contactdriver', ['contactdrivers' => $contactdrivers]);
    }

}