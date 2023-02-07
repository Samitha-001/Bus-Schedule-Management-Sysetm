<?php
    if(isset($_SESSION['USER'])){
        redirect('home');
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Scheduler Login</title>


  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
  
  <h2><a href="<?=ROOT?>" id="logo_white">BusSched</a></h2>

  <h3 class="center">User</h3>
  <h1 style="text-align:center" class="center">Scheduler Login</h1><br>

  <!-- LOGIN FORM FOR ALL USERS -->
  
  <main class="sec1">
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs" checked="checked">
      <label for="passenger"><a href="<?= ROOT ?>/passengerlogin">Passenger</a></label>
      <div class="tab form-bg center">
        <form action="" class=" sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>

        </form>
      </div>
      <input type="radio" id="driver" name="mytabs" checked="checked">
      <label for="driver"><a href="<?= ROOT ?>/driverlogin">Driver</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>
        </form>
      </div>
      <input type="radio" id="conductor" name="mytabs" checked="checked">
      <label for="conductor"><a href="<?= ROOT ?>/conductorlogin">Conductor</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>
        </form>
      </div>
      <input type="radio" id="owner" name="mytabs" checked="checked">
      <label for="owner"><a href="<?= ROOT ?>/ownerlogin">Bus Owner</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>
        </form>
      </div>
      <input type="radio" id="scheduler" name="mytabs" checked="checked">
      <label for="scheduler"><a href="<?= ROOT ?>/schedulerlogin">Scheduler</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>
        </form>
      </div>
    </div>
  </main>

</body>
</html>