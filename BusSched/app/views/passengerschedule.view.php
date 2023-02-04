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
    <nav class="search-bar">

        <div>
            <p style="font-size:40px"><b>Bus Schedule</b></p>
        </div>
        <ul class="nav-links">
            <div class="menu">
                <li>
                    <label for="from">From</label>
                    <input type="text" name="from" id="from" placeholder="Choose city">
                </li>
                <li>
                    <label for="to">To</label>
                    <input type="text" name="to" id="to" placeholder="Choose city">

                </li>
                <li class="button-orange" id="find-button">Find</li>
            </div>
        </ul>
    </nav>


    <div style="margin: auto; justify-content:center">
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
                <td><a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
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
                <td><a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
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
                <td><a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
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
                <td><a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:50px"></a></td>
            </tr>
        </table>
    </div>

</body>

</html>