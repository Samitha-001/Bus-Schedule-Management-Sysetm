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

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style2.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin - Home</title>
</head>

<body>

    <nav class="navbar">
        <div>
            <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png"></a>
        </div>

        <ul class="nav-links">
            <div class="menu">
                <a href="<?= ROOT ?>/admins">
                    <li><img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" class="nav-bar-img"></li>
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
            <li><a href="#" style="color:#9298AF;">Users</a></li>
            <li><a href="#" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/buses" style="color:#9298AF;">Buses</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="#" style="color:#9298AF;">Ratings</a></li>
            <li><a href="#" style="color:#9298AF;">Tickets</a></li>
            <li><a href="<?= ROOT ?>/fares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="#" style="color:#9298AF;">Routes</a></li>
            <li><a href="<?= ROOT ?>/halts" style="color:#9298AF;">Halts</a></li>
        </div>
    </div>

    <main class="container">

        <div class="card-container" id="greeting-card">

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
                <div class="overlay">
                    <div class="items"></div>
                    <div class="items head">
                        <p>Buses & Breakdowns</p>
                        <hr>
                    </div>
                    <div class="items users">
                        <p><a href="<?= ROOT ?>/buses">Bus details</a><br></p>
                        <p><a href="<?= ROOT ?>/breakdowns">Breakdowns</a><br></p>
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