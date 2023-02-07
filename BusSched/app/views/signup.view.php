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
  <title>Admin - Sign Up</title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>

<body>


  <!-- SIGN UP FORM - ADMIN -->
  <!-- <form method="post">

    <div class="form-bg center">

      <div>
        <input name="username" type="text" class="form-control" id="username" placeholder="Username..."><br><br>
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..."><br><br>
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..."><br><br>
        <input name="pwdRepeat" type="password" class="form-control" id="pwdRepeat" placeholder="Confirm Password...">
        <br>
        <br>
        <button class="button-orange" type="submit">Create</button><br><br>

        <div class="errors">
          <?php if (!empty($errors)) : ?>
            <?= implode("<br>", $errors) ?>
          <?php endif; ?>
        </div>

      </div>

    </div>

    <div class="form-footer center">Already have an account? <a href="<?= ROOT ?>/login">Login</a></div>
  </form> -->
</body>

</html>