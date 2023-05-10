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

    <style>

.date-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
  font-size: 24px;
  font-weight: bold;
  color: #333;
}

.date {
  margin-right: 20px;
}

.fa-arrow-right {
  font-size: 24px;
  color: #333;
}
        .schedule-cards {
    display: flex;
    justify-content: space-around;
    padding: 80px 20px 10px;
  }
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 24px;
    width: 40%;
  }
  .card h2 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 16px;
  }
  .table-container {
    overflow: auto;
  }
  .piliyandala {
    border: 2px solid #FF9800;
  }
  .pettah {
    border: 2px solid #2196F3;
  }
    </style>

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
            <div><button id="btn" class="button-grey">Generate</button></div>
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

       
        
        <div class="date-container">
  <div class="date">date</div>
  <i class="fa fa-arrow-right"></i>
</div>
        <div class="schedule-cards">
           
  <div class="card piliyandala">
    <h2>From Piliyandala</h2>
    <div class="table-container">
    <table border='1' class="styled-table">
                <tr>
                    <th>Starting Halt</th>
                    <th>Bus No</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <!-- <th>Action</th> -->
                </tr>
                <?php
                $schedulesObject = json_decode(json_encode($schedules), false);

                foreach ($schedulesObject as $schedule) {
                    if($schedule->starting_place === "Piliyandala"){
                    echo "<tr>";
                    echo "<td> $schedule->starting_place</td>";
                    echo "<td> $schedule->bus_no</td>";
                    echo "<td> $schedule->departure_time</td>";
                    echo "<td> $schedule->arrival_time</td>";
                    echo "</tr>";
                }
            }
                // echo "<pre>";
               
                // print_r($schedulesObject);
                // echo "</pre>";
                 ?>

            </table>
    </div>
  </div>
  <div class="card pettah">
    <h2>From Pettah</h2>
    <div class="table-container">
    <table border='1' class="styled-table">
                <tr>
                    <th>Starting Halt</th>
                    <th>Bus No</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <!-- <th>Action</th> -->
                </tr>
                <?php
                $schedulesObject = json_decode(json_encode($schedules), false);

                foreach ($schedulesObject as $schedule) {
                    if($schedule->starting_place === "Pettah"){
                    echo "<tr>";
                    echo "<td> $schedule->starting_place</td>";
                    echo "<td> $schedule->bus_no</td>";
                    echo "<td> $schedule->departure_time</td>";
                    echo "<td> $schedule->arrival_time</td>";
                    echo "</tr>";
                }
            }
                // echo "<pre>";
               
                // print_r($schedulesObject);
                // echo "</pre>";
                 ?>

            </table>
    </div>
  </div>
</div>



        <!-- <script src="<?= ROOT ?>/assets/js/bus.js"></script> -->
        <script>

        var today = new Date();
        var date = today.toLocaleDateString();
        document.querySelector(".date").innerHTML = date;
        
        </script>
    </main>

</body>

</html>