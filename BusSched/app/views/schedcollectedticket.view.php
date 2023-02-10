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

    <link href="<?= ROOT ?>/assets/css/schedsidebar.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    
</head>

<body>

    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    <main class="container">
    
        <div class="card-container" id="active-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ticket</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="#">Ticket1</a></p>
                </div>
            </div>
        </div>
        <div class="card-container" id="active-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ticket</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="#">Ticket2</a></p>
                </div>
            </div>
        </div>
        <div class="card-container" id="active-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ticket</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="#">Ticket3</a></p>
                </div>
            </div>
        </div>
        <div class="card-container" id="active-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ticket</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="#">Ticket4</a></p>
                </div>
            </div>
        </div>
        
    </main>

</body>

</html>