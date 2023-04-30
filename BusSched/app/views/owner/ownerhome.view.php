<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_SESSION['USER']->role)
if ($_SESSION['USER']->role == 'passenger') {
    redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
    redirect('drivers');
} else if ($_SESSION['USER']->role == 'admin') {
    redirect('admins');
} else if ($_SESSION['USER']->role == 'scheduler') {
    redirect('schedulers');
} else if ($_SESSION['USER']->role == 'conductor') {
    redirect('conductors');
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
    <title>Bus Owner - Home</title>
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';

?>

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

        <div class="card-container span-col-2">

        </div>

        <div class="card-container" id="schedules-card">
            <a href="<?= ROOT ?>/ownerschedule">
                <div class="overlay">
                    <div class="items"></div>
                    <div class="items head">
                        <p>Schedules</p>
                        <hr>
                    </div>
                    <div class="items users">
                        <!-- <p>Bus details</p> -->
                    </div>
                </div>
            </a>
        </div>

        <div class="card-container" id="buses-card">
        <a href="<?= ROOT ?>/ownerbuses">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Buses</p>
                    <hr>
                </div>
                <div class="items users">
                    <!-- <p>User ratings</p> -->
                </div>
            </div>
            </a>   
        </div>

        <div class="card-container" id="income-card">
        <a href="<?= ROOT ?>/ownerincome">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Income</p>
                    <hr>
                </div>
                <div class="items users">
                    <!-- <p>Bus details</p> -->
                </div>
            </div>
            </a>
        </div>

        <div class="card-container" id="ratings-card">
            <a href="#">
                <div class="overlay">
                    <div class="items"></div>
                    <div class="items head">
                        <p>Ratings</p>
                        <hr>
                    </div>
                    <div class="items users">
                        <!-- <p>Bus details</p> -->
                    </div>
                </div>
            </a>
        </div>

        <div class="card-container" id="breakdowns-card">
        <a href="<?= ROOT ?>/ownerbreakdowns">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Breakdowns</p>
                    <hr>
                </div>
                <div class="items users">
                    <!-- <p>User ratings</p> -->
                </div>
            </div>
        </a>
        </div>

        <div class="card-container" id="fare-card">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Bus fare</p>
                    <hr>
                </div>
                <div class="items users">
                    <!-- <p>Contact details of drivers, conductors</p> -->
                </div>
            </div>
        </div>

        <div class="card-container" id="contacts-card">
        <a href="<?= ROOT ?>/ownercontactowners">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>Contacts</p>
                    <hr>
                </div>
                <div class="items users">
                    <!-- <p><a href="#">Tickets sold</a><br></p> -->
                </div>
            </div>
        </a>
        </div>
    </main>


</body>

</html>