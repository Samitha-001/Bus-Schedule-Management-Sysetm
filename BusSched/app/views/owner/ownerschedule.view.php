
<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Schedule</title>

    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/ownerschedule.js"></script>

</head>

<body>
  
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

<?php
// today's date
$date = date('Y-m-d');
?>
<body>

    <div class="header orange-header">
        <div>
            <h2>Schedule</h2>
        </div>
        <div>
            <!-- create dropdown 'Pettah', 'Piliyandala' -->
            <select name="starting_halt" id="starting_halt">
                <option value="Pettah">Pettah</option>
                <option value="Piliyandala">Piliyandala</option>
            </select>
            <!-- create a dropdown with $date and tomorrow -->
            <select name="trip_date" id="trip_date">
                <option value="<?= $date ?>"><?= $date ?></option>
                <option value="<?= date('Y-m-d', strtotime('+1 day')) ?>"><?= date('Y-m-d', strtotime('+1 day')) ?></option>
            </select>
        </div>
    </div>
    
    <main class="container">
    <div class="row">
        <div class="col-10 col-s-10" style="margin: auto; padding:0px;">
            <table id="schedule-table" class="schedule-table" style="width: 100%; font-size: 12px;">
                <tr>
                    <th>Trip ID</th> <!-- comment later -->
                    <th>Trip starts</th>
                    <th>Start</th>
                    <th>Bus No</th>
                    <th>Bus Type</th>
                    <th>Last Passed</th>
                </tr>
                <?php if ($trips):
                foreach ($trips as $trip):
                // shows only trips that are not ended
                if ($trip->status != "ended") { ?>

                <tr data-id = <?= $trip->id ?> class='data-row'>
                <?php
                $tripx = new Bus();
                $bus = $tripx->getBus($trip->bus_no);
                ?>
                <td><?= $trip->id ?></td>
                    <td data-fieldname="trip_date"><span data-fieldname="trip_date_val"><?= $trip->trip_date ?></span>&nbsp&nbsp&nbsp|&nbsp&nbsp<span data-fieldname="departure_time"><?= $trip->departure_time ?></span></td>
                    <td data-fieldname="starting_halt"><?= $trip->starting_halt ?></td>
                    <td data-fieldname="bus_no"><?= $trip->bus_no ?></td>
                    <td data-fieldname="bus_type"><?= $bus->type ?></td>
                    <td data-fieldname="last_updated">
                        <?php if ($trip->last_updated_halt)
                            echo "$trip->last_updated_halt";
                        else
                            echo "Trip hasn't started yet" ?>
                    </td>
                </tr>
                <?php } endforeach; else:?>
                <tr>
                    <td colspan="9" style="text-align:center;color:#999999;"><i>Sorry! No matches found.</i></td>
            </tr>
          <?php endif; ?>
            </table>
        </div>
    </div>
    </main>
</body>

</html>