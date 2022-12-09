<?php
include('../core/header.php');
include('../controller/signup.contr.php');
?>


<style>
    <?php 
        include("../../public/css/signup.css"); 
    ?>
</style>
<main class="sec1">
  <div class="mytabs">
    <input type="radio" id="passenger" name="mytabs" checked="checked">
    <label for="passenger">Passenger</label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="signup_email"required value="<?php echo $_POST['signup_email']?>">
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="signup_username" required value="<?php echo $_POST['signup_username']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="signup_password"  required value="<?php echo $_POST['signup_password']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="signup_cpassword"  required value="<?php echo $_POST['signup_cpassword']?>">
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
            <div style="display: flex; justify-content: space-between;">
              <p>Already have an account</p>
              <p><a href="#">Log in</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="driver" name="mytabs" checked="checked">
    <label for="driver">Driver</label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="signup_email"required value="<?php echo $_POST['signup_email']?>">
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="signup_username" required value="<?php echo $_POST['signup_username']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="signup_password"  required value="<?php echo $_POST['signup_password']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="signup_cpassword"  required value="<?php echo $_POST['signup_cpassword']?>">
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account</p>
              <p><a href="#">Log in</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="conductor" name="mytabs" checked="checked">
    <label for="conductor">Conductor</label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="signup_email"required value="<?php echo $_POST['signup_email']?>">
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="signup_username" required value="<?php echo $_POST['signup_username']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="signup_password"  required value="<?php echo $_POST['signup_password']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="signup_cpassword"  required value="<?php echo $_POST['signup_cpassword']?>">
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account</p>
              <p><a href="#">Log in</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="owner" name="mytabs" checked="checked">
    <label for="owner">Bus Owner</label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="signup_email"required value="<?php echo $_POST['signup_email']?>">
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="signup_username" required value="<?php echo $_POST['signup_username']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="signup_password"  required value="<?php echo $_POST['signup_password']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="signup_cpassword"  required value="<?php echo $_POST['signup_cpassword']?>">
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account</p>
              <p><a href="#">Log in</a></p>
            </div>
          </form>
    </div>
    <input type="radio" id="scheduler" name="mytabs" checked="checked">
    <label for="scheduler">Scheduler</label>
    <div class="tab">
      <form action="" class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <input type="email" placeholder="Email Address" name="signup_email"required value="<?php echo $_POST['signup_email']?>">
            </div>
            <div class="input-field">
              <input type="text" placeholder="User Name" name="signup_username" required value="<?php echo $_POST['signup_username']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Password" name="signup_password"  required value="<?php echo $_POST['signup_password']?>">
            </div>
            <div class="input-field">
              <input type="password" placeholder="Confirm Password" name="signup_cpassword"  required value="<?php echo $_POST['signup_cpassword']?>">
            </div>
              <input type="submit" class="btn" name="signup" value="Sign Up">
              <div style="display: flex; justify-content: space-between;">
              <p>Already have an account</p>
              <p><a href="#">Log in</a></p>
            </div>
          </form>
    </div>
  </div>
</main>

