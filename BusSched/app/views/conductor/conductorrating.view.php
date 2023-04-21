<?php

// if (isset($_SESSION['USER'])) {
//     if ($_SESSION['USER']->role == 'driver') {
//         redirect('drivers');
//     } else if ($_SESSION['USER']->role == 'conductor') {
//         redirect('conductors');
//     } else if ($_SESSION['USER']->role == 'scheduler') {
//         redirect('schedulers');
//     } else if ($_SESSION['USER']->role == 'owner') {
//         redirect('owners');
//     } else if ($_SESSION['USER']->role == 'admin') {
//         redirect('admins');
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_rating.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Ratings</title>
    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php
include '../app/views/components/navbarcon.php';
?>
<main class="container1">
    <div class="col-1">
        <div class="header orange-header">
            <div>
                <h3>Ratings</h3>
            </div>
        </div>
        </div>

        <div class="data-table">
        <div class="col-3">

            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>Bus ID.</th>
                    <th>Trip ID.</th>
                    <th>Conductor Ratings</th>
                </tr>
                
                <?php
                foreach ($ratings as $rating) {
                    echo "<tr>";
                    echo "<td> $rating->bus_id </td>";
                    echo "<td> $rating->trip_id </td>";
                    echo "<td> $rating->conductor_rating </td>";
                    // echo "<td> $breakdown->date </td>";
                    // echo "<td> $breakdown->time </td>";
                    // echo "<td> $breakdown->time_to_repair </td>";
                    echo "</tr>";
                } ?>



            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>


</body>

</html>
