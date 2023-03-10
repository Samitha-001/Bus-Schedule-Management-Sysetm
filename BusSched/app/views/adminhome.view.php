<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('drivers');
} else if ($_SESSION['USER']->role == 'conductor') {
    redirect('conductors');
} else if ($_SESSION['USER']->role == 'scheduler') {
    redirect('schedulers');
} else if ($_SESSION['USER']->role == 'owner') {
    redirect('owners');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin Dashboard</title>
</head>

<body>
<?php
include 'components/navbar.php';
include 'components/adminsidebar.php';
?>

<h1 class="section-header">Admin Dashboard</h1>

<!-- bar chart from chart.js with dummy data -->
<section>
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
    <div>
        <h3 class="card-title">Menu Sales</h3>
        <canvas id="myPieChart" width="1600" height="900"></canvas>
    </div>
</section>


</body>

<script>
    function drawPieChart() {
    var ctx = document.getElementById("myPieChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Buses","Conductors","Owners", "Drivers", "Passengers"],
            datasets: [{
                borderColor: "rgba(0,0,0,0.1)",
                backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745", "#17a2b8"],
                label: 'My First Dataset',
                data: [200, 50, 100, 40, 120],
                hoverOffset: 4
            }]
        },
        options: {
            layout: {
                padding: {
                    top: 10,
                }
            },
            legend: {
                'position': 'right'
            }
        }
    });

}
drawPieChart();
</script>
</html>