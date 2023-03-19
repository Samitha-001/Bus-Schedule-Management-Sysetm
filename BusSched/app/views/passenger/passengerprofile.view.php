<?php
$username = $_SESSION['USER']->username;
if (isset($_SESSION['USER'])) {
    if ($_SESSION['USER']->role == 'driver') {
        redirect('drivers');
    } else if ($_SESSION['USER']->role == 'conductor') {
        redirect('conductors');
    } else if ($_SESSION['USER']->role == 'scheduler') {
        redirect('schedulers');
    } else if ($_SESSION['USER']->role == 'owner') {
        redirect('owners');
    } else if ($_SESSION['USER']->role == 'admin') {
        redirect('admins');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_profile.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/passengerprofile.js"></script>
    <title>Profile</title>
    <style>
      td input[disabled] {
        border: none;
        background-color: transparent;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        text-align: inherit;
        font-size: inherit;
        font-family: inherit;
        color: inherit;
        cursor: default;
      }
      .dummy-row, .dummy-input {
        display: none;
      }
    </style>
</head>

<body>
<?php
    include '../app/views/components/navbar.php';
    // include '../app/views/components/passengernavbar.php';
    $passenger = $data[0];
    $username = $passenger->username;
?>

    <div class="row">
        <div class="col-3 col-s-3">
            <div class="passenger-profile-card" id="profile-header">
                <img id="profile-picture" src="<?= ROOT ?>/assets/images/icons/profile-pic-none.png" alt="profile pic" width="50px" height="50px">
                <h1 id="username">Hi <?= $username ?>!</h1>
            </div>
            <div class="nav-cards">
                <div class="passenger-profile-card">
                    <ul class="info-grid" style="padding-left:5px;">
                        <h1>Name:</h1>
                        <p>
                            <?= $passenger->name ?>
                        </p>
                        <h1>Phone:</h1>
                        <p>
                            <?= $passenger->phone ?>
                        </p>
                        <h1>Address:</h1>
                        <p>
                            <?= $passenger->address ?>
                        </p>
                        <h1>DOB:</h1>
                        <p>
                            <?= $passenger->dob ?>
                        </p>
                        <!-- TODO -->
                        <a href=# id='edit-passenger-info'>Edit</a>
                    </ul>

                    <!-- this row is cloned to collect input for editing rows -->
                    <ul style="padding-left:5px;" class='dummy-input info-grid'>
                        <h1>Name:</h1>
                        <p>
                            <input type="text" name="name" id="name" value="<?= $passenger->name ?>">
                        </p>
                        <h1>Phone:</h1>
                        <p>
                            <input type="text" name="phone" id="phone" value="<?= $passenger->phone ?>">
                        </p>
                        <h1>Address:</h1>
                        <p>
                            <input type="text" name="address" id="address" value="<?= $passenger->address ?>">
                        </p>
                        <h1>DOB:</h1>
                        <p>
                            <input type="date" name="dob" id="dob" value="<?= $passenger->dob ?>">
                        </p>
                        
                        <!-- TODO -->
                        <a href=# id='save-passenger-info'>Save</a>
                        <a href=# id='cancel-passenger-info'>Cancel</a>
                    </ul>

                    <!-- this row  is cloned and is the actual row that's gonna be added to the table -->
                    <ul class='dummy-row info-grid'>
                        <li>
                            <h1>Name:</h1>
                            <p></p>
                        </li>
                        <li>
                            <h1>Phone:</h1>
                            <p></p>
                        </li>
                        <li>
                            <h1>Address:</h1>
                            <p></p>
                        </li>
                        <li>
                            <h1>DOB:</h1>
                            <p></p>
                        </li>
                    </ul>

                </div>
                <div class="passenger-profile-card">
                    <h1 style="margin-bottom: 0px;">My points</h1>
                    <ul style="padding-left:5px;">
                        <li><h1>Points:</h1> <?= $passenger->points ?></li>
                        <li><h1>Value:</h1> <?= $passenger->points ?> LKR</li>
                        <li><h1>Exp. date:</h1> <?= $passenger->points_expiry ?></li>
                    </ul>
                    <button class="button-orange" style="width:100;">Gift points</button>
                </div>
                </div>
        </div>
    </div>
</body>

</html>