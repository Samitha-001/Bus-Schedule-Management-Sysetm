<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>

<?php include '../app/views/components/navbarcon.php'; ?>


    <div class="header orange-header">
        <h2>Trips</h2>
    </div>

<main class="container1">
    
    <?php 
    $ongoing = false;
  
    $conductor = $_SESSION['USER']->username;
    $bus = new Bus();
    $businfo = $bus->getConductorBuses($conductor)[0];
    $busno = $businfo->bus_no;
    $trip = new Trip();
    $trips = $trip->getBusTrips($busno);
    
    $starting_trip = array();
    $ended_trip=array();
    foreach ($trips as $trip) {
        if ($trip->status == "scheduled") {
            array_push($starting_trip,$trip);
        }
    }

    foreach ($trips as $trip) {
        if ($trip->status == "ended") {
            array_push($ended_trip,$trip);
        }
    }
        
    // $trip_id=$starting_trip->id;
    ?>
    <div class="col-2">
        <h1>Upcoming Trips</h1>
        <table border='1' class="styled-table" id="upcoming_trips">
            <tr>
                <th>Trip ID</th>
                <th>Date</th>
                <th>Departure Time</th>
                <th>Starting halt</th>
             
                <th></th>
            </tr> 

            <?php if(!empty($scheduled_trips)): ?>
                <?php foreach ($scheduled_trips as $trip): ?>
                    <tr class="trip-row" data-trip-id="<?= $trip->id ?>" data-starting-halt="<?= $trip->starting_halt ?>">
                        <td data-fieldname="trip_id"><?= $trip->id ?></td>
                        <td data-fieldname="trip_date"><?= $trip->trip_date ?></td>
                        <td data-fieldname="departure_time"><?= $trip->departure_time ?></td>
                        <td data-fieldname="starting_halt"><?= $trip->starting_halt ?></td>
                       
                        <?php ?>
                        
                        </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Trips found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <div class="col-2">
        <h1>Ended Trips</h1>
        <table border='1' class="styled-table" id="ended_trips">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Starting halt</th>
                <th></th>
            </tr> 
            <?php if(!empty($ended_trips)): ?>
                <?php foreach ($ended_trips as $tripx): ?>
                    <tr>
                        <td data-fieldname="trip_id"><?= $trip->id ?></td>
                        <td><?= $tripx->trip_date ?></td>
                        <td><?= $tripx->departure_time ?></td>
                        <td><?= $tripx->starting_halt ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Trips found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <script src="<?= ROOT ?>/assets/js/conductortrips.js"></script>
</main>

</body>

</html>