<?php
class Conductorschedules
{

    use Controller;

    public function index()
    {
        $conductorschedule = new Conductorschedule();
        $conductorschedules = $conductorschedule->getConductorschedules();

        // $data = [];
     
        $this->view('conductorschedule', ['conductorschedules' => $conductorschedules]);
    }

}