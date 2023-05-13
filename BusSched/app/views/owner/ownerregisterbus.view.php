<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Register New Bus</title>

    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">

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
   <form method="post" id="register-bus" >
    <?php if (!empty($errors)) : ?>
        <?= implode("<br>", $errors) ?>
    <?php endif; ?>
    <div >
        <table>
            <tr>
            <td><label for="bus_no">Bus Number:</label></td>
            <td><input type="text" id="bus_no" name="bus_no" required placeholder="NC1111"  pattern="[A-Z]{2}\d{4}"></td>
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
            <td><input type="number" id="seats_no" name="seats_no" required placeholder="10"></td>
            </tr>
            <tr>
            <td><label for="route">Route:</label></td>
            <td><input type="text" id="route" name="route" required placeholder="120"></td>
            </tr>
            <tr>
            <td><label for="start">Starting Halt:</label></td>
            <td><input type="text" id="start" name="start" default placeholder="Pettah"></td>
            </tr>
            <tr>
            <td><label for="dest">Destination:</label></td>
            <td><input type="text" id="dest" name="dest" placeholder="Piliyandala"></td>
            </tr>
            <tr>
            <td><label for="conductor">Conductor:</label></td>
            <td><input type="text" id="conductor" name="conductor" placeholder="Nimal Lansa"></td>
            </tr>
            <tr>
            <td><label for="driver">Driver:</label></td>
            <td><input type="text" id="driver" name="driver" placeholder="Amal Lansa"></td>
            </tr>
            
        </table>
        <input id="add-bus-btn" type="submit" class="button-green" value="Submit">
         
    </div>
</form>
  </div>
</div> 
</main>
</body>

</html>





