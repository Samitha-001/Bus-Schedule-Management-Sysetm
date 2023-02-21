<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Contacts</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div>
            <h2><a href="<?= ROOT ?>/admins" id="logo-white">BusSched</a></h2>
        </div>
        <ul class="nav-links">
            <div class="menu">
                <a href="<?= ROOT ?>/admins">
                    <li><img src="<?= ROOT ?>/assets/images/profile-icon.png" class="nav-bar-img"></li>
                </a>
                <a href="<?= ROOT ?>/logout">
                <li class="signup-button" style="margin-left:7px"><a href="<?= ROOT ?>/login">Logout</a></li>
                </a>
            </div>
        </ul>
    </nav>

    <div class="wrapper">
        <div class="sidebar">
        <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li>
            <!--<li><a href="" style="color:#9298AF;">Location</a></li>-->
            <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li>
            <!--<li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Ratings</a></li>-->
            <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
        </div>
    </div>

    <main class="container1">
        <div class="header orange-header">
            <div>
            <table class="header-links">
                <tr>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/contactowners" ><h3>Bus Owner</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/contactdrivers" ><h3>Drivers</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/contactconductors" ><h3>Conductors</h3></a></th>
                </tr>
                
            </table> 
            </div>
            
        </div>

        <div class="data-table">
        <div class="selection">
              
        </div>

            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>EmailAddress</th>
                    <th>Contact No</th>
                    <th>Assinged Bus</th>
                </tr>

                <?php
                foreach ($contactowners as $owner) {
                    echo "<tr>";
                    echo "<td> $owner->name </td>";
                    echo "<td> $owner->email </td>";
                    echo "<td> $owner->tp </td>";
                    echo "<td> $owner->bus_no </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>