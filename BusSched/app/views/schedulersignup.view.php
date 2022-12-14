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
  <title>Scheduler - Sign Up</title>

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
        <a href="<?= ROOT ?>/passengerlogin">
          <li class="button-orange" style="background-color:black; border: 2px solid #f4511e;">Login</li>
        </a>
        <a href="<?= ROOT ?>/passengersignup">
          <li class="button-orange" style="border: 2px solid #f4511e;">Sign Up</li>
        </a>
  </nav>
  <br>
  <br>

  <h3>Scheduler</h3>
  <h1 style="text-align:center">Create Account</h1>

  <!-- SIGN UP FORM - SCHEDULER -->
  <main class="sec1">
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs" checked="checked">
      <label for="passenger"><a href="<?= ROOT ?>/passengersignup">Passenger</a></label>
      <div class="tab center">
      </div>

      <input type="radio" id="driver" name="mytabs" checked="checked">
      <label for="driver"><a href="<?= ROOT ?>/driversignup">Driver</a></label>
      <div class="tab">
      </div>

      <input type="radio" id="conductor" name="mytabs" checked="checked">
      <label for="conductor"><a href="<?= ROOT ?>/conductorsignup">Conductor</a></label>
      <div class="tab">
      </div>

      <input type="radio" id="owner" name="mytabs" checked="checked">
      <label for="owner"><a href="<?= ROOT ?>/ownersignup">Bus Owner</a></label>
      <div class="tab">
      </div>

      <input type="radio" id="scheduler" name="mytabs" checked="checked">
      <label for="scheduler"><a href="<?= ROOT ?>/schedulersignup">Scheduler</a></label>
      <div class="tab">
        <form action="" class="sign-up-form" method="post">
          <div class="input-field">
            <input type="email" placeholder="Email Address..." name="email" class="form-control">
          </div>

          <div class="input-field">
            <input type="text" placeholder="Username..." name="username" class="form-control">
          </div>

          <div class="input-field">
            <input type="password" placeholder="Password..." name="password" class="form-control">
          </div>

          <div class="input-field">
            <input type="password" placeholder="Confirm Password..." name="pwdRepeat" class="form-control">
          </div>

          <button class="button-orange" type="submit">Create</button><br><br>
          <div class="errors">
            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
              <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>
            <p><a href="<?= ROOT ?>/schedulerlogin">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>


</body>

</html>