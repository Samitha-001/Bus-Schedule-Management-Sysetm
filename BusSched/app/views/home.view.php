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
    <title>Home Page</title>
</head>

<body>
    <div class="landing-main row">
        <div class="col-6 menu">

            <ul>
                <li>
                    <h1 style="padding: 0px; padding-top: 50px;">Find a bus</h1>
                </li>
                <li>
                    <label for="from" style="font-size: medium;">From</label>
                    <input type="text" name="from" id="from" placeholder="Choose city">
                </li>
                <li>
                    <label for="to" style="font-size: medium;">To</label>
                    <input type="text" name="to" id="to" placeholder="Choose city">
                </li>
                <br>
                <li>
                    <button id="btn" class="button-orange">Find</button>
                </li>
            </ul>

        </div>
    </div>
    <div class="row">
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
                    <p>Back 1</p>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                    <h2>Tickets</h2>
                    </div>
                    <div class="back">
                    <p>Back 2</p>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                    <h2>Bus Fare</h2>
                    </div>
                    <div class="back">
                    <p>Back 3</p>
                    </div>
                </div>
                </div>
    

        <section id="busfare">
            <div style="margin: auto;">
                <h1 style="font-size: 30px; margin:20px; color:#24315e;">Bus fares</h1>
            </div>
            <div class="col-10 col-s-10" style="margin: auto;">
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
            <!-- <h3>About Us</h3> -->
            <h1>About Us</h1>
            <p>Welcome to our bus schedule management system website. We are dedicated to providing you with the most
                accurate and up-to-date bus schedules and routes. Our easy-to-use platform allows you to quickly and
                easily plan your trip, track your bus in real-time, and receive notifications of any schedule changes or
                delays. Thank you for choosing our system for your transportation needs.</p>
        </section>

        <section id="contact">
            <h3>Contact Us</h3>
            <h1>What we can do for you</h1>
        </section>
    </div>

    <script>
        document.getElementById("btn").onclick = function () {
            location.href = "<?= ROOT ?>/passengerschedule";
        };
    </script>
</body>

</html>