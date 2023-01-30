<?php
    include 'components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>

    <link href="<?= ROOT ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <section>
        <!-- grid with 2 columns 4 rows, first row two cells merged -->
        <div class="update-location-grid">
            <div class="grid-item span-col-4">
                <h1 style="text-align:left;">Update Location</h1>
            </div>
            <div class="grid-item span-col-2"></div>
            <div class="grid-item">
                <p>Enter Ticket No.</p>
            </div>
            <div class="grid-item">
                <p>Tk 1234</p>       
            </div>
            <div class="grid-item span-col-2"></div>
            <div class="grid-item">                 
                <p>From</p>
            </div>
            <div class="grid-item">
                <p>Kohuwala</p>                
            </div>
            <div class="grid-item">
                <p>Last Updated</p>
            </div>
            <div class="grid-item">
                <p style="color: #fd6002;">Dutugemunu St.</p>                
            </div>
            <div class="grid-item">
                <p>To</p>
            </div>
            <div class="grid-item">
                <p>Thummulla</p>                
            </div>
        
    </section>
    
    <div class="container">
    <div class="arrow left">&lt;</div>
    <div class="cards-wrapper">
        <div class="card">1</div>
        <div class="card">2</div>
        <div class="card">3</div>
        <div class="card">4</div>
        <div class="card">5</div>
        <div class="card">6</div>
        <div class="card">7</div>
        <div class="card">8</div>
        <div class="card">9</div>
        <div class="card">10</div>
    </div>
    <div class="arrow right">&gt;</div>
    </div>

    <script src="<?= ROOT ?>/assets/js/script.js"></script>

</body>
</html>