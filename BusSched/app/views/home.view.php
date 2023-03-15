<?php

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
    <!-- add js script -->
    <script src="<?= ROOT ?>/assets/js/landing.js"></script>
    <title>Home Page</title>
</head>

<body>
<?php include 'components/navbar.php'; ?>
    <div class="landing-main row">
        <div class="col-6 menu landing-top">
            <h1 style="padding: 0px;">Find a bus for your next trip</h1>
            <p id="landing-header-desc">Easily compare and book your next trip with us.</p>
        </div>
        <div class="col-6 menu from-to">
            <div class="white-box">
                <div class="landing-header-li">
                    <label for="from">FROM</label>
                    <input type="text" name="from" id="from" placeholder="Choose city" list="halt-list">
                    <datalist id="halt-list">
                        <?php
                        $len = count($halts);
                        for ($i = 0; $i < $len; $i++) {
                            $halt = $halts[$i];
                            echo "<option value='" . $halt->name . "'>";
                        }
                        ?>
                    </datalist>
                </div>
            </div>
            <div class="white-box">
                <div class="landing-header-li">
                    <label for="to">TO</label>
                    <input type="text" name="to" id="to" placeholder="Choose city" list="halt-list">
                </div>
            </div>
            <div class="white-box">
                <div class="landing-header-li">
                    <label for="date">DATE</label>
                    <!-- date input today or tomorrow -->
                    <input type="date" name="date" id="date" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                </div>
            </div>
            <div class="white-box">
                <div class="landing-header-li">
                    <label for="passengers">PASSENGERS</label>
                    <input type="number" name="passengers" id="passengers" placeholder="No. of passengers" min=0 max=5>
                </div>
            </div>
            <div class="find-button-div">
                <button id="find-bus" class="find-button-orange" style="margin:0px;">Find</button>
            </div>
        </div>
    </div>
    <div class="row">
        <h1 style="font-size: 30px; margin-top:40px; color:#24315e; text-align:center;">Bus fares</h1>
        <section id="busfare">
            <div style="width:100%">
                <table id="busfare-table">
                    <?php
                    $len = count($halts);
                    echo "<tr><td class='halt-name-top'></td>";
                    for ($i = 0; $i < $len; $i++) {
                        $halt = $halts[$i];

                        // First column for the halt name
                        echo "<td class='halt-name-top'>" . $halt->name . "</td>";
                    }
                    echo "</tr><tr>";

                    for ($i = 0; $i < $len; $i++) {
                        $halt = $halts[$i];
                        echo "<tr><td class='halt-name'>" . $halt->name . "</td>";
                        for ($j = 0; $j < $len; $j++) {
                            if ($i == $j) {
                                // Current halt and target halt are the same, don't need to display fare
                                echo "<td class='halt-name'></td>";
                            } else {
                                $targetHalt = $halts[$j];
                                $fare = $halt->fare_from_source - $targetHalt->fare_from_source;
                                $fare = $fare < 0 ? -$fare : $fare;
                                echo "<td>" . $fare . "</td>";

                            }
                        }
                        echo "</tr><tr>";
                    }
                    ?>

                </table>
            </div>
        </section>
        
        <section id="about">
            <h1>About Us</h1>
            <p>Welcome to our bus schedule management system website. We are dedicated to providing you with the most
                accurate and up-to-date bus schedules and routes. Our easy-to-use platform allows you to quickly and
                easily plan your trip, track your bus in real-time, and receive notifications of any schedule changes or
                delays. Thank you for choosing our system for your transportation needs.</p>
            </section>
            <section id="services">
                <h3>Our Services</h3>
                <h1>What we can do for you</h1>
            </section>
    
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <h2>Bus Schedules</h2>
                    </div>
                    <div class="back">
                        <p>BusSched allows users to view and generate bus schedules, taking into account bus availability and any breakdowns. This helps to ensure that schedules are accurate and up-to-date, providing users with reliable information for their bus trips.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <h2>Tickets</h2>
                    </div>
                    <div class="back">
                        <p>Makes it easy for users to purchase tickets for A/C buses. Passengers can choose from a variety times, reserve seats and find the perfect trip. BusSched provides a convenient solution for A/C bus travel.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <h2>Bus Fare</h2>
                    </div>
                    <div class="back">
                        <p>BusSched provides users with access to the latest and most up-to-date bus fare information</p>
                    </div>
                </div>
            </div>

        <section id="contact">
            <h1>Contact Us</h1>
            <p style="text-align: center;">
            Phone number: +94 (11) 111 1111 &emsp; | &emsp; Email address: support@bussched.com <br>
            <ul style="text-align: center;">
                Social media links:&emsp;
                <a href="https://www.facebook.com" style="color:#f4511e">Facebook</a>&emsp;
                <a href="https://www.twitter.com" style="color:#f4511e">Twitter</a>&emsp;
                <a href="https://www.instagram.com" style="color:#f4511e">Instagram</a>
            </ul>
            </p>
        </section>
    </div>
</body>

</html>