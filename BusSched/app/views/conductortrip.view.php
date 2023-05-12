<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Trips</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php include 'components/navbarcon.php'; ?>

<main class="container1">
    <div class="header orange-header">
        <h2>Trips today</h2>
    </div>
        <p style="color:white; text-align:right; padding-right:20px;position: absolute; top: 105px; right: 0px;"><?= date("Y-m-d") ?></p>
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
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No trips found</td>
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
                        <td><?= $tripx->Status ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Trips found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<!-- div to update location -->
<div id="update-location-div">
        <div id="inside-update-location-div">
            <?php
            // get all the halts
            $halt = new Halt();
            $halts = $halt->findAll();
            // // get trip id
            // $trip_id = $_GET['trip_id'];
            // // get trip details
            // $trip = new Trip();
            // $trip = $trip->getTrip(['id' => $trip_id]);
            // $src = $trip->starting_halt;
            // if ($src == 'Pettah') {
            //     // reverse the array
            //     $halts = array_reverse($halts);
            // }

            // for each halt, create a location-update-card
            foreach ($halts as $halt) {
            ?>
            <div class="location-update-card" data-halt-id="<?= $halt->id ?>">
                <?= $halt->name ?>
                <p></p>
            </div>
            <?php
            };
            ?>
        </div>
        <h1></h1>
        <div style="display:flex; align-items:center; justify-content:center;">
            <button id="btn-update-location-confirm" class="ticket-button-orange">Confirm</button>
            <!-- <button id="btn-update-location-cancel" class="ticket-button-orange">Cancel</button> -->
        </div>
    </div>
   
    <script>
        let username = '<?= $conductor ?>';
        let insideLocationDiv = document.getElementById("inside-update-location-div");
        // add event listeners for each locationDivs
        insideLocationDiv.addEventListener("click", function (e) {
            if (e.target.classList.contains("location-update-card") && !e.target.classList.contains("halt-passed")) {
            // if clicked on a div with class location-update-card
            let locationDivs = document.querySelectorAll(".location-update-card");

            // remove class from each location div
            locationDivs.forEach((div) => {
                div.classList.remove("selected-halt");
                div.getElementsByTagName("p")[0].innerHTML = " ";
            });

            let div = e.target;
            div.classList.add("selected-halt");
            div.setAttribute("data-halt-id", e.target.innerHTML);
            div.getElementsByTagName("p")[0].innerHTML = "Reached?";
            // e.target.focus();
            }
        });

        // update location confirm button
        let updateLocationConfirmBtn = document.getElementById("btn-update-location-confirm");
        updateLocationConfirmBtn.addEventListener("click", function () {
            // find div with clas selected-halt
            let selectedHaltDiv = document.querySelector(".selected-halt");
            let halt = selectedHaltDiv.dataset.haltId;
            // trip ID
            let tripID = 1;

            let data = { id: null, username: username, user_role: 'conductor', tripID: tripID, halt: halt, gotoff: false };
            
            // send data to server
            let url = `${ROOT}/passengertickets/api_update_location`;
            let options = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
            };
            fetch(url, options)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
            })
            .catch((error) => {
                console.log(error);
            });
        });
    </script>
    <script src="<?= ROOT ?>/assets/js/trips.js"></script>
</main>

</body>

</html>