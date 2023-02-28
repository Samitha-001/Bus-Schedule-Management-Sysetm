<?php

class Adminbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdowns();

        if (isset($_GET['delete'])) {
            $breakdown->deleteBreakdown($_GET['delete']);
            redirect('adminbreakdowns');
        }
        
        $this->userview('admin', 'adminbreakdowns', ['breakdowns' => $breakdowns]);
    }
}