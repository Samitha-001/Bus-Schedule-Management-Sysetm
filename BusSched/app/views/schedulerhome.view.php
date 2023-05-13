<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('drivers');
} else if ($_SESSION['USER']->role == 'admin') {
    redirect('admins');
} else if ($_SESSION['USER']->role == 'conductor') {
    redirect('conductors');
} else if ($_SESSION['USER']->role == 'owner') {
    redirect('owners');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">

    <title>Schedule - Home</title>
</head>
<style>
        /* styles for screens smaller than 600px */
        @media screen and (max-width: 600px) {
            .card-container {
                width: 100%;
                margin: 10px auto;
            }
        }
    </style>
<body>

<?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    <main class="container">

    <div class="card-container-sched" id="greeting-card-sched">
            <h2>
                <?php
                echo "Welcome " . $_SESSION['USER']->username . "!";
                ?>
            </h2>
        </div>

        <div class="card-container" id="schedules-card">
        <a href="<?= ROOT ?>/schedules">
        <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p style="color: #E8DACC;">Schedules</p>
                    <hr>
                </div>
                <div class="items users">
                    <p style="color: #fff;">Schedule</p>
                </div>
            </div>
        </a></p>
        </div>

        <div class="card-container" id="buses-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p style="color: #E8DACC;">Buses & Breakdowns</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="<?= ROOT ?>/schedbuses">Bus details</a><br></p>
                    <p><a href="<?= ROOT ?>/schedbreakdowns">Breakdowns</a><br></p>
                </div>
            </div>
            </a>
        </div>

       

        <div class="card-container" id="tickets-card">
        <a href="<?= ROOT ?>/schedfares">
        <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p style="color: #E8DACC;">Bus Fares</p>
                    <hr>
                </div>
                <div class="items users">
                    <p style="color: #fff;">Fares</p>
                </div> 
            </div>
        </a>
        </div>
        
        

        
    </main>


</body>

</html>