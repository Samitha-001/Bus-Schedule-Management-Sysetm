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
    <title>Profile</title>
</head>

<body>
<?php
    include 'components/navbar.php';
    include 'components/passengernavbar.php';
?>

    <div class="row">
        <div class="col-3 col-s-3">
            <div class="passenger-profile-card" id="profile-header">
                <img id="profile-picture" src="<?= ROOT ?>/assets/images/icons/profile-pic-none.png" alt="ptofile pic" width="50px" height="50px">
                <h1 id="username"><?= $username ?></h1>
            </div>
            <div class="nav-cards">
                <div class="passenger-profile-card">
                    <h1 style="margin-bottom: 0px;">My points</h1>
                    <ul style="padding-left:5px;">
                        <li>Points: &emsp;</li>
                        <li>Value: &emsp;</li>
                        <li>Exp. date: &emsp;</li>
                    </ul>
                    <button class="button-orange" style="background-color:#24315e; width:100;">Gift points</button>
                </div>
                </div>
        </div>
    </div>
</body>

</html>