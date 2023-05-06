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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">
    
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
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
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Schedules</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="<?= ROOT ?>/schedules">Schedule</a></p>
                </div>
            </div>
        </div>

        <div class="card-container" id="buses-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Buses & Breakdowns</p>
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
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Bus Fares</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="<?= ROOT ?>/schedfares">Bus Fare</a></p>
                </div>
            </div>
        </div>
        
        <div class="card-container" id="fare-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ticket List</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="<?= ROOT ?>/schedactiveticket">Active</a> </p>
                    <p><a href="<?= ROOT ?>/schedcollectedticket">Collected</a> </p>
                    <p><a href="<?= ROOT ?>/schedpendingticket">Pending</a>
                     </p>
                    <p><a href="<?= ROOT ?>/schedexpiredticket">Expired</a>
                     </p>
                </div>
            </div>
        </div>

        
    </main>


</body>

</html>