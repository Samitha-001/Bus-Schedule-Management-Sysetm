<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Scheduler - Sign Up</title>

  <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
</head>
<body>
<nav class="navbar">
    <div><h2><a href="<?=ROOT?>/home" id="logo_white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
    <div class="menu">
    
    <li><a href="#">Services</a></li>
    <li><a href="#">About</a></li>
    <a href="<?=ROOT?>/login"><li class="button-orange">Login</li></a>
    <a href="<?=ROOT?>/signup"><li class="button-orange">Sign Up</li></a>
    </nav>
    <br>
    <br>
    <br>
    <br>
  
    <h3>Scheduler</h3>
    <h1 style="text-align:center">Create Account</h1>

<!-- SIGN UP FORM - SCHEDULER -->

  
  <?php if(!empty($errors)):?>
  <?= implode("<br>", $errors)?>
  <?php endif;?>
  
  <!-- <div id="form_footer" class="center">Already have an account? <a href="<?=ROOT?>/schedulerlogin">Login</a></div> -->

  <main class="sec1">
  <div class="mytabs">
    <input type="radio" id="passenger" name="mytabs" checked="checked">
    <label for="passenger"><a href="<?=ROOT?>/signup">Passenger</a></label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>

            <div class="input-field">

            </div>

            <div class="input-field">

            </div>

            <div class="input-field">

            </div>

            <div class="input-field">

            </div>

              <input type="submit" class="btn" name="signup" value="Sign Up">

            </div>

          </form>
    </div>
    <input type="radio" id="driver" name="mytabs" checked="checked">
    <label for="driver"><a href="<?=ROOT?>/driversignup">Driver</a></label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="email"required >
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="username" required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="password"  required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="pwdRepeat"  required >
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account?</p>
              <p><a href="#">Login</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="conductor" name="mytabs" checked="checked">
    <label for="conductor"><a href="<?=ROOT?>/conductorsignup">Conductor</a></label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="email"required >
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="username" required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="password"  required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="pwdRepeat"  required >
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account?</p>
              <p><a href="#">Login</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="owner" name="mytabs" checked="checked">
    <label for="owner"><a href="<?=ROOT?>/ownersignup">Bus Owner</a></label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="email"required >
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="username" required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="password"  required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="pwdRepeat"  required >
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account?</p>
              <p><a href="#">Login</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="scheduler" name="mytabs" checked="checked">
    <label for="scheduler"><a href="<?=ROOT?>/schedulersignup">Scheduler</a></label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="email"required >
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="username" required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="password"  required >
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="pwdRepeat"  required >
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div class="create_account"
              style="display: flex; align-items: center;">
              <p>Already have an account?</p>
              <p><a href="<?=ROOT?>/schedulerlogin">Login</a></p>
            </div>
          </form>
    </div>
  </div>
</main>


</body>
</html>
