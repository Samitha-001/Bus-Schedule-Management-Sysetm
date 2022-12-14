<?php
if (isset($_SESSION['USER'])) {
  redirect('admins');
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Bus Owner- Sign Up</title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>

<body>
  <h2><a href="<?= ROOT ?>" id="logo_white">BusSched</a></h2>

  <h3>Bus Owner</h3>
  <h1 style="text-align:center">Create Account</h1>

  <!-- SIGN UP FORM - BUS OWNER -->
  <main class="sec1">
    <div class="mytabs">
      <input type="radio" id="passenger" name="mytabs">
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
      <input type="radio" id="driver" name="mytabs">
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
      <input type="radio" id="conductor" name="mytabs">
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
            <p><a href="#">Login</a></p>
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
      <input type="radio" id="scheduler" name="mytabs">
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
            <p><a href="<?= ROOT ?>/schedulerlogin">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>




</body>

</html>