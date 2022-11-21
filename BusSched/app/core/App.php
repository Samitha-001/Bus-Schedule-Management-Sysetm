<?php

class App{
    // default controller & method
    private $controller = "Home";
    private $method = "index";

    // function split the url into an array by the / character
    private function splitURL(){
        $URL = $_GET['url'] ?? 'home';
        $URL = explode('/', trim($URL, '/'));
        return($URL);
    }
    
    // function to load the page (controller)
    public function loadController(){
        $URL = $this->splitURL();
        
        // check if the controller exists and selects it
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        if(file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }
        else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        
        // instantiates controller
        $controller = new $this->controller;

        // checks if method exists and selects it
        if(!empty($URL[1])) {
            if(method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        
        call_user_func_array([$controller, $this->method], $URL);
    }
}
