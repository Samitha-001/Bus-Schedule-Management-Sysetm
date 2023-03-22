<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Register New Bus</title>

    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">

    <script src="<?= ROOT ?>/assets/js/ownerregisterbus.js"></script>

</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>
<main class="container1">

    <div class="header orange-header">
            <h3 class="header-title">Register New Bus</h3>            
    </div>

<div class="row">
    <div class="column left">
        <img src="<?= ROOT ?>/assets/images/buses/bus6.png" class="image">
    </div>

    <div class="column middle">
   <form method="post" id="register-bus" style="margin-left: 150px;background-color:white;font-size:18px;line-height:3em" >
    <?php if (!empty($errors)) : ?>
        <?= implode("<br>", $errors) ?>
    <?php endif; ?>

    <div>
        <table>
            <tr>
            <td><label for="bus_no">Bus Number:</label></td>
            <td><input type="text" id="bus_no" name="bus_no" required></td>
            </tr>
            <tr>
            <td><label for="type">Type:</label></td>
            <td>
                <select id="type" name="type" required>
                <option value="S">Small</option>
                <option value="L">Large</option>
                </select>
            </td>
            </tr>
            <tr>
            <td><label for="seats_no">Number of Seats:</label></td>
            <td><input type="number" id="seats_no" name="seats_no" required></td>
            </tr>
            <tr>
            <td><label for="route">Route:</label></td>
            <td><input type="text" id="route" name="route" required></td>
            </tr>
            <tr>
            <td><label for="start">Starting Halt:</label></td>
            <td><input type="text" id="start" name="start" default></td>
            </tr>
            <tr>
            <td><label for="dest">Destination:</label></td>
            <td><input type="text" id="dest" name="dest"></td>
            </tr>
            <tr>
            <td><label for="conductor">Conductor:</label></td>
            <td><input type="text" id="conductor" name="conductor"></td>
            </tr>
            <tr>
            <td><label for="driver">Driver:</label></td>
            <td><input type="text" id="driver" name="driver"></td>
            </tr>
        </table>
        <input id="submit-btn" type="submit" value="Edit" class="button-green" style="padding-left:10px;margin-left:250px;font-size:18px;">    
    </div>
</form>
  </div>
</div> 
</main>
</body>

</html>


