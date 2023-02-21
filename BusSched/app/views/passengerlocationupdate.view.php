
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>

    <link href="<?= ROOT ?>/assets/css/passenger_location.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'components/navbar.php';
    include 'components/passengernavbar.php';
    ?>
<table>
    <tr>
        <th rowspan="2"><h1>NC 1111</h1></th>
        <!-- td with image -->
        <td rowspan="2"><img src="<?= ROOT ?>/assets/images/icons/from-to.png"></td>
        <td>From: Piliyandala</td>
    </tr>
    <tr>
        <td>To: Pettah</td>
    </tr>
</table>

<table class="location-table">
  <tr>
    <th></th>
    <th>Scheduled</th>
    <th>Actual</th>
    <th></th>
  </tr>
  <tr class="passed">
    <td><i class="tick"></i></td>
    <td>10:00 AM</td>
    <td>10:05 AM</td>
    <td>Halt 1</td>
  </tr>
  <tr class="upcoming">
    <td><input type="radio" name="halt" value="halt2"></td>
    <td>11:00 AM</td>
    <td>-</td>
    <td>Halt 2</td>
  </tr>
  <tr class="upcoming">
    <td><input type="radio" name="halt" value="halt3"></td>
    <td>12:00 PM</td>
    <td>-</td>
    <td>Halt 3</td>
  </tr>
</table>

<script src="<?= ROOT ?>/assets/js/passengerlocation.js"></script>

</body>

</html>