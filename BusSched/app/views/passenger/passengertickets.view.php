<?php
$username = $_SESSION['USER']->username;
if (isset($_SESSION['USER'])) {
    if ($_SESSION['USER']->role == 'driver') {
        redirect('drivers');
    } else if ($_SESSION['USER']->role == 'conductor') {
        redirect('conductors');
    } else if ($_SESSION['USER']->role == 'scheduler') {
        redirect('schedulers');
    } else if ($_SESSION['USER']->role == 'owner') {
        redirect('owners');
    } else if ($_SESSION['USER']->role == 'admin') {
        redirect('admins');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_tickets.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/passengertickets.js"></script>
    <title>Tickets</title>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
?>

    <div class="row main-content">
        <div id="profile-header">
            <div class="wrapper">
            <a id="show-all-tickets" class="ticket-type-btn selected"><span>All</span></a>
            <a id="show-booked-tickets" class="ticket-type-btn"><span>Booked</span></a>
            <a id="show-collected-tickets" class="ticket-type-btn"><span>Collected</span></a>
            <a id="show-expired-tickets" class="ticket-type-btn"><span>Expired</span></a>
            <a id="show-inactive-tickets" class="ticket-type-btn"><span>Inactive</span></a>
            </div>
        </div>
        
        <div id="all-tickets" class="ticket-flex">
            <?php if ($tickets):
                foreach ($tickets as $ticket): ?>
                <div class="ticket-card" data-id=<?= $ticket->id ?>>
                    <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                    <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                    <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                    <!-- <h1>Trip ID</h1> -->
                    <p>Bus:&nbsp&nbspNC1111</p>
                    <p>Seats:&nbsp&nbsp<i>unreserved</i></p>
                    <!-- split date and time -->
                    <p><?= $ticket->booking_time ?></p>
                </div>
                <?php endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="ticket-flex" id="booked-tickets">
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'booked'): ?>
                <div class="ticket-card" data-id=<?= $ticket->id ?>>
                    <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                    <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                    <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                    <!-- <h1>Trip ID</h1> -->
                    <p>Bus:&nbsp&nbspNC1111</p>
                    <p>Seats:&nbsp&nbsp<i>unreserved</i></p>
                    <!-- split date and time -->
                    <p><?= $ticket->booking_time ?></p>
                </div>
                <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
                <?php endif; ?>
        </div>

    <div class="ticket-flex" id="collected-tickets">
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'collected'): ?>
                <div class="ticket-card" data-id=<?= $ticket->id ?>>
                    <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                    <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                    <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                    <!-- <h1>Trip ID</h1> -->
                    <p>Bus:&nbsp&nbspNC1111</p>
                    <p>Seats:&nbsp&nbsp<i>unreserved</i></p>
                    <!-- split date and time -->
                    <p><?= $ticket->booking_time ?></p>
                    <br>
                    <a class="ticket-view-more ticket-button-orange" data-ticket-id="<?= $ticket->id ?>">View more</a>
                </div>
            <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
        <?php endif; ?>
        </div>
    </div>

    <div class="ticket-flex" id="expired-tickets">
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'expired'): ?>
                <div class="ticket-card" data-id=<?= $ticket->id ?>>
                    <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                    <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                    <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                    <!-- <h1>Trip ID</h1> -->
                    <p>Bus:&nbsp&nbspNC1111</p>
                    <p>Seats:&nbsp&nbsp<i>unreserved</i></p>
                    <!-- split date and time -->
                    <p><?= $ticket->booking_time ?></p>
                </div>
                <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
        <?php endif; ?>
        </div>
    </div>

    <!-- inactive tickets div -->
    <div class="ticket-flex" id="inactive-tickets">
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'inactive'): ?>
                <div class="ticket-card" data-id=<?= $ticket->id ?>>
                    <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                    <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                    <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                    <!-- <h1>Trip ID</h1> -->
                    <p>Bus:&nbsp&nbspNC1111</p>
                    <p>Seats:&nbsp&nbsp<i>unreserved</i></p>
                    <!-- split date and time -->
                    <p><?= $ticket->booking_time ?></p>
                </div>
                    <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
        <?php endif; ?>
    </div>
    </div>

    <div id="collected-ticket-details" class="ticket-details-card" style="display:none">
        <span class="close">
            <img src="<?= ROOT ?>/assets/images/icons/cancel.png" alt="close" width="20px">
        </span>
        <h1 id="update-location-h" style="display:none; margin-left: 20px;">Update Location

    </h1>
        <table>
            <tr>
                <th colspan="2">
                    <h3><span></span> - <span></span></h3>
                </th>
                <td>
                    Arrival<span id="ticket-details-arrival" name="arrival_time"></span>
                </td>
                <td>
                    Departure<span id="ticket-details-departure" name="departure_time"></span>
                </td>
            </tr>
            <tr>
                <th>Trip ID: </th>
                <td id="ticket-details-name" name="trip_id"><?= $ticket->trip_id ?></td>
                <th>Ticket ID: </th>
                <td id="ticket-details-id" name="id"><?= $ticket->id ?></td>
            </tr>
            <tr>
                <th>Bus No.: </th>
                <td id="ticket-details-bus" name="bus_no">NC1111</td>
                <th>No. of Passengers: </th>
                <td id="ticket-details-passengers" name="passenger_count"></td>
            </tr>
            <tr>
                <th>Seat(s): </th>
                <td>A2, A3</td>
                <th>Time booked: </th>
                <td id="ticket-details-booking-time" name="booking_time"><?= $ticket->booking_time ?></td>
            </tr>
            <tr>
                <th>Price: </th>
                <td id="ticket-details-price" name="price">150 LKR</td>
                <th id="ticket-details-collected">Collected at: </th>
                <td>3:23 PM</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <a id="a-update-location">Update location and earn points</a>
                </td>
                <td colspan="2" style="text-align:center">
                    <a id="a-got-off">Got off the bus</a>
                </td>
            </tr>
        </table>
        
        <!-- pop up div for got off bus-->
        <div id="gotoff-popup" class="pop-up" style="display:none">
            <div class="pop-up-content">
                <!-- TODO -->
                <span class="close">
                    <img src="<?= ROOT ?>/assets/images/icons/cancel.png" alt="close" width="20px">
                </span>
                <br>
                <p>Did you get off the bus at <?= $ticket->dest_halt ?>?</p>
                <div  style="display:flex; align-items:center; justify-content:center;">
                    <button id="btn-got-off-yes" class="ticket-button-orange">Yes</button>
                    <button id="btn-got-off-cancel" class="ticket-button-orange">No</button>
                </div>
            </div>
        </div>
    </div>

    <?php $id = $ticket->id; ?>
    <!-- pop up div to update location -->
    <div id="update-location-div" style="display:none;">
        <div id="inside-update-location-div" style="display:flex; overflow-x: scroll;">
        </div>
        <h1></h1>
        <div style="display:flex; align-items:center; justify-content:center;">
            <button id="btn-update-location-confirm" class="ticket-button-orange">Confirm</button>
            <button id="btn-update-location-cancel" class="ticket-button-orange">Cancel</button>
        </div>
    </div>

</body>

</html>