<?php
    if(!isset($_SESSION['USER'])){
        redirect('home');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style2.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin - Home</title>
</head>
<body>
    
    <nav class="navbar">
    <div><h2><a href="<?=ROOT?>/admins" id="logo-white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">    
    <li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
    </div>
    </ul>

    </nav>

    
    <main class="container">
        <div class="card-container" id="greeting-card"><h2>
        <?php
            echo "Welcome ".$_SESSION['USER']->username."!";
        ?>
        </h2></div>

        <div class="card-container" id="info-card">
            <ul>    
                <p style="font-size: 32px;">Personal Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Username: </th>
                        <td><?=$_SESSION['USER']->username?></td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td><?= $data[0]->name?></td>
                    <tr>
                        <th>Email: </th>
                        <td><?=$_SESSION['USER']->email?></td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><?= $data[0]->phone?></td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td><?= $data[0]->address?></td>
                    </tr>
                </table>
            </ul>
        </div>

        <div class="card-container" id="users-card">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Users</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p>Passengers, Drivers,</p>
                    <p>Conductors, Schedulers,</p>
                    <p>Bus Owners</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="schedules-card">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Schedules</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p>Bus Schedules</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="buses-card">
            <a href="<?=ROOT?>/buses">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Buses</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p>View bus details</p>
                </div>
            </div>
            </a>
        </div>

        <div class="card-container" id="ratings-card">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Ratings</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p>View ratings</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="tickets-card">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Tickets</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p>Bus tickets</p>
                    <p>Bus fare</p>
                </div>
            </div>
        </div>

        <div class="card-container" id="halts-card">
            <div class="overlay">
                <div class = "items"></div>
                    <div class = "items head">
                        <p>Routes & Halts</p>
                        <hr>
                    </div>
                <div class = "items users">
                    <p><a href="#">Bus routes</a><br></p>
                    <p><a href="<?=ROOT?>/halts">Bus halts</a><br></p>
                </div>
            </div>
        </div>
    </main>


</body>
</html>
