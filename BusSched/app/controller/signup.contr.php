<?php

include('../core/connection.php'); 

    error_reporting(0);
    session_start();



//Signup Process



    if(isset($_POST['signup'])){
        $email_address = mysqli_real_escape_string($connction, $_POST['signup_email']);
        $user_name = mysqli_real_escape_string($connction, $_POST['signup_username']);
        $password = mysqli_real_escape_string($connction, md5($_POST['signup_password']));
        $c_password = mysqli_real_escape_string($connction, md5($_POST['signup_cpassword']));

        $check_registered_email = mysqli_num_rows(mysqli_query($connction, "SELECT username FROM users WHERE email='$email_address' ")); 

        if($password !== $c_password){
            echo "<script> alert('password didnt match');</script>";
        }elseif($check_registered_email> 0){
            echo "<script>alert('already registered');</script>";
        }else{
            $sql_query = "INSERT INTO users (username, email, password, role) VALUES('$user_name', '$email_address', '$password', 'Scheduler')";
            $result = mysqli_query($connction, $sql_query);
            if($result){
                $_POST['signup_email'] = "";
                $_POST['signup_username'] = "";
                $_POST['signup_password'] = "";
                $_POST['signup_cpassword'] = "";
                echo "<script>alert('registered successfully');</script>";
                header("Location: login.php");
            }else{
                echo "<script>alert('registration failed');</script>";
            }

        }
    }


?>



