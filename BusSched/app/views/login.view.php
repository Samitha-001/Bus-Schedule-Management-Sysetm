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
  <form method="post">
    <div class="form-bg">
      <br>
      <h1 style="text-align:center" class="center">User Login</h1>
      <br>
      <div class="login-input">
        <input name="email" type="text" placeholder="Username or email..." required><br><br>
        <input name="password" type="password" placeholder="Password..." required><br><br>

        <button class="button-orange" type="submit">Login</button>
        <p style="color: #24315e; text-align:center;">Don't have an account? <a href="<?= ROOT ?>/passengersignup">Register</a></p>
      </div>

      <div class="errors">
        <br>
        <?php if (!empty($errors)) : ?>
          <?= implode("<br>", $errors) ?>
        <?php endif; ?>
      </div>

    </div>

  </form>


</body>

</html>