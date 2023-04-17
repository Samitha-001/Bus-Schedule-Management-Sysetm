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
        
        <div class="tickets-grid" id="all-tickets">
            <?php if ($tickets):
                foreach ($tickets as $ticket):?>
                    <div class="passenger-profile-card ticket-grid" data-id=<?= $ticket->id?>>
                        <h1>Ticket ID</h1>
                        <p><?= $ticket->id ?></p>
                        <h1>Trip ID</h1>
                        <p><?= $ticket->trip_id ?></p>
                        <h1>Bus</h1>
                        <p>bus</p>
                        <h1>Seat</h1>
                        <p>xxx</p>
                        <h1>Price</h1>
                        <p>xxx</p>
                        <h1>Date</h1>
                        <p>xxx</p>
                        <h1>Time</h1>
                        <p>xxx</p>
                        <p></p>
                        <p><?= $ticket->status ?></p>
                    </div>
                <?php endforeach; else: ?>
                <div class="passenger-profile-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="tickets-grid" id="booked-tickets">
            <?php if ($tickets):
                foreach ($tickets as $ticket): 
                    if ($ticket->status == 'booked'):?>
                    <div class="passenger-profile-card ticket-grid" data-id=<?= $ticket->id?>>
                        <h1>Ticket ID</h1>
                        <p><?= $ticket->id ?></p>
                        <h1>Trip ID</h1>
                        <p><?= $ticket->trip_id ?></p>
                        <h1>Bus</h1>
                        <p>bus</p>
                        <h1>Seat</h1>
                        <p>xxx</p>
                        <h1>Price</h1>
                        <p>xxx</p>
                        <h1>Date</h1>
                        <p>xxx</p>
                        <h1>Time</h1>
                        <p>xxx</p>
                        <p></p>
                        <p><?= $ticket->status ?></p>
                    </div>
                <?php endif; endforeach; else: ?>
                <div class="passenger-profile-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="tickets-grid" id="collected-tickets">
            <?php if ($tickets):
                foreach ($tickets as $ticket): 
                    if ($ticket->status == 'collected'):?>
                    <div class="passenger-profile-card ticket-grid" data-id=<?= $ticket->id?>>
                        <h1>Ticket ID</h1>
                        <p><?= $ticket->id ?></p>
                        <h1>Trip ID</h1>
                        <p><?= $ticket->trip_id ?></p>
                        <h1>Bus</h1>
                        <p>bus</p>
                        <h1>Seat</h1>
                        <p>xxx</p>
                        <h1>Price</h1>
                        <p>xxx</p>
                        <h1>Date</h1>
                        <p>xxx</p>
                        <h1>Time</h1>
                        <p>xxx</p>
                        <p></p>
                        <p><?= $ticket->status ?></p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <a class="ticket-view-more ticket-button-orange">View more</a>
                    </div>
                <?php endif; endforeach; else: ?>
                <div class="passenger-profile-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="tickets-grid" id="expired-tickets">
            <?php if ($tickets):
                foreach ($tickets as $ticket): 
                    if ($ticket->status == 'expired'):?>
                    <div class="passenger-profile-card ticket-grid" data-id=<?= $ticket->id?>>
                        <h1>Ticket ID</h1>
                        <p><?= $ticket->id ?></p>
                        <h1>Trip ID</h1>
                        <p><?= $ticket->trip_id ?></p>
                        <h1>Bus</h1>
                        <p>bus</p>
                        <h1>Seat</h1>
                        <p>xxx</p>
                        <h1>Price</h1>
                        <p>xxx</p>
                        <h1>Date</h1>
                        <p>xxx</p>
                        <h1>Time</h1>
                        <p>xxx</p>
                        <p></p>
                        <p><?= $ticket->status ?></p>
                    </div>
                <?php endif; endforeach; else: ?>
                <div class="passenger-profile-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <!-- inactive tickets div -->
        <div class="tickets-grid" id="inactive-tickets">
            <?php if ($tickets):
                foreach ($tickets as $ticket): 
                    if ($ticket->status == 'inactive'):?>
                    <div class="passenger-profile-card ticket-grid" data-id=<?= $ticket->id?>>
                        <h1>Ticket ID</h1>
                        <p><?= $ticket->id ?></p>
                        <h1>Trip ID</h1>
                        <p><?= $ticket->trip_id ?></p>
                        <h1>Bus</h1>
                        <p>bus</p>
                        <h1>Seat</h1>
                        <p>xxx</p>
                        <h1>Price</h1>
                        <p>xxx</p>
                        <h1>Date</h1>
                        <p>xxx</p>
                        <h1>Time</h1>
                        <p>xxx</p>
                        <p></p>
                        <p><?= $ticket->status ?></p>
                    </div>
                <?php endif; endforeach; else: ?>
                <div class="passenger-profile-card">
                    <h1>No tickets found</h1>
                </div>
            <?php endif; ?>
        </div>

        <div id="collected-ticket-details" class="ticket-details-card" style="display:none">
        <span class="close">
            <img src="<?= ROOT ?>/assets/images/icons/cancel.png" alt="close" width="20px">
        </span>
        <table>
            <tr>
                <th>From: </th>
                <td><?= $ticket->source_halt ?></td>
                <th>Ticket ID: </th>
                <td><?= $ticket->id ?></td>
            </tr>
            <tr>
                <th>To: </th>
                <td><?= $ticket->dest_halt ?></td>
                <th>Trip ID: </th>
                <td><?= $ticket->trip_id ?></td>
            </tr>
            <tr>
                <th>Bus No.: </th>
                <td>NC1111</td>
                <th>Date: </th>
                <td>xxx</td>
            </tr>
            <tr>
                <th>Seat(s): </th>
                <td>A2, A3</td>
                <th>Time: </th>
                <td><?= $ticket->booking_time ?></td>
            </tr>
            <tr>
                <th>Price: </th>
                <td>150 LKR</td>
                <th>Collected at: </th>
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
                <button id="btn-got-off-yes" class="ticket-button-orange">Yes</button>
                <button id="btn-got-off-cancel" class="ticket-button-orange">Cancel</button>
            </div>
        </div>
    </div>

    <!-- pop up div to update location -->
    <div id="update-location-div" class="ticket-details-card" style="display:none">
        <br>
        <?php
            $halt = new Halt();
            $halts = $halt->getHalts();
            // find indexes of ticket source and destination
            $src = array_search($ticket->source_halt, array_column($halts, 'name'));
            $dest = array_search($ticket->dest_halt, array_column($halts, 'name'));            
            // get sub array of halts between source and destination
            if ($src > $dest) $halts = array_reverse($halts);
            $halts = array_slice($halts, $src, $dest-$src+1);
            ?>
            <!-- var ----number-of-options -->
            
            

    <div id="form-wrapper" style="--number-of-options: <?= abs($src-$dest)+1?>;">
        <form action="/p/quote.php" method="POST">
            <div id="debt-amount-slider">
                <?php
                // print halts
                foreach ($halts as $halt) {?> 
                <input type="radio" name="debt-amount" id="<?= $halt->name ?>" value="<?= $halt->name ?>" required>
                <label for="<?= $halt->name ?>" data-debt-amount="<?= $halt->name ?>"></label>
                <?php } ?>
                
                <div id="debt-amount-pos"></div>
            </div>
        </form>
    </div>
    <br><br><br>
    <button id="btn-update-location-confirm" class="ticket-button-orange">Confirm</button>
    <button id="btn-update-location-cancel" class="ticket-button-orange">Cancel</button>
</div>

</body>

</html>