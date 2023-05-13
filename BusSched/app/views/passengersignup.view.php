<!doctype html>
<html lang="en">

<head>
  <?php include 'components/head.php';?>

  <title>Sign Up</title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>

<body>
  <?php
  include 'components/navbar.php';
  if (isset($_SESSION['USER'])) {
    redirect('admins');
  }
  ?>
  
  <div class="form-register passenger-signup">
    <h3>Passenger</h3>
    <h1 style="text-align:center">Create Account</h1>
    <button class="user-button checked passenger-button">Passenger</button>
    <button class="user-button conductor-button">Conductor</button>
    <button class="user-button driver-button">Driver</button>
    <button class="user-button owner-button">Owner</button>
    <button class="user-button scheduler-button">Scheduler</button>
    <?php
    include 'components/passengerregister.php';
    ?>
  </div>

  <div class="form-register conductor-signup" style="display: none;">
    <h3>Conductor</h3>
    <h1 style="text-align:center">Create Account</h1>
    <button class="user-button passenger-button">Passenger</button>
    <button class="user-button checked conductor-button">Conductor</button>
    <button class="user-button driver-button">Driver</button>
    <button class="user-button owner-button">Owner</button>
    <button class="user-button scheduler-button">Scheduler</button>
    <?php
    include 'components/conductorregister.php';
    ?>
  </div>


  <div class="form-register driver-signup" style="display: none;">
    <h3>Driver</h3>
    <h1 style="text-align:center">Create Account</h1>
    <button class="user-button passenger-button">Passenger</button>
    <button class="user-button conductor-button">Conductor</button>
    <button class="user-button checked driver-button">Driver</button>
    <button class="user-button owner-button">Owner</button>
    <button class="user-button scheduler-button">Scheduler</button>
    <?php
    include 'components/driverregister.php';
    ?>
  </div>


  <div class="form-register owner-signup" style="display: none;">
    <h3>Owner</h3>
    <h1 style="text-align:center">Create Account</h1>
    <button class="user-button passenger-button">Passenger</button>
    <button class="user-button conductor-button">Conductor</button>
    <button class="user-button driver-button">Driver</button>
    <button class="user-button checked owner-button">Owner</button>
    <button class="user-button scheduler-button">Scheduler</button>
    <?php
    include 'components/ownerregister.php';
    ?>
  </div>


  <div class="form-register scheduler-signup" style="display: none;">
    <h3>Scheduler</h3>
    <h1 style="text-align:center">Create Account</h1>
    <button class="user-button passenger-button">Passenger</button>
    <button class="user-button conductor-button">Conductor</button>
    <button class="user-button driver-button">Driver</button>
    <button class="user-button owner-button">Owner</button>
    <button class="user-button checked scheduler-button">Scheduler</button>
    <?php
    include 'components/schedulerregister.php';
    ?>
  </div>
  
  <script src="<?= ROOT ?>/assets/js/signup.js"></script>

</body>

</html>

<script>
    //when clicking the submit button  of each form check the password of the form and validate length
    //if the password is not valid then show an error message
    document.querySelectorAll('button[type="submit"]').forEach(function (button) {
        button.addEventListener('click', function (e) {
            let password = e.target.parentElement.querySelector('#password').value
            if (password.length < 8) {
                e.preventDefault()
                new Toast('fa fa-exclamation-circle', 'rgba(255,212,0,0.88)', 'Invalid password', 'Password must be at least 8 characters long', true, 3000)
            }
        })
    })

</script>
