<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Edit Bus Profile</title>

    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
    <link href="<?= ROOT ?>/ownerbuses">

    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
  <script src="<?= ROOT ?>/assets/js/adminbuses.js"></script>

  <style>
    td input[disabled] {
      border: none;
      background-color: transparent;
      padding: 0;
      margin: 0;
      width: 100%;
      height: 100%;
      text-align: inherit;
      font-size: inherit;
      font-family: inherit;
      color: inherit;
      cursor: default;
    }
    .edit-options, .dummy-row, .dummy-input, .add-options{
      display: none;
    }
  </style>

    <!-- <script src="<?= ROOT ?>/assets/js/ownerregisterbus.js"></script> -->

</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

<?php
$busno=$_GET['bus_no'];
// print id
// show($busno);
$bus = new Bus();
$businfo = $bus->where(['bus_no' => $busno])[0];
// show($businfo);

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
            <td><input type="" id="bus_no" name="bus_no" value="<?php echo $businfo->bus_no?> " readonly ></td>
            </tr>
            <tr>
            <td><label for="type">Type:</label></td>
            <td><input id="type" name="type" value="<?php echo $businfo->type?>" readonly ></td>
            </tr>
            <tr>
            <td><label for="seats_no">Number of Seats:</label></td>
            <td><input type="number" id="seats_no" name="seats_no" value="<?php echo $businfo->seats_no?>" readonly ></td>
            </tr>
            <tr>
            <td><label for="route">Route:</label></td>
            <td><input type="text" id="route" name="route"value="<?php echo $businfo->route?>" readonly ></td>
            </tr>
            <tr>
            <td><label for="start">Starting Halt:</label></td>
            <td><input type="text" id="start" name="start" default value="<?php echo $businfo->start?>" readonly  ></td>
            </tr>
            <tr>
            <td><label for="dest">Destination:</label></td>
            <td><input type="text" id="dest" name="dest" value="<?php echo $businfo->dest?>" readonly ></td>
            </tr>
            <tr>
            <td><label for="conductor">Conductor:</label></td>
            <td><input type="text" id="conductor" name="conductor" value="<?php echo $businfo->conductor?>" readonly ></td>
            </tr>
            <tr>
            <td><label for="driver">Driver:</label></td>
            <td><input type="text" id="driver" name="driver" value="<?php echo $businfo->driver?>" readonly  ></td>
            </tr>
        </table>


        <script>
        //   var table=document.getElementsByTagName('table')[0];
       
        </script>

        

        <input id="submit-btn" type="submit" value="Edit" class="button-green" style="padding-left:10px;margin-left:200px;font-size:18px;">
        <input id="submit-btn" type="submit" value="Delete" class="button-green" style="color:white;font-size:18px;background-color:red">    
    </div>
</form>
  </div>
</div> 
</main>
</body>

</html>


