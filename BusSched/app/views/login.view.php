<?php
include 'components/navbar.php';
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
  <title>Login</title>


  <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <br>
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

      <p style="color: #24315e; text-align:center;">Don't have an account? <a href="<?= ROOT ?>/passengersignup">Register</a></p>
    </div>

  </form>

</body>

</html>