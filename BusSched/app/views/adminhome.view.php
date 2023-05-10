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
    <?php include 'components/head.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
    <script src="<?= ROOT ?>/assets/js/adminhome.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
<?php
include 'components/navbar.php';
include 'components/adminsidebar.php';
?>

<div class="section-header"><p>Admin Dashboard</p></div>

<!-- bar chart from chart.js with dummy data -->
<section class="charts">
    <div class="item">
        <canvas id="usersPieChart"></canvas>
    </div>
    <div class="item">
		<canvas id="scheduleChart"></canvas>
	</div>
    <div class="item">
		<canvas id="ticketSalesChart"></canvas>
	</div>
</section>


</body>

</html>