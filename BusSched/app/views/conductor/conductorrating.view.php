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

<?php
        $conductor_id= $_SESSION['USER']->id;
        //show($conductor_id);
        // print id
        // show($busno);
        $ratings = new Rating();
        $ratingsinfo = $ratings->getConductorRatings($conductor_id)[0];
        //show($ratingsinfo);
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
                    <th>Bus ID.</th>
                    <th>Trip ID.</th>
                    <th>Conductor Ratings</th>
                </tr>
                
                <?php
                
                    echo "<tr>";
                    echo "<td> $ratingsinfo->bus_id </td>";
                    echo "<td> $ratingsinfo->trip_id </td>";
                    echo "<td> $ratingsinfo->conductor_rating </td>";
                    echo "</tr>";
             ?>



            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>


</body>

</html>
