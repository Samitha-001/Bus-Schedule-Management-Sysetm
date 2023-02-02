<?php
include 'components/navbar.php';
if (isset($_SESSION['USER'])) {
    if ($_SESSION['USER']->role == 'driver') {
        redirect('drivers');
    } else if ($_SESSION['USER']->role == 'conductor') {
        redirect('conductors');
    } else if ($_SESSION['USER']->role == 'scheduler') {
        redirect('schedulers');
    } else if ($_SESSION['USER']->role == 'owner') {
        redirect('owners');
    } else if ($_SESSION['USER']->role == 'admin') {
        redirect('admins');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/landing.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Home page view</title>
</head>

<body>
    <div class="grid-container">
        <div class="grid-item grid-item-1">

            </h2>
            <h1 style="padding: 0px;">Find a Bus</h1><br>
            <label for="from">From</label>
            <input type="text" name="from" id="from" placeholder="Choose city"><br><br>
            <label for="to">To</label>
            <input type="text" name="to" id="to" placeholder="Choose city"><br><br><br>
            <button id="btn" class="button-orange" style="width: 140px;">Find</button>

        </div>
    </div>
    <div>
        <section id="services">
            <h3>Our Services</h3>
            <h1>What we can do for you</h1>
        </section>
        <section id="about">
            <h3>About Us</h3>
            <h1>What we can do for you</h1>
            <p>Welcome to our bus schedule management system website. We are dedicated to providing you with the most accurate and up-to-date bus schedules and routes. Our easy-to-use platform allows you to quickly and easily plan your trip, track your bus in real-time, and receive notifications of any schedule changes or delays. Thank you for choosing our system for your transportation needs.</p>
        </section>
        <section id="contact">
            <h3>Contact Us</h3>
            <h1>What we can do for you</h1>
        </section>

    </div>

    <script>
        document.getElementById("btn").onclick = function() {
            location.href = "<?= ROOT ?>/passengerschedule";
        };
    </script>

    <script src="<?= ROOT ?>/assets/js/script.js"></script>
</body>

</html>