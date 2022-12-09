<?php
    include_once "../core/header.php";
    include_once "../controller/login.contr.php";    
?>

<style>
    <?php 
        include("../../public/css/signup.css"); 
    ?>
</style>


<form action="login.php" method="post" class="sign-in-form">
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
