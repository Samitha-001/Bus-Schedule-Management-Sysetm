<?php
if (isset($_SESSION['USER'])) {
    $username = $_SESSION['USER']->username;
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
} else {
    redirect('login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_tickets.css">
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
                <a id="show-booked-tickets" class="ticket-type-btn selected"><span>Booked</span></a>
                <a id="show-collected-tickets" class="ticket-type-btn"><span>Collected</span></a>
                <a id="show-expired-tickets" class="ticket-type-btn"><span>Expired</span></a>
                <a id="show-inactive-tickets" class="ticket-type-btn"><span>Inactive</span></a>
                <a id="show-all-tickets" class="ticket-type-btn"><span>All</span></a>
            </div>
        </div>
        
        <div class=" col-10 col-s-10" style="margin:auto;">
        <div id="all-tickets" class="ticket-flex tickets-table">
        <table>
            <tr>
                <th>TicketID</th>
                <th>From</th>
                <th>To</th>
                <th>Booking Time</th>
                <th>Bus</th>
                <th>Seats</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <?php if($tickets): foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= $ticket->id ?></td>
                    <td><?= $ticket->source_halt ?></td>
                    <td><?= $ticket->dest_halt ?></td>
                    <td><?= $ticket->booking_time ?></td>
                    <td>NC1111</td>
                    <td>
                        <?php if(!$ticket->seats_reserved):?>
                            <i>unreserved</i>
                        <?php else: ?>
                            <?= $ticket->seats_reserved ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $ticket->price ?></td>
                    <td><?= $ticket->status ?></td>
                </tr>
                <?php endforeach;?>
            <?php else: ?>
                <tr><td colspan="8" >No tickets found</td></tr>
            <?php endif; ?>
        </table>
        </div>
    <!-- </div> -->
        
        <div class="ticket-flex" id="booked-tickets">
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'booked'): ?>
            <div class="ticket-card" data-id=<?= $ticket->id ?>>
                <h3><?= $ticket->source_halt ?> - <?= $ticket->dest_halt ?></h3>
                <p style="text-align:right;"><i><?= $ticket->status ?></i></p>
                <p>TicketID:&nbsp&nbsp<?= $ticket->id ?></p>
                <!-- <h1>Trip ID</h1> -->
                <p>Bus:&nbsp&nbspNC1111</p>
                <p>Seats:&nbsp&nbsp
                <?php if(!$ticket->seats_reserved):?>
                            <i>unreserved</i>
                        <?php else: ?>
                            <?= $ticket->seats_reserved ?>
                        <?php endif; ?></p>
                <p>Passengers:&nbsp&nbsp<?= $ticket->passenger_count ?></p>
                <p><?= $ticket->booking_time ?></p>
                <h4 style="text-align:right; margin-bottom:0px;"><?= $ticket->price ?> LKR</h4>
                <a class="ticket-transfer-a" data-ticket-id="<?= $ticket->id?>" data-seats="<?= $ticket->seats_reserved?>">View more details</a>
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
                <a class="ticket-view-more ticket-button-orange" data-ticket-id="<?= $ticket->id?>">View more</a>
            </div>
            <?php endif; endforeach; else: ?>
            <div class="ticket-card">
                <h1>No tickets found</h1>
            </div>
        <?php endif; ?>
        </div>
    <!-- </div> -->

    <!-- <div class=" col-10 col-s-10" style="margin:auto;"> -->
    <div class="ticket-flex tickets-table" id="expired-tickets">
    <table>
        <tr>
            <th>TicketID</th>
            <th>From</th>
            <th>To</th>
            <th>Booking Time</th>
            <th>Bus</th>
            <th>Seats</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'expired'): ?>
                <tr>
                    <td><?= $ticket->id ?></td>
                    <td><?= $ticket->source_halt ?></td>
                    <td><?= $ticket->dest_halt ?></td>
                    <td><?= $ticket->booking_time ?></td>
                    <td>NC1111</td>
                    <td>
                        <?php if(!$ticket->seats_reserved):?>
                            <i>unreserved</i>
                        <?php else: ?>
                            <?= $ticket->seats_reserved ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $ticket->price ?></td>
                    <td><?= $ticket->status ?></td>
                </tr>
                <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
        <?php endif; ?>
    </table>
    </div>
    
    <div class="ticket-flex tickets-table" id="inactive-tickets">
    <table>
        <tr>
            <th>TicketID</th>
            <th>From</th>
            <th>To</th>
            <th>Booking Time</th>
            <th>Bus</th>
            <th>Seats</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        <?php if ($tickets): foreach ($tickets as $ticket):
            if ($ticket->status == 'inactive'): ?>
                <tr>
                    <td><?= $ticket->id ?></td>
                    <td><?= $ticket->source_halt ?></td>
                    <td><?= $ticket->dest_halt ?></td>
                    <td><?= $ticket->booking_time ?></td>
                    <td>NC1111</td>
                    <td>
                        <?php if(!$ticket->seats_reserved):?>
                            <i>unreserved</i>
                        <?php else: ?>
                            <?= $ticket->seats_reserved ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $ticket->price ?></td>
                    <td><?= $ticket->status ?></td>
                </tr>
                <?php endif; endforeach; else: ?>
                <div class="ticket-card">
                    <h1>No tickets found</h1>
                </div>
        <?php endif; ?>
        </table>
    </div>
    </div>

    <div id="collected-ticket-details" class="ticket-details-card" style="display:none"  data-username="<?=$_SESSION['USER']->username ?>">
        <span class="close">
            <img src="<?= ROOT ?>/assets/images/icons/cancel.png" alt="close" width="20px">
        </span>
        <h1 style="margin-left: 20px;">Ticket Details</h1>
        <table>
            <tr>
                <th colspan="2">
                    <h3><span id="ticket-details-from" name="source_halt"></span> - <span id="ticket-details-to" name="dest_halt"></span></h3>
                </th>
                <td>
                    Estimated time of arrival<span id="ticket-details-arrival" name="arrival_time"></span>
                </td>
                <td>
                    Trip starts at <span id="ticket-details-departure" name="departure_time"></span>
                </td>
            </tr>
            <tr>
                <th>Trip ID: </th>
                <td id="ticket-details-trip" name="trip_id"><?= $ticket->trip_id ?></td>
                <th>Ticket ID: </th>
                <td id="ticket-details-ticket" name="id"><?= $ticket->id ?></td>
            </tr>
            <tr>
                <th>Bus No.: </th>
                <td id="ticket-details-bus" name="bus_no"></td>
                <th>No. of Passengers: </th>
                <td id="ticket-details-passengers" name="passenger_count"></td>
            </tr>
            <tr>
                <th>Seat(s): </th>
                <td id="ticket-details-seats" name="seat_number"></td>
                <th>Time booked: </th>
                <td id="ticket-details-booking-time" name="booking_time"><?= $ticket->booking_time ?></td>
            </tr>
            <tr>
                <th>Price: </th>
                <td id="ticket-details-price" name="price"></td>
                <th>Collected at: </th>
                <td id="ticket-details-collected"></td>
            </tr>
            <tr>
                <th>Last updated: </th>
                <td>
                    <span id="ticket-details-last-updated" name="last_updated"></span><br> | 
                    <span id="ticket-details-last-updated-at"></span>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                <td colspan="2" style="text-align:center; padding:15px;">
                    <a id="a-update-location" class="ticket-button-orange">Update location and earn points</a>
                </td>
                <td colspan="2" style="text-align:center; padding:15px;">
                    <a id="a-got-off" class="ticket-button-orange">Got off the bus</a>
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
                <p>Did you get off the bus at <span id="got-off-dest"></span>?</p>
                <div  style="display:flex; align-items:center; justify-content:center;">
                    <button id="btn-got-off-yes" class="ticket-button-orange">Yes</button>
                    <button id="btn-got-off-cancel" class="ticket-button-orange">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- pop up div to update location -->
    <div id="update-location-div" style="display:none;">
        <div id="inside-update-location-div">
        </div>
        <h1></h1>
        <div style="display:flex; align-items:center; justify-content:center;">
            <button id="btn-update-location-confirm" class="ticket-button-orange">Confirm</button>
            <button id="btn-update-location-cancel" class="ticket-button-orange">Cancel</button>
        </div>
    </div>

    
    <!-- pop up div for rate -->
    <div id="rate-popup" class="pop-up" style="display:none">
        <div class="pop-up-content">
            <p style="padding-top:10px;">Rate the driver</p>
            <div class="cont">
                <div class="stars">
                    <form action="">
                    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" checked="checked"/>
                    <label class="star star-1" for="star-1"></label>
                    </form>
                </div>
            </div>
            <p>Rate the conductor</p>
            <div class="cont">
                <div class="stars">
                    <form action="">
                    <input class="star star-5" id="star-5-2" type="radio" name="star" value="5"/>
                    <label class="star star-5" for="star-5-2"></label>
                    <input class="star star-4" id="star-4-2" type="radio" name="star" value="4"/>
                    <label class="star star-4" for="star-4-2"></label>
                    <input class="star star-3" id="star-3-2" type="radio" name="star" value="3"/>
                    <label class="star star-3" for="star-3-2"></label>
                    <input class="star star-2" id="star-2-2" type="radio" name="star" value="2"/>
                    <label class="star star-2" for="star-2-2"></label>
                    <input class="star star-1" id="star-1-2" type="radio" name="star" value="1" checked="checked"/>
                    <label class="star star-1" for="star-1-2"></label>
                    </form>
                </div>
            </div>
            <p>Rate the bus</p>
            <div class="cont">
                <div class="stars">
                    <form action="">
                    <input class="star star-5" id="star-5-3" type="radio" name="star" value="5"/>
                    <label class="star star-5" for="star-5-3"></label>
                    <input class="star star-4" id="star-4-3" type="radio" name="star" value="4"/>
                    <label class="star star-4" for="star-4-3"></label>
                    <input class="star star-3" id="star-3-3" type="radio" name="star" value="3"/>
                    <label class="star star-3" for="star-3-3"></label>
                    <input class="star star-2" id="star-2-3" type="radio" name="star" value="2"/>
                    <label class="star star-2" for="star-2-3"></label>
                    <input class="star star-1" id="star-1-3" type="radio" name="star" value="1" checked="checked"/>
                    <label class="star star-1" for="star-1-3"></label>
                    </form>
                </div>
            </div>
            <div style="display:flex; align-items:center; justify-content:center;">
                <button id="btn-rate" class="ticket-button-orange">Rate</button>
                <a id="btn-rate-skip">Skip</a>
            </div>
        </div>
    </div>
</body>

</html>