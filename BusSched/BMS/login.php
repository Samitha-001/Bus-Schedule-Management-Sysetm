<?php 
    require_once("includes/header.php");
    require_once("includes/connection.php");

    error_reporting(0);
    session_start();

    //redirect-back-to-same-if-login-already
if(isset($_SESSION['user_id'])){
    header('menu.php');
}

//Login Process
if(isset($_POST['login'])){
    $login_user_name = mysqli_real_escape_string($connction, $_POST['username']);
    $login_password = mysqli_real_escape_string($connction, md5($_POST['password']));

    $check = mysqli_query($connction, "SELECT * FROM users WHERE username='$login_user_name' AND password='$login_password'"); 
    
    if(mysqli_num_rows($check) > 0){
        $row_data = mysqli_fetch_assoc($check);
        $_SESSION['user_id'] = $row_data['id'];
        $_SESSION['user_name'] = $row_data['username'];
        $_SESSION['user_email'] = $row_data['email'];

        header("Location: profile.php");
    }else{
        echo "<script>alert('Login details are incorrect.');</script>";
    }
}
?>
<style>
    <?php 
        include("css/signup.css"); 
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
