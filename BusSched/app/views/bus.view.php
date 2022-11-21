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
    <div class="div-black"><h2><a href="<?=ROOT?>" id="logo_white">BusSched</a></h2></div>
    

    <h1 style="text-align:center" class="center">Buses</h1>

    <button id="btn">Add Bus</button>

    <form method="post" id="view_bus" style="display:none">

    <?php if(!empty($errors)):?>
    <?= implode("<br>", $errors)?>
    <?php endif;?>
    <!-- <div class="center"> -->

    <label for="bus_no">Bus No. </label>
    <input name="bus_no" type="text" class="form-control" id="bus_no" placeholder="Bus No..."><br>

    <label for="type">Bus Type </label>
    <select name="type" id="type" class="form-control">
        <option value="L">Luxury</option>
        <option value="S">Semi-Luxury</option>
    </select><br>
    
    <label for="seats_no">Seats No. </label>
    <input name="seats_no" type="number" id="seats_no" class="form-control" placeholder="Available no. of seats..."><br>
    
    <label for="availability">Available? </label>
    <input type="checkbox" id="availability" name="availability" value="1"><br>
    

    <label for="route">Route </label>
    <input name="route" type="text" class="form-control" id="route" placeholder="Bus route..."><br>
    
    
    <label for="start">Start </label>
    <input name="start" type="text" class="form-control" id="start" placeholder="Starting halt..."><br>
    
    <button class="center" type="submit">Add New Bus</button>
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