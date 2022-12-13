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
    <title>Breakdown</title>

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

<li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
</div>
</ul>

</nav>

<div class="header">
    <div><h3>Breakdowns</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

<form method="post" id="view_breakdown" style="display:none">

<?php if(!empty($errors)):?>
<?= implode("<br>", $errors)?>
<?php endif;?>

<div>
<table class="styled-table">
    <tr>
        <td><label for="bus_no">Bus No. </label></td>
        <td><input name="bus_no" type="text" class="form-control" id="bus_no" placeholder="Bus No..." required></td>
    </tr>

    <tr>
        <td><label for="type">Description </label></td>
        <td>
            <select name="type" id="type" class="form-control" required>
            <td><input name="description" type="text" class="form-control" id="breakdown_des" placeholder="Description..." required></td>
        </td>
    </tr> 

    <tr>
        <td><label for="Date">Date </label></td>
        <td><input name="date" type="date" class="form-control" id="date" placeholder="Date..." required></td>
    </tr>

    <tr>
        <td><label for="Time">Time </label></td>
        <td><input name="time" type="time" class="form-control" id="time" placeholder="Time..." required></td>
    </tr>

    <tr>
        <td><label for="timeToRepair">Time to repair </label></td>
        <td><input name="timetorepair" type="text" class="form-control" id="timetorepair" placeholder="Time to repair..." required></td>
    </tr>

    <tr>
   
    <tr><td colspan="2"><button class="button-green" type="submit">Add Deatails</button></td></tr>
</table>
</div>
</form>

<div>
<table border='1' class="styled-table">
    <tr>
    <th>#</th>
    <th>Bus No.</th>
    <th>Description</th>
    <th>Date</th>
    <th>Time</th>
    <th>Time to reapir</th>
</tr>

    <?php
    foreach($breakdowns as $breakdown) {
        echo "<tr>";
        echo "<td> $breakdown->id </td>";
        echo "<td> $breakdown->bus_no </td>";
        echo "<td> $breakdown->description</td>";
        echo "<td> $breakdown->date </td>";
        echo "<td> $breakdown->time </td>";
        echo "<td> $breakdown->timetorepair </td>";
        echo "</tr>";
    }?>

</table>
</div>
    
<script src="<?=ROOT?>/assets/js/bus.js"></script>


</body>
</html>