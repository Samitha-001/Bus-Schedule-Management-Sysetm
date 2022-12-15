<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('driverhome');
} else if ($_SESSION['USER']->role == 'conductor') {
    redirect('conductors');
} else if ($_SESSION['USER']->role == 'scheduler') {
    redirect('schedulerhome');
} else if ($_SESSION['USER']->role == 'owner') {
    redirect('ownerhome');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin - Home</title>
</head>

<body>

    <nav class="navbar">
        <div>
            <h2><a href="<?= ROOT ?>/admins" id="logo-white">BusSched</a></h2>
        </div>

        <ul class="nav-links">
            <div class="menu">
                <a href="<?= ROOT ?>/admins">
                    <li><img src="<?= ROOT ?>/assets/images/profile-icon.png" class="nav-bar-img"></li>
                </a>
                <a href="<?= ROOT ?>/logout">
                    <li class="button-orange">Logout</li>
                </a>
            </div>
        </ul>

    </nav>

    <div class="wrapper">
        <div class="sidebar">
            <li><a href="<?= ROOT ?>/admins" style="color:white;"><b>Dashboard</b></a></li>
            <li><a href="#" style="color:#f4511e;">Users</a></li>
            <li><a href="#" style="color:#f4511e;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/buses" style="color:#f4511e;">Buses</a></li>
            <li><a href="#" style="color:#f4511e;">Ratings</a></li>
            <li><a href="#" style="color:#f4511e;">Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#f4511e;">Bus Fares</a></li>
            <li><a href="#" style="color:#f4511e;">Routes</a></li>
            <li><a href="<?= ROOT ?>/halts" style="color:#f4511e;">Halts</a></li>
        </div>
    </div>

    <main class="container">

        <div class="card-container" id="greeting-card">
            <h2>
                <?php
                echo "Welcome " . $_SESSION['USER']->username . "!";
                ?>
            </h2>
        </div>

        <div class="card-container" id="info-card">
            <ul>
                <p style="font-size: 32px;">Personal Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Username: </th>
                        <td>
                            <?= $_SESSION['USER']->username ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td>
                            <?= $data[0]->name ?>
                        </td>
                    <tr>
                        <th>Email: </th>
                        <td>
                            <?= $_SESSION['USER']->email ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>
                            <?= $data[0]->phone ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td>
                            <?= $data[0]->address ?>
                        </td>
                    </tr>
                </table>
            </ul>
        </div>

        <div class="card-container" id="users-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Users</p>
                    <hr>
                </div>
                <div class="items users">
                    <p>All user profiles</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="schedules-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Schedules</p>
                    <hr>
                </div>
                <div class="items users">
                    <p>Bus Schedules</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="buses-card">
            <a href="<?= ROOT ?>/buses">
                <div class="overlay">
                    <div class="items"></div>
                    <div class="items head">
                        <p>Buses</p>
                        <hr>
                    </div>
                    <div class="items users">
                        <p>Bus details</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-container" id="ratings-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Ratings</p>
                    <hr>
                </div>
                <div class="items users">
                    <p>User ratings</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="tickets-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Tickets</p>
                    <hr>
                </div>
                <div class="items users">
                    <p>Bus tickets</p>
                    <p><a href="<?= ROOT ?>/fares">Bus fare</a></p>
                </div>
            </div>
        </div>

        <div class="card-container" id="halts-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Routes & Halts</p>
                    <hr>
                </div>
                <div class="items users">
                    <p><a href="#">Bus routes</a><br></p>
                    <p><a href="<?= ROOT ?>/halts">Bus halts</a><br></p>
                </div>
            </div>
        </div>
    </main>


</body>

</html>