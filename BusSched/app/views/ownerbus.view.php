
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Buses Owned</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
   
</head>

<body>
<?php
include 'components/ownernavbar.php';
include 'components/ownersidebar.php';
?>
  <main class="container1">

<div class="header orange-header">
    <div>
        <h3>Buses Owned</h3>
    </div>
    <!-- <div><button id="btn" class="button-grey">Update Availability</button></div> -->
</div>


<div>
    <br>
    <table border='1' class="styled-table">
        <tr>
            <!-- bus table columns
            'id',
            'bus_no',
            'type',
            'seats_no',
            'route',
            'start',
            'dest',
            'owner',
            'conductor',
            'driver' -->
            <th>#</th>
            <th>Bus No.</th>
            <th>Type</th>
            <th>Seats No.</th>
            <th>Route</th>
            <th>Start</th>
            <th>Destination</th>
            <th>Owner</th>
            <th>Conductor</th>
            <th>Driver</th>
        </tr>

        <?php
        // if not empty, then display the buses
        if ($buses):
        foreach ($buses as $bus): ?>
            <tr>
                <td><?= $bus->id ?></td>
                <td><?= $bus->bus_no ?></td>
                <td><?= $bus->type ?></td>
                <td><?= $bus->seats_no ?></td>
                <td><?= $bus->route ?></td>
                <td><?= $bus->start ?></td>
                <td><?= $bus->dest ?></td>
                <td><?= $bus->owner ?></td>
                <td><?= $bus->conductor ?></td>
                <td><?= $bus->driver ?></td>
            </tr>
        <?php endforeach;
            else : ?>
            <tr>
                <td colspan="10">No buses found</td>
            </tr>
        <?php endif;?>
    </table>
</div>

<!-- <script src="<?= ROOT ?>/assets/js/bus.js"></script> -->
</main>
</body>

</html>


