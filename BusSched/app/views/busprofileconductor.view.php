<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Conductor - Home</title>
</head>

<body>

    <nav class="navbar">
        <div>
            <h2><a href="<?= ROOT ?>/conductors" id="logo-white">BusSched</a></h2>
        </div>

        <ul class="nav-links">
            <div class="menu">
                <a href="<?= ROOT ?>/conductors">
                    <li><img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" class="nav-bar-img"></li>
                </a>
                <a href="<?= ROOT ?>/logout">
                    <li class="button-orange" style="border: 2px solid #f4511e;">Logout</li>
                </a>
            </div>
        </ul>

    </nav>

    <div class="wrapper">
        <div class="sidebar">
        <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li>
            <!--<li><a href="" style="color:#9298AF;">Location</a></li>-->
            <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li>
            <!--<li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Ratings</a></li>-->
            <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
        </div>
    </div>

    <main class="container">

        <div class="card-container" id="greeting-card">
            <h2>
                <?php
                echo "NB1234";
                ?>
            </h2>
            
        </div>

        <div class="card-container" id="info-card">
            <ul>
                <p style="font-size: 32px;">Bus Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Bus No: </th>
                        <td>
                            NB1234
                        </td>
                    </tr>
                    <tr>
                        <th>Source: </th>
                        <td>
                        Horana
                        </td>
                    <tr>
                        <th>Destination: </th>
                        <td>
                            Pettah
                        </td>
                    </tr>
                    <tr>
                        <th>Owner: </th>
                        <td>
                        Mr.M.D.Karunarathne
                        </td>
                    </tr>
                    <tr>
                        <th>License No: </th>
                        <td>
                        736589150175
                        </td>
                    </tr>
                    <tr>
                        <th>Assigned Conductor: </th>
                        <td>
                        Mr.T.K.Saman
                        </td>
                    </tr>
                    <tr>
                        <th>Conductor Contact No: </th>
                        <td>
                        0777712345
                        </td>
                    </tr>
                    <tr>
                        <th>Assigned Driver: </th>
                        <td>
                        MR.A.S.Kamal
                        </td>
                    </tr>
                    <tr>

                        <th>Driver Contact No: </th>
                        <td>
                        0771234567
                        </td>
                    </tr>
                </table>
            </ul>
        </div>
        <div class="card-container span-col-2">
        <img src="<?= ROOT ?>/assets/images/backgrounds/busimage.jpg" alt="">
        </div>

        
    </main>


</body>

</html>