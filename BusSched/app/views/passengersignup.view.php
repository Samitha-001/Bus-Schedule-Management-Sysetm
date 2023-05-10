
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