<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Register New Bus</title>

    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">


</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

<div class="header orange-header">
    <div>
        <h2>Register New Bus</h2>            
    </div>
</div>

<main class="container">
<div class="row" style="justify-content:center;">
    <div>
        <form method="post" id="register-bus" style="margin-top: 40px;" action="<?=ROOT?>/ownerregisterbus/registerBus">
        <?php if (!empty($errors)) : ?>
            <?= implode("<br>", $errors) ?>
        <?php endif; ?>
            <table>
                <tr>
                <td><label for="bus_no">Bus Number:</label></td>
                <td><input type="text" id="bus_no" name="bus_no" required placeholder="Enter bus no. Ex:NC1111"  pattern="[A-Z]{2}\d{4}"></td>
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
                <input type="text" id="route" name="route" required value="120" hidden>
                <tr>
                <td><label for="start">Starting Halt:</label></td>
                <td>
                    <select id="start" name="start" required>
                    <option value="Pettah">Pettah</option>
                    <option value="Piliyandala">Piliyandala</option>
                    </select>
                </tr>
                <input type="text" id="dest" name="dest" hidden>
                </tr>
                <tr>
                <td><label for="conductor">Conductor:</label></td>
                <td><select type="text" id="conductor" name="conductor"></td>
                </tr>
                <tr>
                <td><label for="driver">Driver:</label></td>
                <td><select type="text" id="driver" name="driver"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input id="add-bus-btn" type="submit" class="button-green" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
  </div>
</div> 
</main>

<script>
    // get $unassigned_conductors  and drivers from php
    var unassigned_conductors = <?php echo json_encode($unassigned_conductors); ?>;
    var unassigned_drivers = <?php echo json_encode($unassigned_drivers); ?>;
    // add options to conductor and driver select tags
    var conductor_select = document.getElementById("conductor");
    var driver_select = document.getElementById("driver");
    for (var i = 0; i < unassigned_conductors.length; i++) {
        var option = document.createElement("option");
        option.value = unassigned_conductors[i]['username'];
        option.text = unassigned_conductors[i]['username'];
        conductor_select.add(option);
    }
    for (var i = 0; i < unassigned_drivers.length; i++) {
        var option = document.createElement("option");
        option.value = unassigned_drivers[i]['username'];
        option.text = unassigned_drivers[i]['username'];
        driver_select.add(option);
    }
</script>
</body>

</html>