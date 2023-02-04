<?php
if (isset($_SESSION['USER'])) {
  redirect('admins');
}
?>

<!DOCTYPE html>
<html>
<head>
  
  <script src="script.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Conductor - Sign Up</title>
  <!-- <script src="<?= ROOT ?>/assets/js/menu.js"></script> -->
  

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/mobilenav.css">
</head>
<body>
  <header>
    <nav>
      <div onclick="toggleMenu()">
        <button class="menu-toggle" ></button>
      </div>
      <div class="logo">
      <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png"></a>
      </div>
      <div class="log-in"></div>
      <button class="log-in-btn">Log In</button>
      <div class="sign-up">
        <button class="sign-up-btn">Sign Up</button>
      </div>
    </nav>
    <div class="menu">
    <ul>
      <li><a href="#services" onclick="goToSection()">Home</a></li>
      <li><a href="#services" onclick="goToSection()">Services</a></li>
      <li><a href="#about" onclick="goToSection()">About</a></li>
      <li><a href="#contact" onclick="goToSection()">Contact</a></li>
    </ul>
    </div>
  </header>
  <br>
  <br>

  <h3>Conductor</h3>
  <h1 style="text-align:center">Create Account</h1>

  <!-- SIGN UP FORM - SCHEDULER -->
  <main class="sec1">
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs">
      <label for="passenger"><a href="<?= ROOT ?>/passengersignup">Passenger</a></label>
      <div class="tab center">
      </div>

      <input type="radio" id="driver" name="mytabs">
      <label for="driver"><a href="<?= ROOT ?>/driversignup">Driver</a></label>
      <div class="tab">
      </div>

      <input type="radio" id="conductor" name="mytabs" checked="checked">
      <label for="conductor"><a href="<?= ROOT ?>/conductorsignup">Conductor</a></label>
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
            <?php if (!empty($errors)) : ?>
              <?= implode("<br>", $errors) ?>
            <?php endif; ?>
          </div>
          <div class="create_account">
            <p>Already have an account?</p>

            <p><a href="<?= ROOT ?>/login">Login</a></p>
          </div>
        </form>
      </div>
      <input type="radio" id="owner" name="mytabs">
      <label for="owner"><a href="<?= ROOT ?>/ownersignup">Bus Owner</a></label>
      <div class="tab">
      </div>

      <input type="radio" id="scheduler" name="mytabs">
      <label for="scheduler"><a href="<?= ROOT ?>/schedulersignup">Scheduler</a></label>
      <div class="tab">

      </div>
    </div>
  </main>


</body>

</html>