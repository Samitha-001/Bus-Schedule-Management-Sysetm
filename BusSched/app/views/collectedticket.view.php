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

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php include 'components/navbarcon.php'; 
        // include 'components/conductorsidebar.php';
?>


    <!-- <nav class="navbar">
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
    </nav> -->

    <!-- <div class="wrapper">
        <div class="sidebar">
            <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li> -->
            <!--<li><a href="" style="color:#9298AF;">Location</a></li>-->
            <!-- <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li> -->
            <!-- <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Ratings</a></li>
            <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
        </div>
    </div> -->

    <main class="container1">
    <div class="col-1">
        <div class="header orange-header">
        <table >
                <tr>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/activetickets" id="view_activetickets">Active Tickets</a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/collectedtickets" id="vuew_collectedtickets">Collected Tickets</a></th>
                </tr>
                
            </table>  
            
        </div>
        </div>

        <div class="data-table">
        <div class="selection">
                 
        </div>
        <div class="col-2">
            <table border='1' class="styled-table">
                <tr>
                    <th>Passenger</th>
                    <th>Trip_id</th>
                    <th>seat_no</th>
                    <th>ticket_no</th>   
                    

                </tr>

                <?php

                $conductor = $_SESSION['USER']->username;

$bus = new Bus();
$businfo = $bus->getConductorBuses($conductor)[0];
$busno = $businfo->bus_no;

$trip = new Trip();
$trips = $trip->getBusTrips($busno);

$ticket = new E_ticket();
$status = 'collected';

if(is_array($trips) || is_object($trips)) {
    foreach ($trips as $trip) {
        $tripid = $trip->id;
        $collectedTickets = $ticket->getBusCollectedTickets($status, $tripid);

        if(is_array($collectedTickets) || is_object($collectedTickets)) {
            foreach ($collectedTickets as $ticketstatus) {
                echo "<tr>";
                echo "<td> $ticketstatus->passenger </td>";
                echo "<td> $ticketstatus->trip_id </td>";

                if ($ticketstatus->seat_number === NULL) {
                    $ticketstatus->seat_number = "No";
                    echo "<td> $ticketstatus->seat_number </td>";
                } else {
                    echo "<td> $ticketstatus->seat_number</td>";
                }

                echo "<td> $ticketstatus->ticket_number</td>";
                echo "</tr>";
            }
        }
    }
}
?>


            </table>
        </div>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>