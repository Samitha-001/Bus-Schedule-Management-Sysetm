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

<main class="container1">
    <div class="col-1">
        <div class="header orange-header">
            <h1>Trips</h1>     
        </div>
    </div>
    <div class="data-table"></div>
    <div class="selection"></div> <!-- Added closing tag -->
    <?php 
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
            <?php if(!empty($starting_trip)): ?>
                <?php foreach ($starting_trip as $trip): ?>
       
                    <tr>
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

    <div class="col-3">
        <h1>Ended Trips</h1>
        <table border='1' class="styled-table" id="ended_trips">
            <tr>
                <th>Date</th>
                <th>Departure Time</th>
                <th>Starting halt</th>
                <th>Status</th>
                <th></th>
            </tr> 
            <?php if(!empty($ended_trip)): ?>
                <?php foreach ($ended_trip as $tripx): ?>
                    <tr>
                        <td><?= $tripx->trip_date ?></td>
                        <td><?= $tripx->departure_time ?></td>
                        <td><?= $tripx->starting_halt ?></td>
                        <td><?= $tripx->status ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Trips found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    
   
    <script src="<?= ROOT ?>/assets/js/trips.js"></script>
</main>

</body>

</html>