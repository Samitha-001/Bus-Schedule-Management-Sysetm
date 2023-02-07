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

    <link href="<?= ROOT ?>/assets/css/ticket.css" rel="stylesheet">
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
                <td>Kohuwala</td>
                <td>Horana</td>
                <td>120</td>
                <td>NC 1111</td>
                <td>Semi-Luxury</td>
                <td>2021-09-01</td>
                <td>10:00 AM</td>
                <td>12:00 PM</td>
                <td>Rs. 500</td>
                <td>10</td>
                <td>
                    <?php if (isset($_SESSION['USER'])) { ?>
                        <a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } else { ?>
                        <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Kohuwala</td>
                <td>Horana</td>
                <td>120</td>
                <td>NC 2222</td>
                <td>Semi-Luxury</td>
                <td>2021-09-01</td>
                <td>10:00 AM</td>
                <td>12:00 PM</td>
                <td>Rs. 500</td>
                <td>10</td>
                <td>
                    <?php if (isset($_SESSION['USER'])) { ?>
                        <a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } else { ?>
                        <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Kohuwala</td>
                <td>Horana</td>
                <td>120</td>
                <td>NC 3333</td>
                <td>Semi-Luxury</td>
                <td>2021-09-01</td>
                <td>10:00 AM</td>
                <td>12:00 PM</td>
                <td>Rs. 500</td>
                <td>10</td>
                <td>
                    <?php if (isset($_SESSION['USER'])) { ?>
                        <a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } else { ?>
                        <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Kohuwala</td>
                <td>Horana</td>
                <td>120</td>
                <td>NC 4444</td>
                <td>Semi-Luxury</td>
                <td>2021-09-01</td>
                <td>10:00 AM</td>
                <td>12:00 PM</td>
                <td>Rs. 500</td>
                <td>10</td>
                <td>
                    <?php if (isset($_SESSION['USER'])) { ?>
                        <a href="<?= ROOT ?>/passengerticket"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } else { ?>
                        <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                alt="Buy Ticket" style="height:50px"></a>
                        <?php } ?>
                </td>
            </tr>
            
        </table>
    </div>

</body>

</html>