<?php
class Busprofileconductors
{

    use Controller;

    public function index()
    {
        $busprofileconductor = new Busprofileconductor();
        $busprofileconductors = $busprofileconductor->getBusprofileconductors();

        // $data = [];
     
        $this->view('Busprofileconductor', ['busprofileconductors' => $busprofileconductors]);
    }

}