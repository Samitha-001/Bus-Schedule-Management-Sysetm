<<<<<<< HEAD
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
                    <li class="button-orange">Logout</li>
                </a>
            </div>
        </ul>
    </nav>

    <div class="wrapper">
        <div class="sidebar">
            <li><a href="<?= ROOT ?>/admins" style="color:#9298AF;">Dashboard</a></li>
            <li><a href="#" style="color:#9298AF;">Location</a></li>
            <li><a href="#" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/buses" style="color:#9298AF;">Buses</a></li>
            <li><a href="#" style="color:#9298AF;">Ratings</a></li>
            <li><a href="#" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="#" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/halts" style="color:#9298AF;">contacts</a></li>
        </div>
    </div>

    <main class="container1">
        <div class="header orange-header">
            <div>
                <h3>Bus Tickets</h3>
            </div>
            
        </div>

        <div class="data-table">
        <div class="selection">
                <table >
                <tr>
                    <th><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;"><button id="btn" class="button-grey">Active Tickets</button></a></th>
                    <th><a href="<?= ROOT ?>/collectedtickets" style="color:#9298AF;"><button id="btn" class="button-grey">Collected Tickets</button></a></th>
                </tr>
                
            </table>   
        </div>

            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>TicketID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>BusNo</th>
                    <th>Passengers</th>
                    <th>Departure_time</th>   
                    <th>Date</th>
                </tr>

                <?php
                foreach ($tickets as $ticket) {
                    echo "<tr>";
                    echo "<td> $ticket->ticketid </td>";
                    echo "<td> $ticket->from </td>";
                    echo "<td> $ticket->to </td>";
                    echo "<td> $ticket->busno </td>";
                    echo "<td> $ticket->passengers</td>";
                    echo "<td> $ticket->departuretime </td>";
                    echo "<td> $ticket->date </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

=======
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
                    <li class="button-orange">Logout</li>
                </a>
            </div>
        </ul>
    </nav>

    <div class="wrapper">
        <div class="sidebar">
            <li><a href="<?= ROOT ?>/admins" style="color:#9298AF;">Dashboard</a></li>
            <li><a href="#" style="color:#9298AF;">Location</a></li>
            <li><a href="#" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/buses" style="color:#9298AF;">Buses</a></li>
            <li><a href="#" style="color:#9298AF;">Ratings</a></li>
            <li><a href="#" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="#" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/halts" style="color:#9298AF;">onntats</a></li>
        </div>
    </div>

    <main class="container1">
        <div class="header orange-header">
            <div>
                <h3>Bus Tickets</h3>
            </div>
            
        </div>

        <div class="data-table">
        <div class="selection">
                <table >
                <tr>
                    <th><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;"><button id="btn" class="button-grey">Active Tickets</button></a></th>
                    <th><a href="<?= ROOT ?>/collectedtickets" style="color:#9298AF;"><button id="btn" class="button-grey">Collected Tickets</button></a></th>
                </tr>
                
            </table>   
        </div>

            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>TicketID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>BusNo</th>
                    <th>Passengers</th>
                    <th>Departure_time</th>   
                    <th>Date</th>
                </tr>

                <?php
                foreach ($tickets as $ticket) {
                    echo "<tr>";
                    echo "<td> $ticket->ticketid </td>";
                    echo "<td> $ticket->from </td>";
                    echo "<td> $ticket->to </td>";
                    echo "<td> $ticket->busno </td>";
                    echo "<td> $ticket->passengers</td>";
                    echo "<td> $ticket->departuretime </td>";
                    echo "<td> $ticket->date </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

>>>>>>> b8528d7582e32cbd1beb177c428fd91ba2efc3b1
</html>