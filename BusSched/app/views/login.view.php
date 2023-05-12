
<!doctype html>
<html lang="en">

<head>
  <?php include 'components/head.php';?>

  <title>Login</title>

  <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php
  include 'components/navbar.php';
  if (isset($_SESSION['USER'])) {
    redirect('adminhome');
  }
  ?>
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