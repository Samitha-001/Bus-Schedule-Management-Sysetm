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
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin Dashboard</title>
</head>

<body>
<?php
include 'components/navbar.php';
include 'components/adminsidebar.php';
?>

<h1 class="section-header">Admin Dashboard</h1>

</body>

</html>