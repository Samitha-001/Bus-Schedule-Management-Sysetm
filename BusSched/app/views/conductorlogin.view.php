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
  <title>Conductor - Login</title>


  <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar">
    <div>
      <h2><a href="<?= ROOT ?>/home" id="logo_white">BusSched</a></h2>
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
  <h1 style="text-align:center" class="center">Login</h1><br>

  <br>
  <!-- LOGIN FORM FOR ADMIN -->


  <form method="post">
    <div class="form-bg center">
      <div>
        <input name="email" type="text" class="form-control" id="floatingInput" placeholder="Username or email..."
          required><br><br>
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..."
          required><br><br>

        <button class="button-orange" type="submit">Login</button>
      </div>

      <div class="errors">
        <br>
        <?php if (!empty($errors)): ?>
        <?= implode("<br>", $errors) ?>
          <?php endif; ?>
      </div>

    </div>

    <div class="form-footer center">Don't have an account? <a href="<?= ROOT ?>/conductorsignup">Register</a></div>

  </form>

</body>

</html>