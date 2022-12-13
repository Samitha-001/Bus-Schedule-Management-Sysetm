<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Scheduler Login</title>


  <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
  
  <h2><a href="<?=ROOT?>" id="logo_white">BusSched</a></h2>

  <h3 class="center">User</h3>
  <h1 style="text-align:center" class="center">Scheduler Login</h1><br>

  <!-- LOGIN FORM FOR ALL USERS -->
  <form method="post">    
  <div class="form-bg center">    
    <div>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email..." required><br><br>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password..." required><br><br>
      <button class="button-orange" type="submit">Login</button>
    </div>
    <div class="errors">
      <?php if(!empty($errors)):?>
      <?= implode("<br>", $errors)?>
      <?php endif;?>
    </div>
  </div>
  <div class="center form-footer">Don't have an account? <a href="<?=ROOT?>/schedulersignup">Register</a></div>

  

  </form>

</body>
</html>