<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Schedules</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">

</head>

<body>


    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    <main class="container1">

        <div class="header orange-header">
            <div>
                <h3>Schedule</h3>
            </div>
            <div><button id="btn" class="button-grey">Download</button></div>
        </div>

        <form method="post" id="view_fare" style="display:none">

            <?php if (!empty($errors)) : ?>
                <?= implode("<br>", $errors) ?>
            <?php endif; ?>

            <div>
                <table class="styled-table">
                    <tr>
                        <td><label for="source">From</label></td>
                        <td><input type="text" class="form-control" name="source" id="source" placeholder="Starting halt..."></td>
                    </tr>

                    <tr>
                        <td><label for="dest">To</label></td>
                        <td>
                            <input type="text" name="dest" class="form-control" id="dest" placeholder="Destination halt...">
                        </td>
                    </tr>

                    <tr>
                        <td><label for="route_bus">Route</label></td>
                        <td><input type="text" name="route_bus" class="form-control" id="route_bus" placeholder="Bus route..."></td>
                    </tr>

                    <tr>
                        <td><label for="type_bus">Type </label></td>
                        <td>
                            <select name="type_bus" id="type_bus" class="form-control">
                                <option disabled selected value>--select an option--</option>
                                <option value="L">Luxury</option>
                                <option value="S">Semi-Luxury</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="amount">Amount</label></td>
                        <td><input type="number" name="amount" class="form-control" id="amount" placeholder="Bus fare..."></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td align="right">
                            <button class="button-green" type="submit">Save</button>
                            <button class="button-cancel" onclick="cancel()">Cancel</button>
                        </td>
                    </tr>

                </table>
            </div>
        </form>

        <div>
            <br>
            <table border='1' class="styled-table">
                <tr>
                    
                    <th>Starting Halt</th>
                    <th>Bus No</th>
                    
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Type</th>
                    <!-- <th>Action</th> -->
                </tr>

                <?php
                $schedulesObject = json_decode(json_encode($schedules), false);

                foreach ($schedulesObject as $schedule) {
                    echo "<tr>";
                    //echo "<td> $schedule->id </td>";
                    echo "<td> $schedule->start_place</td>";
                    // echo "<td> $schedule->bus_route</td>";
                    echo "<td> $schedule->bus_no</td>";
                    // echo "<td> $schedule->type</td>";
                    echo "<td> $schedule->departure_time</td>";
                    echo "<td> $schedule->arrival_time</td>";
                    
                    echo "</tr>";
                    
                    
                }
                // echo "<pre>";
               
                // print_r($schedulesObject);
                // echo "</pre>";
                 ?>

            </table>
        </div>

        <!-- <script src="<?= ROOT ?>/assets/js/bus.js"></script> -->
    </main>

</body>

</html>