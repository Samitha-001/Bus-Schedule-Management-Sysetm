<?php
if (isset($_SESSION['USER'])) {
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
  <title>Bus Owner - Login</title>


  <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
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
        <a href="<?= ROOT ?>/ownererlogin">
          <li class="button-orange" style="background-color:black; border: 2px solid #f4511e;">Login</li>
        </a>
        <a href="<?= ROOT ?>/ownersignup">
          <li class="button-orange" style="border: 2px solid #f4511e;">Sign Up</li>
        </a>

  </nav>
  <br>
  <br>
  <br>

  <h3 class="center">Bus Owner</h3>
  <h1 style="text-align:center" class="center">Login</h1><br>

  <!-- LOGIN FORM FOR BUS OWNER -->

  <main class="sec1">
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs">
      <label for="passenger"><a href="<?= ROOT ?>/passengerlogin">Passenger</a></label>
      <div class="tab form-bg center">
      </div>
      <input type="radio" id="driver" name="mytabs">
      <label for="driver"><a href="<?= ROOT ?>/driverlogin">Driver</a></label>
      <div class="tab">
      </div>
      <input type="radio" id="conductor" name="mytabs">
      <label for="conductor"><a href="<?= ROOT ?>/conductorlogin">Conductor</a></label>
      <div class="tab">
      </div>
      <input type="radio" id="owner" name="mytabs">
      <label for="owner"><a href="<?= ROOT ?>/ownerlogin">Bus Owner</a></label>
      <div class="tab">
      </div>
      <input type="radio" id="scheduler" name="mytabs" checked="checked">
      <label for="scheduler"><a href="<?= ROOT ?>/schedulerlogin">Scheduler</a></label>
      <div class="tab center">
        <form action="" class="sign-up-form" method="post">
          <div class="input-field">
            <div>
              <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..."
                required><br><br>
              <input name="password" type="password" class="form-control" id="floatingPassword"
                placeholder="Password..." required><br><br>
              <button class="button-orange" type="submit">Login</button>
            </div>
            <div class="errors">
              <?php if (!empty($errors)): ?>
              <?= implode("<br>", $errors) ?>
                <?php endif; ?>
            </div>
          </div>
          <div class="center form-footer">Don't have an account? <a href="<?= ROOT ?>/schedulersignup">Register</a>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>

</html>