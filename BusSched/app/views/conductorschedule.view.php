<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
$username = $_SESSION['USER']->username;
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>

    <title>Schedule</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php include 'components/navbarcon.php'; ?>

    <div class="header orange-header">
        <h2>Schedules</h2>
    </div>

    <main class="container1">

    <div class="col-10 col-s-10" style="padding:0px;">
        <table id="schedule-table" style="width: 100%; font-size: 12px;">
            <tr>
                <th>Trip ID</th>
                <th>Trip start</th>
                <th>Bus no</th>
                <th>Start</th>
                <th>Bus type</th>
                <th>Seats available</th>
                <th>Last passed</th>
                <th></th>
            </tr>
            <?php if ($trips):
            foreach ($trips as $trip):
            // shows only trips that are not ended
            if ($trip->status != "ended") { ?>

            <tr data-trip-id = <?= $trip->id ?> data-bus = <?= $trip->bus_no ?> class='data-row'>
            <?php
            $tripx = new Trip();
            $bus = $tripx->getBus(['bus_no' => $trip->bus_no]);
            ?>
            
            <td><?= $trip->id ?></td>
            <td data-fieldname="trip_date"><?= $trip->trip_date ?>&nbsp&nbsp&nbsp|&nbsp&nbsp<span data-fieldname="departure_time"><?= $trip->departure_time ?></span></td>
            <td data-fieldname="bus_no"><?= $trip->bus_no ?></td>
            <td data-fieldname="starting_halt"><?= $trip->starting_halt ?></td>
            <td data-fieldname="bus_type"><?= $bus->type ?></td>
            <td data-fieldname="seats_available">-</td>
            <td data-fieldname="last_updated">
                <?php if ($trip->last_updated_halt)
                    echo "$trip->last_updated_halt";
                else
                    echo "Trip hasn't started yet";
                }
            endforeach;
        endif; ?>
            </td>
        </table>
    </div>
        
    </main>
    
    <?php
    $conductor = new Conductor();
    $bus = $conductor->getConductorInfo($username)->assigned_bus;
    ?>

    <script>
        // highlight trip relevant to conductor
        var conductor = '<?= $username ?>';
        var rows = document.getElementsByClassName('data-row');
        // for each row
        for (var i = 0; i < rows.length; i++) {
            // if bus no matches
            if (rows[i].dataset.bus == '<?= $bus ?>') {
                // highlight row
                // make background of all tds in the row yellow
                var tds = rows[i].getElementsByTagName('td');
                for (var j = 0; j < tds.length; j++) {
                    tds[j].style.backgroundColor = 'yellow';
                }
                // add td to row
                var td = document.createElement('td');
                td.innerHTML = '<button class="button-green">Start trip</button>';
                rows[i].appendChild(td);
            }
        }
    </script>
</body>

</html>