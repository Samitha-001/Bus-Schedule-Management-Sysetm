<?php
if (isset($_SESSION['USER'])) {
  redirect('adminhome');
}
?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login</title>

    <script src="<?= ROOT ?>/assets/js/menu.js"></script>
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
      <button class="log-in-btn">Log in</button>
      </div>
      <div class="sign-up"></div>
      <button class="sign-up-btn">Sign up</button>
      </div>
    </nav>
    <div class="menu">
    <ul>
      <li><a href="<?= ROOT ?>/dashboard">Dashboard</a></li>
      <li><a href="<?= ROOT ?>/location">Location</a></li>
      <li><a href="<?= ROOT ?>/schedule">Schedules</a></li>
      <li><a href="<?= ROOT ?>/ratings">Ratings</a></li>
      <li><a href="<?= ROOT ?>/buses">Buses</a></li>
      <li><a href="<?= ROOT ?>/breakdowns">Breakdowns</a></li>
      <li><a href="<?= ROOT ?>/fare">Bus Fare</a></li>
      <li><a href="<?= ROOT ?>/bustickets">Bus Tickets</a></li>
      <li><a href="<?= ROOT ?>/contacts">Contacts</a></li>
    </ul>
    </div>
  </header>
  <br>
  <br>
  <br>
 

  <h3>User</h3>
  <h1 style="text-align:center" class="center">Login</h1><br>

  <br>

  <form method="post">
    <div class="form-bg center">
      <div>
        <input name="email" type="text" class="form-control" id="floatingInput" placeholder="Username or email..." required><br><br>
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>

        <button class="button-orange" type="submit">Login</button>
      </div>

      <div class="errors">
        <br>
        <?php if (!empty($errors)) : ?>
          <?= implode("<br>", $errors) ?>
        <?php endif; ?>
      </div>

      <p style="color: #24315e; text-align:center;">Don't have an account? <a href="<?= ROOT ?>/conductorsignup">Register</a></p>
    </div>

  </form>

</body>

</html>