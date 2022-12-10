<?php
    if(!isset($_SESSION['USER'])){
        redirect('home');
    }

            $src = $_POST['src'];
            $dest = $_POST['dest'];
            $route = $_POST['route'];
            $amount = $_POST['amount'];
    
            show($_POST);
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

<!-- LOGO -->
<div><h2><a href="<?=ROOT?>/admins" id="logo_white">BusSched</a></h2></div>

<!-- NAVIGATION MENU -->
<ul class="nav-links">

<!-- NAVIGATION MENUS -->
<div class="menu">
<li><a href="<?=ROOT?>/buses">Buses</a></li>
<li><a href="<?=ROOT?>/halts">Halts</a></li>
<li><a href="<?=ROOT?>/fares"><b>Fare</b></a></li>



<li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
</div>
</ul>

</nav>

<div class="header">
    <div><h3>Bus Fare</h3></div>
    <div><button id="btn" class="button-grey">Add New</button></div>    
</div>

<form method="post" id="view_fare" style="display:none">

<?php if(!empty($errors)):?>
<?= implode("<br>", $errors)?>
<?php endif;?>

<div>
<table class="styled-table">
    
<div class="form-element">
                    <label for="">From</label>
                    <input type="text" name="src" <?php echo 'value="' .$src. '"';?> >
                </div>
                <div class="form-element">
                    <label for="">To</label>
                    <input type="text" name="dest" <?php echo 'value="' .$dest. '"';?>>
                </div>
                <div class="form-element">
                    <label for="">Route</label>
                    <input type="text" name="route" <?php echo 'value="' .$route . '"';?> >
                </div>
                <div class="form-element">
                    <label for="type">Type  </label>
                    <select name="type" id="type" class="form-control">
            <option disabled selected value>--select an option--</option>
            <option value="L">Luxury</option>
            <option value="S">Semi-Luxury</option>
            </select>
                  
                    
                </div>
                <div class="form-element">
                    <label for="">Amount</label>
                    <input type="number" name="amount" <?php echo 'value="' .$amount. '"';?> >
    	        </div>    
                    <label for="">&nbsp;</label>
                    <input class="add_cancel" type="submit" name="add_new">   
                    <input class="add_cancel" type="button" value="Cancel" onclick="cancel()">   

    

    
</table>
</div>
</form>

<div>
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


</body>
</html>