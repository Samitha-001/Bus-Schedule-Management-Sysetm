<?php

class Adminratings
{
    use Controller;

    public function index()
    {
        $rating = new Rating();
        $ratings = $rating->getRatings();

        if (isset($_GET['delete'])) {
            $rating->deleteRating($_GET['delete']);
            redirect('adminratings');
        }

        $this->userview('admin', 'adminratings', ['ratings' => $ratings]);
    }
}