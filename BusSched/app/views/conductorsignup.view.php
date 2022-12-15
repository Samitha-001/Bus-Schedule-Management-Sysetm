<?php
if (isset($_SESSION['USER'])) {
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
  <title>Conductor - Sign Up</title>

  
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>

<body>

  <nav class="navbar">
    <div>
      <h2><a href="<?= ROOT ?>/home" id="logo-white">BusSched</a></h2>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
      <div class="menu">

        <li><a href="#">Services</a></li>
        <li><a href="#">About</a></li>
        <a href="<?= ROOT ?>/login">
          <li class="button-orange">Login</li>
        </a>
        <a href="<?= ROOT ?>/signup">
          <li class="button-orange">Sign Up</li>
        </a>
  </nav>
  <br>
  <br>
  <br>
  <br>

  <h3>Conductor</h3>
  <h1 style="text-align:center">Create Account</h1>

  <br>

  <!-- SIGN UP FORM - PASSENGER -->
  <main class="sec1">
    
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs" checked="checked">
      <label for="passenger"><a href="<?= ROOT ?>/passengersignup">Passenger</a></label>
      <div class="tab form-bg center">
        <form action="" class=" sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email">
          </div>

          <div class="input-field">
            <input type="text" placeholder="User Name" name="username">
          </div>

          <div class="input-field">
            <input type="password" placeholder="Password" name="password">
          </div>

          <div class="input-field">
            <input type="password" placeholder="Confirm Password" name="pwdRepeat">
          </div>

          <!-- <input type="submit" class="btn" name="signup" value="Sign Up"> -->
          <br>
          <br>
          <button class="button-orange" type="submit">Create</button><br><br>
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>

          <div class="create_account">
            <p>Already have an account?</p>
            
            <p><a href="#"> Login</a></p>
          </div>

        </form>
      </div>
      <input type="radio" id="driver" name="mytabs" checked="checked">
      <label for="driver"><a href="<?= ROOT ?>/driversignup">Driver</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email">
          </div>
          <div class="input-field">
            <input type="text" placeholder="User Name" name="username">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Password" name="password">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Confirm Password" name="pwdRepeat">
          </div>
          <input type="submit" class="btn" name="signup" value="Sign Up">
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>
            <p><a href="#">Login</a></p>
          </div>
        </form>
      </div>
      <input type="radio" id="conductor" name="mytabs" checked="checked">
      <label for="conductor"><a href="<?= ROOT ?>/conductorsignup">Conductor</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email">
          </div>
          <div class="input-field">
            <input type="text" placeholder="User Name" name="username">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Password" name="password">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Confirm Password" name="pwdRepeat">
          </div>
          <input type="submit" class="btn" name="signup" value="Sign Up">
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>
            
            <p><a href="<?= ROOT ?>/conductorlogin">Login</a></p>
          </div>
        </form>
      </div>
      <input type="radio" id="owner" name="mytabs" checked="checked">
      <label for="owner"><a href="<?= ROOT ?>/ownersignup">Bus Owner</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email">
          </div>
          <div class="input-field">
            <input type="text" placeholder="User Name" name="username">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Password" name="password">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Confirm Password" name="pwdRepeat">
          </div>
          <input type="submit" class="btn" name="signup" value="Sign Up">
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>
            <p><a href="#">Login</a></p>
          </div>
        </form>
      </div>
      <input type="radio" id="scheduler" name="mytabs" checked="checked">
      <label for="scheduler"><a href="<?= ROOT ?>/schedulersignup">Scheduler</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email">
          </div>
          <div class="input-field">
            <input type="text" placeholder="User Name" name="username">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Password" name="password">
          </div>
          <div class="input-field">
            <input type="password" placeholder="Confirm Password" name="pwdRepeat">
          </div>
          <input type="submit" class="btn" name="signup" value="Sign Up">
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>
            
            <p><a href="<?= ROOT ?>/conductorlogin">Login</a></p>
            
          </div>
        </form>
      </div>
    </div>

    </div>
    <!-- <form method="post">

      <div class="form-bg center">

        <div>
          <input name="username" type="text" class="form-control" id="username" placeholder="Username..."><br><br>
          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..."><br><br>
          <input name="password" type="password" class="form-control" id="floatingPassword"
            placeholder="Password..."><br><br>
          <input name="pwdRepeat" type="password" class="form-control" id="pwdRepeat" placeholder="Confirm Password...">
          <br>
          <br>
          <button class="button-orange" type="submit">Create</button><br><br>

          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>

        </div>

      </div>

      <div class="form-footer center">Already have an account? <a href="<?= ROOT ?>/passengerlogin">Login</a></div>
    </form> -->

</body>

</html>
