<?php

class Adminbuses
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        $buses = $bus->getBuses();

        if (isset($_GET['delete'])) {
            $bus->deleteBus($_GET['delete']);
            redirect('adminbuses');
        }
        
        $this->userview('admin', 'adminbuses', ['buses' => $buses]);
    }
}