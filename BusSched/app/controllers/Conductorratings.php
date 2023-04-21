<?php

class Conductorratings
    {
        use Controller;
    
        public function index()
        {

            //  $rating= new Conductorratings();\
             $rating= new Conductorrating();
             $conductor = $_SESSION['USER']->id; 
             $ratings = $rating->getConductorRatings($conductor);

            //  $data = [];
            // if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //     if ($rating->validate($_POST)) {
            //         $rating->insert($_POST);
            //         redirect('condutorratings');
            // }

            // $data['errors'] = $rating->errors;
        //}

            $this->userview('conductor', 'conductorrating',['ratings' => $ratings]);
            // ,['ratings' => $ratings]
        }
    }


