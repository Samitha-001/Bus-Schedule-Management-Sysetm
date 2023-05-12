<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>

    <title>Schedule</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php include 'components/navbarcon.php'; ?>

    <div class="header orange-header">
        <h2>Schedules</h2>
    </div>

    <main class="container1">

        <div>
            <br>
            <div class="col-2">
            <table border='1' class="styled-table">
                <tr>
                    <th>Trip ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Time</th>
                    <th>Bus No</th>
                </tr>

                <?php
                if(!empty($conductorschedules)):
                foreach ($conductorschedules as $schedule) {
                    echo "<tr>";
                    echo "<td> $schedule->id </td>";
                    echo "<td> $schedule->from </td>";
                    echo "<td> $schedule->to </td>";
                    echo "<td> $schedule->time </td>";
                    echo "<td> $schedule->bus_no</td>";
                    echo "</tr>";
                    }
                else:
                    echo "<tr><td colspan='5'>No schedules found</td></tr>";
                endif; ?>

            </table>
        </div>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
    </main>

</body>

</html>