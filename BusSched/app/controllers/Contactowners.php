<?php
class Contactowners
{

    use Controller;

    public function index()
    {
        $contactowner = new Contactowner();
        $contactowners = $contactowner->getContactowners();

        // $data = [];
     
        $this->view('contactowner', ['contactowners' => $contactowners]);
    }

}