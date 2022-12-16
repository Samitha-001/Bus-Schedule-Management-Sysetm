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
    <title>120 Route</title>

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
            <li><a href="#" style="color:#9298AF;">Users</a></li>
            <li><a href="#" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/buses" style="color:#9298AF;">Buses</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="#" style="color:#9298AF;">Ratings</a></li>
            <li><a href="#" style="color:#9298AF;">Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="#" style="color:#9298AF;">Routes</a></li>
            <li><a href="<?= ROOT ?>/halts" style="color:white;"><b>Halts</b></a></li>
        </div>
    </div>

    <main class="container1">

        <div class="header orange-header">
            <div>
                <h3>Bus Halts</h3>
            </div>
            <div><button id="btn" class="button-grey">Add New</button></div>
        </div>
        <div class="errors">

            <?php if (!empty($errors)): ?>
            <?= is_array($errors) ? implode("<br>", $errors) : $errors ?>
                <?php endif; ?>
        </div>


        <form method="post" id="view_route" style="display:none">


            <div>
                <table class="styled-table">
                    <tr>
                        <td><label for="route_id">Route</label></td>
                        <td><input name="route_id" type="text" class="form-control" id="route_id"
                                placeholder="Bus route..." required></td>
                    </tr>

                    <tr>
                        <td><label for="halt_name">Bus Halt</label></td>
                        <td><input name="halt_name" type="text" class="form-control" id="halt_name"
                                placeholder="Halt name..." required></td>
                    </tr>

                    <tr>
                        <td><label for="distance">Distance from Source (km) </label></td>
                        <td><input name="distance" type="float" class="form-control" id="distance"
                                placeholder="Distance from source..." required></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td align="right">
                            <button class="button-green" type="submit">Save</button>
                            <button class="button-cancel" onclick="cancel()">Cancel</button>
                        </td>
                    </tr>

                </table>
            </div>
        </form>

        <div>
            <br>
            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>Bus Halt</th>
                    <th>Distance from source</th>
                </tr>

                <?php
                foreach ($halts as $halt) {
                    echo "<tr>";
                    echo "<td> $halt->id </td>";
                    echo "<td> $halt->name </td>";
                    echo "<td> $halt->distance_from_source </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>


    </main>


</body>

</html>