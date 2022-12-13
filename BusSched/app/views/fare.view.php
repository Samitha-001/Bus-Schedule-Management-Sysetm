<?php
    if(!isset($_SESSION['USER'])){
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
    <title>Fares</title>

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
        <li><a href="<?=ROOT?>/admins" style="color:#f4511e;">Dashboard</a></li>
        <li><a href="#" style="color:#f4511e;">Users</a></li>
        <li><a href="#" style="color:#f4511e;">Schedules</a></li>
        <li><a href="<?=ROOT?>/buses" style="color:#f4511e;">Buses</a></li>
        <li><a href="#" style="color:#f4511e;">Ratings</a></li>
        <li><a href="#" style="color:#f4511e;">Tickets</a></li>
        <li><a href="<?=ROOT?>/fares" style="color:white;"><b>Bus Fares</b></a></li>
        <li><a href="#" style="color:#f4511e;">Routes</a></li>
        <li><a href="<?=ROOT?>/halts" style="color:#f4511e;">Halts</a></li>
    </div>
</div>

<main class="container1">

<div class="header orange-header">
    <div><h3>Bus Fare</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

<form method="post" id="view_fare" style="display:none">

<?php if(!empty($errors)):?>
<?= implode("<br>", $errors)?>
<?php endif;?>

<div class="data-table">
    <table class="styled-table data-table">
        <label for="source">From</label>
        <input type="text" name="source" id="source">

        <label for="dest">To</label>
        <input type="text" name="dest" id="dest">

        <label for="route_bus">Route</label>
        <input type="text" name="route_bus" id="route_bus">

        <label for="type_bus">Type  </label>
        <select name="type_bus" id="type_bus" class="form-control">
        <option disabled selected value>--select an option--</option>
        <option value="L">Luxury</option>
        <option value="S">Semi-Luxury</option>
        </select>

        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount">

        <tr><td colspan="2"><button class="button-green" type="submit">Add New Fare</button></td></tr>

    </table>
</div>
</form>

<div class="data-table">
<table border='1' class="styled-table">
    <tr>
    <th>#</th>
    <th>From</th>
    <th>Route</th> 
    <th>To</th>
    <th>Amount</th>
    <th>Type</th>
    <th>Last Updated</th>
    <th>Action</th>
</tr>

    <?php
    foreach($fares as $fare) {
        echo "<tr>";
        echo "<td> $fare->id </td>";
        echo "<td> $fare->source </td>";
        echo "<td> $fare->dest </td>";
        echo "<td> $fare->route_bus </td>";
        echo "<td> $fare->type_bus </td>";
        echo "<td> $fare->amount</td>";
        echo "<td> $fare->last_updated </td>";
        echo "</tr>";
    }?>

</table>
</div>
    
<script src="<?=ROOT?>/assets/js/bus.js"></script>
</main>

</body>
</html>