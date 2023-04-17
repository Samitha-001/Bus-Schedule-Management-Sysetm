<?php
class Conductorratings
{

    use Controller;

    public function index()
    {
        $conductorschedule = new Conductorrating();
        $conductorratings = $conductorschedule->getConductorratings();

        // $data = [];
     
        $this->view('conductorrating', ['conductorratings' => $conductorratings]);
    }

}