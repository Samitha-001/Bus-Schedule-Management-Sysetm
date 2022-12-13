<?php
    if(!isset($_SESSION['USER'])){
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

    <link href="<?=ROOT?>/assets/css/style2.css" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <div><h2><a href="<?=ROOT?>/admins" id="logo-white">BusSched</a></h2></div>
    <ul class="nav-links">
    <div class="menu">
    <a href="<?=ROOT?>/admins"><li><img src="<?=ROOT?>/assets/images/profile-icon.png" class="nav-bar-img"></li></a>
    <a href="<?=ROOT?>/logout"><li class="button-orange">Logout</li></a>
    </div>
    </ul>
</nav>

<div class="wrapper">
    <div class="sidebar">
        <li><a href="<?=ROOT?>/admins" style="color:#f4511e;">Dashboard</a></li>
        <li><a href="#" style="color:#f4511e;">Users</a></li>
        <li><a href="#" style="color:#f4511e;">Schedules</a></li>
        <li><a href="<?=ROOT?>/buses" style="color:#f4511e;">Buses</a></li>
        <li><a href="#" style="color:#f4511e;">Ratings</a></li>
        <li><a href="#" style="color:#f4511e;">Tickets</a></li>
        <li><a href="<?=ROOT?>/fares" style="color:#f4511e;">Bus Fares</a></li>
        <li><a href="#" style="color:#f4511e;">Routes</a></li>
        <li><a href="<?=ROOT?>/halts" style="color:white;"><b>Halts</b></a></li>
    </div>
</div>

<main class="container1">

    <div class="header orange-header">
        <div><h3>Bus Halts</h3></div>
        <div><button id="btn" class="button-grey">Add New</button></div>    
    </div>

    <form method="post" id="view_route" style="display:none">

    <?php if(!empty($errors)):?>
    <?= implode("<br>", $errors)?>
    <?php endif;?>

    <div class="data-table">
    <table class="styled-table data-table">
        <tr>
            <td><label for="route_id">Route</label></td>
            <td><input name="route_id" type="text" class="form-control" id="route_id" placeholder="Bus route..." required></td>
        </tr>

        <tr>
            <td><label for="halt_name">Bus Halt</label></td>
            <td><input name="halt_name" type="text" class="form-control" id="halt_name" placeholder="Halt name..." required></td>
        </tr>

        <tr>
            <td><label for="distance">Distance from Source (km) </label></td>
            <td><input name="distance" type="float" class="form-control" id="distance" placeholder="Distance from source..." required></td>
        </tr>

        <tr><td colspan="2"><button class="button-green" type="submit">Add New Halt</button></td></tr>
        
    </table>
    </div>
    </form>

    <div class="data-table">
    <table border='1' class="styled-table">
        <tr>
        <th>#</th>
        <th>Bus Halt</th>
        <th>Distance from source</th>
        </tr>
        
        <?php
        foreach($halts as $halt) {
            echo "<tr>";
            echo "<td> $halt->id </td>";
            echo "<td> $halt->name </td>";
            echo "<td> $halt->distance_from_source </td>";
            echo "</tr>";
        }?>

    </table>
    </div>
        
    <script src="<?=ROOT?>/assets/js/bus.js"></script>
</main>


</body>
</html>