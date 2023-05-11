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
    <?php include '../app/views/components/head.php';?>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_rating.css">
    <title>Ratings</title>
    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php
include '../app/views/components/navbarcon.php';
?>

<?php
        $conductor= $_SESSION['USER']->username;
        //show($conductor_id);
        // print id
        // show($busno);
        $ratings = new Rating();
        $ratingsinfo = $ratings->getConductorRatings($conductor)[0];
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
                    <th>Bus No.</th>
                    <th>Trip ID.</th>
                    <th>Conductor Ratings</th>
                </tr>
                
                <?php
                
                    echo "<tr>";
                    echo "<td> $ratingsinfo->bus_no </td>";
                    echo "<td> $ratingsinfo->trip_id </td>";
                    $stars_html = '';
                    for ($i = 1; $i <= $ratingsinfo->conductor_rating; $i++) {
                        $stars_html .= '<span class="star">&#9733;</span>'; // Use HTML code for star symbol
                    }
                    echo "<td> $stars_html </td>";
                    
                    echo "</tr>";
             ?>



            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>


</body>

</html>