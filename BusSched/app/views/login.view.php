<?php
    if(isset($_SESSION['USER'])){
        redirect('adminhome');
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login</title>


  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar">
    <div><h2><a href="<?=ROOT?>/home" class="logo_white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
    <div class="menu">
    
    
    <li class="button-orange"><a href="<?=ROOT?>/login">Login</a></li>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>

  <h3 class="center">Admin</h3>
  
  <h1 style="text-align:center" class="center">Login</h1><br>
  
  <br>
  <!-- LOGIN FORM FOR ALL USERS -->
  <form method="post">    
  <div id="form_bg" class="center">    
    <div>
      <input name="email" type="text" class="form-control" id="floatingInput" placeholder="Username or email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      
      <button class="button-orange" type="submit">Login</button>
    </div>

    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>

  </div>

  <div id="form_footer" class="center">Don't have an account? <a href="<?=ROOT?>/signup">Register</a></div>

  </form>

</body>
</html>