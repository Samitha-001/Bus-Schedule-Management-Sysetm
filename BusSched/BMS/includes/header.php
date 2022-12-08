<?php 
  require_once('connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/head_style.css">
    <link rel="stylesheet" href="css/head_style.css">
    
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
   
    <header>
      <a href="#" class="logo"><img src="<?php echo "img/Logo.png"?>"></a>

      <input type="checkbox" id="menu-bar">
      <label for="menu-bar">Menu</label>

      <nav class="navbar">
        <ul>
          <li><a href="#">Services</a></li>
          <li><a href="#">About</a></li>
          <li><a href="login.php" class="lg_sg" id="lg">Login</a></li>
          <li><a href="signup.php" class="lg_sg" id="sg">SignUp</a></li>
        </ul>
      </nav>
    </header>
    