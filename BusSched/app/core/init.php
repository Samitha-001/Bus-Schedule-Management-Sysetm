<!-- file that loads all the files that needs to be loaded -->
<?php

// if a class that doesn't exist is called, this function will be called
spl_autoload_register(function($classname) { 
    require $filename = "../app/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';    // model extends Database.php. So order is important
require 'Controller.php';
require 'App.php';