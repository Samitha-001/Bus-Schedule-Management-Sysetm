<?php

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

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_rating.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>All Ratings</title>
</head>

<body>
<?php include 'components/navbar.php'; ?>

<div class="rating-container">
  <div class="rating-section">
    <h2>Driver Ratings</h2>
    <table>
            <tr>
                <th>Bus No</th>
                <td>NC 1234</td>
                <th>Ticket No</th>
                <td>Tk 1234</td>
                <th>Driver Name</th>
                <td>John Doe</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td colspan="5">
                    <div class="rating">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                    </div>
                    (5/5)
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
        
            <tr>
                <th>Bus No</th>
                <td>NC 1234</td>
                <th>Ticket No</th>
                <td>Tk 1234</td>
                <th>Driver Name</th>
                <td>John Doe</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td colspan="5">
                    <div class="rating">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                    </div>
                    (5/5)
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
        
    </table>
    
  </div>

  <div class="rating-section">
    <h2>Conductor Ratings</h2>
    <table>
        
            <tr>
                <th>Bus No</th>
                <td>NC 1234</td>
                <th>Ticket No</th>
                <td>Tk 1234</td>
                <th>Conductor Name</th>
                <td>John Doe</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td colspan="5">
                    <div class="rating">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                    </div>
                    (5/5)
                </td>
            </tr>
            
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
         
            <tr>
                <th>Bus No</th>
                <td>NC 1234</td>
                <th>Ticket No</th>
                <td>Tk 1234</td>
                <th>Conductor Name</th>
                <td>John Doe</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td colspan="5">
                    <div class="rating">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-empty.png">
                    </div>
                    (4/5)
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
    </table>
  </div>

  
  <div class="rating-section">
    <h2>Trip Ratings</h2>
    <table>
        
            <tr>
                <th>Bus No</th>
                <td>NC 1234</td>
                <th>Ticket No</th>
                <td>Tk 1234</td>
                <th>Driver Name</th>
                <td>John Doe</td>
                <th>Conductor Name</th>
                <td>John Doe</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td colspan="7">
                    <div class="rating">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                        <img src="<?= ROOT ?>/assets/images/icons/star-filled.png">
                    </div>
                    (5/5)
                </td>
            </tr>
            
            <tr>
                <td colspan="8">
                    <hr>
                </td>
            </tr>
    </table>
  </div>
</div>
</body>