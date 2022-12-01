<?php
include('includes/header.php');
include('includes/connection.php'); 

    error_reporting(0);
    session_start();



//Signup Process



    if(isset($_POST['signup'])){
        $email_address = mysqli_real_escape_string($connction, $_POST['signup_email']);
        $user_name = mysqli_real_escape_string($connction, $_POST['signup_username']);
        $password = mysqli_real_escape_string($connction, md5($_POST['signup_password']));
        $c_password = mysqli_real_escape_string($connction, md5($_POST['signup_cpassword']));

        $check_registered_email = mysqli_num_rows(mysqli_query($connction, "SELECT email FROM users WHERE email='$email_address' ")); 

        if($password !== $c_password){
            echo "<script> alert('password didnt match');</script>";
        }elseif($check_registered_email> 0){
            echo "<script>alert('already registered');</script>";
        }else{
            $sql_query = "INSERT INTO users (email, username, password) VALUES('$email_address', '$user_name', '$password')";
            $result = mysqli_query($connction, $sql_query);
            if($result){
                $_POST['signup_email'] = "";
                $_POST['signup_username'] = "";
                $_POST['signup_password'] = "";
                $_POST['signup_cpassword'] = "";
                echo "<script>alert('registered successfully');</script>";
            }else{
                echo "<script>alert('registration failed');</script>";
            }

        }
    }


?>



<!-- <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form" style="display:none">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <input type="text" placeholder="User Name" name="username" required value="<?php echo $_POST['username']?>">
          </div>
          <div class="input-field"> 
            <input type="password" placeholder="Password" name="password"required value="<?php echo $_POST['password']?>" >
          </div>
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="forgot-password.php" style="color: #4590ef;">Forgot Password?</a></p>
          <input type="submit" value="Login" name="login" class="btn solid">
          <p>Create account</p>
        </form>
        
        
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
            
        </form>
      </div>
    </div>
   </div>
    <script src="/js/script.js"></script>
-->
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

