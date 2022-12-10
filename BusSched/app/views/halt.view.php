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

<div><h2><a href="<?=ROOT?>/admins" id="logo_white">BusSched</a></h2></div>

<ul class="nav-links">

<div class="menu">
<li><a href="<?=ROOT?>/buses">Buses</a></li>
<li><a href="<?=ROOT?>/halts"><b>Halts</a></b></li>
<li><a href="<?=ROOT?>/fares">Fare</a></li>

<li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
</div>
</ul>

</nav>

<div class="header">
    <div><h3>Bus Halts</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

<form method="post" id="view_route" style="display:none">

<?php if(!empty($errors)):?>
<?= implode("<br>", $errors)?>
<?php endif;?>

<div>
<table class="styled-table">
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

<div>
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


</body>
</html>