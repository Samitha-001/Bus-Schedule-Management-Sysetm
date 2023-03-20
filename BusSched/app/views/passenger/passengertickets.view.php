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
    <title>Profile</title>
</head>

<body>
<?php
    include '../app/views/components/navbar.php';
?>

    <div class="row main-content">
        <div id="profile-header">
            <div class="wrapper">
            <a id="show-all-tickets" href="#"><span class="selected">All tickets</span></a>
            <a id="show-all-tickets" href="#"><span>Collected</span></a>
            <a id="show-all-tickets" href="#"><span>Expired</span></a>
            </div>
        </div>
        
        <div class="all-tickets-grid">
            <?php if ($tickets):
                foreach ($tickets as $ticket): ?>
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
    </div>
</body>

</html>