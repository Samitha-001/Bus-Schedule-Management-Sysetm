
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
    <?php
    include 'components/navbar.php';
    include 'components/passengernavbar.php';
    ?>
    <div class="search-bar" style="margin: auto;">
        <div class="row">
            <div id="from-to" class="col-5 col-s-5 menu">
                <div><input type="text" name="from" id="from" placeholder="From"></div>
                <div><input type="text" name="to" id="to" placeholder="To"></div>
                <div style="margin:auto;"><button class="button-orange ticket-button" id="find-button">Find</button></div>
            </div>
        
            <div id="tab-from-to" class="col-5 col-s-5 menu">
                <table>
                    <tr>
                        <td><div><input type="text" name="from" id="from" placeholder="From"></div></td>
                        <td><div><input type="text" name="to" id="to" placeholder="To"></div></td>
                        <td><div style="margin:auto;"><button class="button-orange ticket-button" id="find-button">Find</button></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div id="mobile-from-to" class="col-5 col-s-5 menu">
        <table>
            <tr>
                <td>
                    <div><input type="text" name="from" id="from" placeholder="From"></div>
                    <div><input type="text" name="to" id="to" placeholder="To"></div>
                </td>
                <td>
                    <div style="margin:auto;"><button class="button-orange ticket-button" id="find-button">Find</button></div>
                </td>
            </tr>
        </table>
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
                                                    style="height:30px"></a>
                            <?php } else { ?>
                                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                                    alt="Buy Ticket" style="height:30px"></a>
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
                                                    style="height:30px"></a>
                            <?php } else { ?>
                                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                                    alt="Buy Ticket" style="height:30px"></a>
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
                                                    style="height:30px"></a>
                            <?php } else { ?>
                                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                                    alt="Buy Ticket" style="height:30px"></a>
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
                                                    style="height:30px"></a>
                            <?php } else { ?>
                                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png"
                                                    alt="Buy Ticket" style="height:30px"></a>
                            <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>