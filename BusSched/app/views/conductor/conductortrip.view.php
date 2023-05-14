<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php'; ?>

    <title>Trips</title>

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
    $scheduled_trips = array();
    $ended_trips = array();

    foreach ($trips as $trip) {
        if ($trip->status == "scheduled") {
            // show($trip->status);
            array_push($scheduled_trips, $trip);
        }
        if ($trip->status == "ended") {
            array_push($ended_trips, $trip);
        }
        if ($trip->status == "started") {
            $ongoing_trip = $trip;
        }
    }
    ?>


    <?php
    // $temp = new Trip();
    // $temp->updateTrip(1, 'scheduled');
    ?>
    <!-- ongoing trip -->
    <div class="col-2">
        <h1>Ongoing Trip</h1>
        <table border='1' class="styled-table" data-ongoing-trip="<?php if (!empty($ongoing_trip))
            echo "yes";
        else
            echo "no"; ?>" id="ongoing-trips">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Last passed</th>
                <th></th>
            </tr>
            <?php if (!empty($ongoing_trip)):
                $ongoing = true;
                ?>
                <tr>
                    <td id="end-trip" style="display: none">
                        <button data-id="<?= $ongoing_trip->id ?>" class="p-1 end-trip-btn">End Trip</button>
                    </td>

                    <td data-fieldname="trip_id" id="end-trip-id-cell"><?= $ongoing_trip->id ?></td>
                    <td><?= $ongoing_trip->trip_date ?></td>
                    <td><?= $ongoing_trip->departure_time ?></td>
                    <td><?= $ongoing_trip->last_updated_halt ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="4">No ongoing trip at the moment</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- upcoming trips -->
    <div class="col-2">
        <h1>Upcoming Trips</h1>
        <table border='1' class="styled-table" id="upcoming-trips">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Starting halt</th>

                <th></th>
            </tr>

            <?php if (!empty($scheduled_trips)): ?>
                <?php foreach ($scheduled_trips as $trip): ?>
                    <tr class="trip-row" data-trip-id="<?= $trip->id ?>"
                        data-starting-halt="<?= $trip->starting_halt ?>">
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
            <?php if (!empty($ended_trips)): ?>
                <?php foreach ($ended_trips as $tripx): ?>
                    <tr>
                        <td data-fieldname="trip_id"><?= $tripx->id ?></td>
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
<style>
    .end-trip-btn {
        width: 50px;
        background-color: #4CAF50;
        height: 20px;
        font-size: smaller;
    }
</style>
<script>
    let endTd = document.getElementById('end-trip');
    if (endTd) {

        let idTd = document.querySelector('#end-trip-id-cell')
        let endrow = endTd.parentNode;

        endrow.addEventListener('click', function () {
            if (endTd.style.display == 'table-cell') {
                endTd.style.display = 'none';
                idTd.style.display = 'table-cell';
            } else if (endTd.style.display == 'none') {
                endTd.style.display = 'table-cell';
                idTd.style.display = 'none';
            }
        });

        document.querySelector('.end-trip-btn').addEventListener('click', (e) => {
            let end_ID = e.target.dataset.id;
            //redirect to end trip page
            window.location.href = `${ROOT}/conductortrips/trips/${end_ID}`;



            // let url = `${ROOT}/conductortrips/api_end_trip`;
            // let options = {
            //     method: "POST",
            //     credentials: "same-origin",
            //     mode: "same-origin",
            //     headers: {
            //         "Content-Type": "application/json;charset=utf-8",
            //     },
            //     body: JSON.stringify({
            //         trip_id: end_ID,
            //     }),
            // };
            //
            // fetch(url, options)
            //     .then((response) => response.json())
            //     .catch((err) => {
            //         console.log(err);
            //     })
            //     .then((data) => {
            //         console.log(data);
            //         new Toast("fa-solid fa-check-circle", "#4CAF50", "Success", "Trip Ended", false, 5000);
            //         setTimeout(() => {
            //             endrow.remove();
            //             //add another row saying No ongoing trip
            //             let table = document.getElementById('ongoing-trips');
            //             let row = table.insertRow(1);
            //             //span row over all columns
            //             row.setAttribute('colspan', '5');
            //             row.innerHTML = '<td colspan="5">No ongoing trip at the moment</td>';
            //         }, 1000);
            //         setTimeout(() => {
            //             window.location.reload();
            //         }, 2000);
            //     });
        })
    }


</script>
