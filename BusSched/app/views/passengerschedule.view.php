<?php
include 'components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Schedule</title>

    <link href="<?= ROOT ?>/assets/css/style3.css" rel="stylesheet">
</head>

<body>
    <div style="margin: auto; justify-content:center">
        <h1>Bus Schedule</h1>
        <table>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Bus Route</th>
                <th>Bus No</th>
                <th>Bus Type</th>
                <th>Date</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Price</th>
                <th>Seats Available</th>
                <th>Book</th>
            </tr>
            <tr>
                <td>Bus ID</td>
                <td>Bus Name</td>
                <td>Bus Type</td>
                <td>Departure Time</td>
                <td>Arrival Time</td>
                <td>Date</td>
                <td>Departure Location</td>
                <td>Arrival Location</td>
                <td>Price</td>
                <td>Seats Available</td>
                <td><a href=#><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
            </tr>
            <tr>
                <td>Bus ID</td>
                <td>Bus Name</td>
                <td>Bus Type</td>
                <td>Departure Time</td>
                <td>Arrival Time</td>
                <td>Date</td>
                <td>Departure Location</td>
                <td>Arrival Location</td>
                <td>Price</td>
                <td>Seats Available</td>
                <td><a href=#><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
            </tr>
            <tr>
                <td>Bus ID</td>
                <td>Bus Name</td>
                <td>Bus Type</td>
                <td>Departure Time</td>
                <td>Arrival Time</td>
                <td>Date</td>
                <td>Departure Location</td>
                <td>Arrival Location</td>
                <td>Price</td>
                <td>Seats Available</td>
                <td><a href=#><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
            </tr>
            <tr>
                <td>Bus ID</td>
                <td>Bus Name</td>
                <td>Bus Type</td>
                <td>Departure Time</td>
                <td>Arrival Time</td>
                <td>Date</td>
                <td>Departure Location</td>
                <td>Arrival Location</td>
                <td>Price</td>
                <td>Seats Available</td>
                <td><a href=#><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
            </tr>


            <?php
            // foreach ($data as $row) {
            //     echo "<tr>";
            //     echo "<td>" . $row['bus_id'] . "</td>";
            //     echo "<td>" . $row['bus_name'] . "</td>";
            //     echo "<td>" . $row['bus_type'] . "</td>";
            //     echo "<td>" . $row['departure_time'] . "</td>";
            //     echo "<td>" . $row['arrival_time'] . "</td>";
            //     echo "<td>" . $row['departure_date'] . "</td>";
            //     echo "<td>" . $row['arrival_date'] . "</td>";
            //     echo "<td>" . $row['departure_location'] . "</td>";
            //     echo "<td>" . $row['arrival_location'] . "</td>";
            //     echo "<td>" . $row['price'] . "</td>";
            //     echo "<td>" . $row['seats_available'] . "</td>";
            //     echo "</tr>";
            // }
            ?>
        </table>
    </div>

</body>

</html>