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
        <div class="col-3 col-s-3">
            <div class="passenger-profile-card" id="profile-header">
                <h1>Tickets</h1>
            </div>
        </div>
        
        <div class="col-3 col-s-3" style="padding-bottom: 0px;padding-top: 0px;padding-right: 10px;padding-left: 10px;">
            <?php if ($tickets):
                foreach ($tickets as $ticket): ?>
                    <div class="passenger-profile-card" data-id=<?= $ticket->id?>>
                    <table>    
                        <tr>
                            <td><h1>Ticket ID</h1></td>
                            <td>
                            <p><?= $ticket->id ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><h1>Trip ID</h1></td>
                            <td>
                                <p><?= $ticket->trip_id ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><h1>Bus</h1></td>
                            <td>
                                <p>Bus</p>                        
                            </td>
                        </tr>
                        <tr>
                            <td><h1>Seats reserved</h1></td>
                            <td>
                                <p>Seat</p>
                            </td>
                        </tr>
                        <tr>
                            <td><h1>Fare</h1></td>
                            <td>
                                <p>Price</p>
                            </td>
                        </tr>
                        <tr>
                            <td><h1>Date</h1></td>
                            <td><p>Date</p></td>
                            <td><h1>Time</h1></td>
                            <td><p>Time</p></td>
                        </tr>
                        </table></div>
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