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
  
    <title>Breakdowns</title>

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

<div  class="wrapper">
    <div class="sidebar">
        <li><a href="<?= ROOT ?>/admins" style="color:#f4511e;">Dashboard</a></li>
        <li><a href="#" style="color:#f4511e;">Users</a></li>
        <li><a href="#" style="color:#f4511e;">Schedules</a></li>
        <li><a href="<?= ROOT ?>/buses" style="color:#f4511e;">Buses</a></li>
        <li><a href="#" style="color:#f4511e;">Ratings</a></li>
        <li><a href="#" style="color:#f4511e;">Tickets</a></li>
        <li><a href="<?= ROOT ?>/fares" style="color:#f4511e;">Bus Fares</a></li>
        <li><a href="#" style="color:#f4511e;">Routes</a></li>
        <li><a href="<?= ROOT ?>/halts" style="color:#f4511e;">Halts</a></li>
        <li><a href="<?= ROOT ?>/breakdowns" style="color:white;"><b>Breakdowns</b></a></li>
    </div>
</div>

<main class="container1">
    <div class="header orange-header">
        <div>
            <h3>Breakdowns</h3>
        </div>
    <div><button id="btn" class="button-grey">Add New</button></div>
</div>

<form method="post" id="view_breakdown" style="display:none">

<?php if(!empty($errors)):?>
<?= implode("<br>", $errors)?>
<?php endif;?>

<div class="data-table">
<table class="styled-table data-table">
    <tr>
        <td><label for="bus_no">Bus No. </label></td>
        <td><input name="bus_no" type="text" class="form-control" id="bus_no" placeholder="Bus No..." required></td>
    </tr>
    <tr>  
        <td><label for="description">Description </label></td>
        <td><input name="description" type="text" class="form-control" id="description" placeholder="Description..." required></td>
    </tr>
    <tr>
        <td><label for="time_to_repair">Time To Repair </label></td>
        <td><input name="time_to_repair" type="text" class="form-control" id="time_to_repair" placeholder="Time to repair..." required></td>
    </tr>

    <tr><td colspan="2"><button class="button-green" type="submit">Add Breakdown</button></td></tr>
  
</table>
</div>
</form>

<div class="data-table">

<table border='1' class="styled-table">
    <tr>
    <th>#</th>
    <th>Bus No.</th>
    <th>Description</th>
    <!-- <th>Date</th>
    <th>Time</th>   -->
    <th>Time to repair</th>
</tr>

    <?php
    foreach($breakdowns as $breakdown) {
        echo "<tr>";
        echo "<td> $breakdown->id </td>";
        echo "<td> $breakdown->bus_no </td>";
        echo "<td> $breakdown->description </td>";
        // echo "<td> $breakdown->date </td>";
        // echo "<td> $breakdown->time </td>";
        echo "<td> $breakdown->time_to_repair </td>";
        echo "</tr>";
    }?>

</table>
</div>
    
<script src="<?=ROOT?>/assets/js/bus.js"></script>

</main>

</body>
</html>