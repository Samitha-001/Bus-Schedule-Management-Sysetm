<?php

class Adminfares
{
    use Controller;

    public function index()
    {
        $halt = new Halt();
        $halts = $halt->getHalts();
        $data['halts'] = $halts;

        // if (isset($_GET['delete'])) {
        //     $rating->deleteRating($_GET['delete']);
        //     redirect('adminratings');
        // }

        $this->userview('admin', 'adminfares', $data);
    }
}