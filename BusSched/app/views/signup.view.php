<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Passenger - Sign Up</title>

  <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
</head>
<body>
  <h2><a href="<?=ROOT?>" id="logo_white">BusSched</a></h2>
  
    <h3>Passenger</h3>
    <h1 style="text-align:center">Create Account</h1>

<!-- SIGN UP FORM - PASSENGER -->
  <form method="post">

    <div id="form_bg" class="center">
      
      <div>
        <input name="username" type="text" class="form-control" id="username" placeholder="Username..."><br><br>
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..."><br><br>
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..."><br><br>
        <input name="pwdRepeat" type="password" class="form-control" id="pwdRepeat" placeholder="Confirm Password...">
        <br>
        <br>
        <button class="button-orange" type="submit">Create</button><br><br>
        <?php if(!empty($errors)):?>
        <?= implode("<br>", $errors)?>
        <?php endif;?>
  </div>

  </div>
  
  <div id="form_footer" class="center">Already have an account? <a href="<?=ROOT?>/login">Login</a></div>
  </form>

</body>
</html>
