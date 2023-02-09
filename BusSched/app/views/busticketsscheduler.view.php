<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/schedsidebar.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/schedsidebar.css" rel="stylesheet">
</head>

<body>

    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    <main class="container1">
    <div class="header orange-header-ticket">
            <div>
                <h3>Active</h3>
            </div>
            <div>
                <h3>Pending</h3>
            </div>
            <div>
                <h3>Collected</h3>
            </div>
            <div>
                <h3>Expired</h3>
            </div>
        </div>
    </main>

</body>

</html>