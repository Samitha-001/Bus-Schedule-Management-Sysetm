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
    <title>Buses</title>

    <link href="<?=ROOT?>/assets/css/style2.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">

<!-- LOGO -->
<div><h2><a href="<?=ROOT?>/admins" id="logo_white">BusSched</a></h2></div>

<!-- NAVIGATION MENU -->
<ul class="nav-links">

<!-- NAVIGATION MENUS -->
<div class="menu">
<li><a href="<?=ROOT?>/buses"><b>Buses</b></a></li>
<li><a href="<?=ROOT?>/halts">Halts</a></li>
<li><a href="<?=ROOT?>/fares">Fare</a></li>

<li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
</div>
</ul>

</nav>

<div  class="wrapper">
    <div class="sidebar">
        <li><a href="<?=ROOT?>/admins" style="color:#f4511e;">Dashboard</a></li>
        <li><a href="#" style="color:#f4511e;">Users</a></li>
        <li><a href="#" style="color:#f4511e;">Schedules</a></li>
        <li><a href="<?=ROOT?>/buses" style="color:white;"><b>Buses</b></a></li>
        <li><a href="#" style="color:#f4511e;">Ratings</a></li>
        <li><a href="#" style="color:#f4511e;">Tickets</a></li>
        <li><a href="<?=ROOT?>/fares" style="color:#f4511e;">Bus Fares</a></li>
        <li><a href="#" style="color:#f4511e;">Routes</a></li>
        <li><a href="<?=ROOT?>/halts" style="color:#f4511e;">Halts</a></li>
    </div>
</div>

<main class="container">

<div class="header orange-header">
    <div><h3>Buses</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

<form method="post" id="view_bus" style="display:none">

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
        <td><label for="type">Bus Type </label></td>
        <td>
            <select name="type" id="type" class="form-control" required>
            <option disabled selected value>--select an option--</option>
            <option value="L">Luxury</option>
            <option value="S">Semi-Luxury</option>
            </select>
        </td>
    </tr> 

    <tr>
        <td><label for="seats_no">Capacity </label></td>
        <td><input name="seats_no" type="number" class="form-control" id="seats_no" placeholder="Available no. of seats..." required></td>
    </tr>

    <tr>
        <td><label for="availability">Bus Available? </label></td>
        <td>
            <label class="switch">
            <input type="checkbox" id="availability" name="availability" value="1">
            <span class="slider round"></span>
            </label> 
        </td>
    </tr>

    <tr>
        <td><label for="route">Route </label></td>
        <td><input name="route" type="text" class="form-control" id="route" placeholder="Bus route..." required></td>
    </tr>

    <tr>
        <td><label for="start">Start </label></td>
        <td><input name="start" type="text" class="form-control" id="start" placeholder="Starting halt..." required></td>
    </tr>
    <tr><td colspan="2"><button class="button-green" type="submit">Add New Bus</button></td></tr>
    
</table>
</div>
</form>

<div class="data-table">
<table border='1' class="styled-table">
    <tr>
    <th>#</th>
    <th>Bus No.</th>
    <th>Bus Type</th>
    <th>No. of Seats</th>
    <th>Bus Available?</th>
    <th>Bus Route</th>
    <th>Start</th>
</tr>

    <?php
    foreach($buses as $bus) {
        echo "<tr>";
        echo "<td> $bus->id </td>";
        echo "<td> $bus->bus_no </td>";
        echo "<td> $bus->type </td>";
        echo "<td> $bus->seats_no </td>";
        echo "<td> $bus->availability </td>";
        echo "<td> $bus->route </td>";
        echo "<td> $bus->start </td>";
        echo "</tr>";
    }?>

</table>
</div>
    
<script src="<?=ROOT?>/assets/js/bus.js"></script>
</main>

</body>
</html>