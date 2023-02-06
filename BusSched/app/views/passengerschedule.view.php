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
    <div class="search-bar" style="margin: auto;">
        <div class="row">

            <div class="col-3 col-s-3 menu">
                <h1 style="font-size:25px">Bus schedule</h1>
            </div>
            <div class="col-3 col-s-12">
                <label for="from">From</label>
                <input type="text" name="from" id="from" placeholder="Choose city">
            </div>
            <div class="col-3 col-s-12">
                <label for="to">To</label>
                <input type="text" name="to" id="to" placeholder="Choose city">
            </div>
            <div class="col-3 col-s-12">
                <button class="button-orange ticket-button" id="find-button">Find</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 col-s-10" style="margin: auto;">
            <table style="width: 100%; font-size: 12px;">
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
                            <a href="<?= ROOT ?>/passengerticket"><img
                                    src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket"
                                    style="height:50px"></a>
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
                            <a href="<?= ROOT ?>/passengerticket"><img
                                    src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket"
                                    style="height:50px"></a>
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
                            <a href="<?= ROOT ?>/passengerticket"><img
                                    src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket"
                                    style="height:50px"></a>
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
                            <a href="<?= ROOT ?>/passengerticket"><img
                                    src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket"
                                    style="height:50px"></a>
                            <?php } else { ?>
                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                    alt="Buy Ticket" style="height:50px"></a>
                            <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>