<?php

//  ROOT stores the absolute path to the root directory of the project
if($_SERVER['SERVER_NAME'] == 'localhost') {
    // database configuration
    define('DBNAME', 'bussched');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPWD', '');
    
    define('ROOT', 'http://localhost/Bus-Schedule-Management-System/bussched/public');
} else {
    // database configuration
    define('DBNAME', 'bussched');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPWD', '');

    define('ROOT', 'https://www.yourwebsite.com');
}

define('APP_NAME', 'BusSched');
define('APP_DESC', 'Bus Schedule Management System.');

define('DEBUG', true);      // true when in production (shows errors)