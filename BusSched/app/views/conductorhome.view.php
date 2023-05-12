<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'admin') {
    redirect('admins');
} else if ($_SESSION['USER']->role == 'scheduler') {
    redirect('schedulers');
} else if ($_SESSION['USER']->role == 'owner') {
    redirect('owners');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('drivers');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>
    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <title>Conductor - Home</title>
</head>

<body>
    <?php include 'components/navbarcon.php'; ?>
    
    <div class="header orange-header">
        <div class="col-1">
            <div class="card-container" id="greeting-card">
                <h2>
                    <?php
                    echo "Welcome " . $_SESSION['USER']->username . "!";
                    ?>
                </h2>
            </div>
        </div>
    </div>

<main class="container1"> 
    <div class="col-4">  
        <a href="<?= ROOT ?>/conductors" >
            <div class="card-container" id="location-card">
            </div>
        </a>

        <a href="<?= ROOT ?>/conductorschedules" >
            <div class="card-container" id="schedules-card">
            </div> 
        </a>

        <a href="<?= ROOT ?>/breakdowns">
            <div class="card-container" id="breakdowns-card">
            </div>
        </a>

        <a href="<?= ROOT ?>/conductorfares">
            <div class="card-container" id="fare-card">
            </div>
        </a>

        <a href="<?= ROOT ?>/contactowners">
            <div class="card-container" id="contacts-card">
            </div>
        </a>

     
        <a href="<?= ROOT ?>/activetickets" >
            <div class="card-container" id="tickets-card">
            </div>
        </a>
    </div>  
</main> 


</body>

</html>