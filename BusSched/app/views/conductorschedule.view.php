<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Schedule</title>

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
        <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li>
            <!--<li><a href="" style="color:#9298AF;">Location</a></li>-->
            <!-- <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li> -->
            <!--<li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Ratings</a></li>-->
            <!-- <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
        </div>
    </div> --> 

    <main class="container1">
    <div class="col-1">
        <div class="header orange-header">
            <div>
                <h3>Schedule</h3>

                <div >
                    <script>
                    date = new Date().toLocaleDateString();
                    document.write(date);
                    </script>
                    </div>

                    </div>
            </div>
        </div>

        <!-- <form method="post" id="view_fare" style="display:none">

            <!--  <?php if (!empty($errors)) : ?> 
                <?= implode("<br>", $errors) ?>
            <?php endif; ?> -->

            
                  
                <!-- <table class="styled-table">
                    <tr>
                        <td><label for="source">From</label></td>
                        <td><input type="text" class="form-control" name="source" id="source" placeholder="Starting halt..."></td>
                    </tr>

                    <tr>
                        <td><label for="dest">To</label></td>
                        <td>
                            <input type="text" name="dest" class="form-control" id="dest" placeholder="Destination halt...">
                        </td>
                    </tr>

                    <tr>
                        <td><label for="route_bus">Route</label></td>
                        <td><input type="text" name="route_bus" class="form-control" id="route_bus" placeholder="Bus route..."></td>
                    </tr>

                    <tr>
                        <td><label for="type_bus">Type </label></td>
                        <td>
                            <select name="type_bus" id="type_bus" class="form-control">
                                <option disabled selected value>--select an option--</option>
                                <option value="L">Luxury</option>
                                <option value="S">Semi-Luxury</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="amount">Amount</label></td>
                        <td><input type="number" name="amount" class="form-control" id="amount" placeholder="Bus fare..."></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td align="right">
                            <button class="button-green" type="submit">Save</button>
                            <button class="button-cancel" onclick="cancel()">Cancel</button>
                        </td>
                    </tr>

                </table> -->
            
    

        <div>
            <br>
            <div class="col-2">
            <table border='1' class="styled-table">
                <tr>
                    <th>Trip ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Time</th>
                    <th>Bus No</th>
                </tr>

                <?php
                foreach ($conductorschedules as $schedule) {
                    echo "<tr>";
                    echo "<td> $schedule->id </td>";
                    echo "<td> $schedule->from </td>";
                    echo "<td> $schedule->to </td>";
                    echo "<td> $schedule->time </td>";
                    echo "<td> $schedule->bus_no</td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
    </main>

</body>

</html>