<?php
class Ownercontactconductors
{

    use Controller;

    public function index()
    {
        $contactconductor = new Ownercontactconductor();
        $contactconductors = $contactconductor->getContactconductors();

        // $data = [];
     
        $this->view('ownercontactconductor', ['ownercontactconductors' => $contactconductors]);
    }

}