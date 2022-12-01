<?php 
    // $connction = mysqli_connect(dbserver, dbuser, dbpass, dbname);
    $host_name = 'localhost';
    $dbuser = 'root';
    $password = '';
    $dbname = 'login_register_scheduler';
    $connction = mysqli_connect($host_name,$dbuser, $password, $dbname);

    //check error
    if(mysqli_connect_errno()){
        die("Conncetion failed -> ". mysqli_connect_error());
    }
?>