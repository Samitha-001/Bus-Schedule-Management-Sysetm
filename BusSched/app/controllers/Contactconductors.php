<?php
class Contactconductors
{

    use Controller;

    public function index()
    {
        $contactconductor = new Contactconductor();
        $contactconductors = $contactconductor->getContactconductors();

        // $data = [];
     
        $this->view('contactconductor', ['contactconductors' => $contactconductors]);
    }

}