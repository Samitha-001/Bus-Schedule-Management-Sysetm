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
<div><h2><a href="<?=ROOT?>" id="logo_white">BusSched</a></h2></div>

<!-- NAVIGATION MENU -->
<ul class="nav-links">

<!-- NAVIGATION MENUS -->
<div class="menu">
<li><a href="<?=ROOT?>">Home</a></li>
<li><a href="<?=ROOT?>">About</a></li>
<li><a href="<?=ROOT?>">Services</a></li>

<li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
</div>
</ul>

</nav>

<div class="header">
    <div><h3>Buses</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

    <!-- <button id="btn" class="button-green">Add Bus</button> -->

    <form method="post" id="view_bus" style="display:none">

    <?php if(!empty($errors)):?>
    <?= implode("<br>", $errors)?>
    <?php endif;?>
    <div>
    <label for="bus_no">Bus No. </label>
    <input name="bus_no" type="text" class="form-control" id="bus_no" placeholder="Bus No..."><br>
    </div>
    
    <div>
    <label for="type">Bus Type </label>
    <select name="type" id="type" class="form-control">
        <option value="L">Luxury</option>
        <option value="S">Semi-Luxury</option>
    </select><br>
    </div>
    
    <div>
    <label for="seats_no">Seats No. </label>
    <input name="seats_no" type="number" id="seats_no" class="form-control" placeholder="Available no. of seats..."><br>
    </div>
    
    <div>
    <label for="availability">Available? </label>
    <input type="checkbox" id="availability" name="availability" value="1"><br>
    </div>
    
    <div>
    <label for="route">Route </label>
    <input name="route" type="text" class="form-control" id="route" placeholder="Bus route..."><br>
    </div>
    
    <div>
    <label for="start">Start </label>
    <input name="start" type="text" class="form-control" id="start" placeholder="Starting halt..."><br>
    </div>

    <button class="button-green" type="submit">Add New Bus</button>
<!-- </div> -->
</form>



<table border='1' class="styled-table">
    <tr>
    <th>#</th>
    <th>Bus No.</th>
    <th>Bus Type</th>
    <th>No. of Seats</th>
    <th>Available?</th>
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
    
<script src="<?=ROOT?>/assets/js/bus.js"></script>


</body>
</html>