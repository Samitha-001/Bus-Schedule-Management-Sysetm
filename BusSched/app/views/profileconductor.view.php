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
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_profile.css"> -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/passengerprofile.js"></script>
    <title>Profile</title>
    <style>
/*  
      form.info-grid {
        display: none;
      } */
    </style>
</head>

<body>
<?php
include '../app/views/components/navbarcon.php';
?>

<?php
        $conductor= $_SESSION['USER']->username;
        //show($conductor_id);
        // print id
        // show($busno);
        $buses = new Bus();
        $bus = $buses->getConductorBuses($conductor)[0];
        //show($ratingsinfo);
        $conductors = new Conductor();
        $conductorinfo = $conductors->getConductorInfo($conductor)[0];
        //show($conductorinfo);
         ?>

<?php
        //show($conductor_id);
        // print id
        // show($busno);
        
?>
<div class="header orange-header">
        <div class="col-1">
            

        <div class="card-container" id="greeting-card">
            <h2>
                <?php
                echo "Welcome " . $_SESSION['USER']->username . "!";
                ?>
            </h2>
        </div>
</div>
</div>
<div class="col-2">
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
                        <th>Email: </th>
                        <td>
                            <?= $_SESSION['USER']->email ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <?php
                            echo "<td> $conductorinfo->name </td>";
                        ?>
                   
                    <tr>
                        <th>Phone: </th>
                        <?php
                            echo "<td> $conductorinfo->phone </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <?php
                            echo "<td> $conductorinfo->address </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Licence Number: </th>
                        <?php
                            echo "<td> $conductorinfo->licence_no </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>DOB: </th>
                        <?php
                            echo "<td> $conductorinfo->date_of_birth </td>";
                        ?>
                    </tr>
                    <tr>     
                    <th><button href=# id='edit-passenger-info'>Edit</button></th>
                    </tr>
                </table>
                <!-- <div class="col-3"> -->
            <!-- edit form for passenger info -->
            <form style="padding-left:5px;" class='edit-info-form info-grid'>
                <h1>Name:</h1>
                <input type="text" name="name" id="name" value="<?= $conductorinfo->name ?>">
                <h1>Phone:</h1>
                <input type="text" name="phone" id="phone" value="<?= $conductorinfo->phone ?>">
                <h1>Address:</h1>
                <input type="text" name="address" id="address" value="<?= $conductorinfo->address ?>">
                <h1>DOB:</h1>
                <input type="date" name="dob" id="dob" value="<?= $conductorinfo->date_of_birth ?>">
                
                <!-- TODO -->
                <div class="info-grid-start-2">
                    <button id='save-passenger-info'>Save</button>
                    <button id='cancel-passenger-info'>Cancel</button>
                </div>
            </form>
        </div>
            </div>
      
        </div>

        <div class="col-4">
        <div class="card-container" id="info-card2">
            <ul>
                <p style="font-size: 32px;">Bus Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Bus No: </th>
                        <?php
                            echo "<td> $bus->bus_no </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Type: </th>
                        <?php
                            echo "<td> $bus->type </td>";
                        ?>
                    <tr>
                        <th>No. of seats: </th>
                        <?php
                            echo "<td> $bus->seats_no </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Route: </th>
                        <?php
                            echo "<td> $bus->route </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Start: </th>
                        <?php
                            echo "<td> $bus->start </td>";
                        ?>
                    </tr>

                    <tr>
                        <th>Destination: </th>
                        <?php
                            echo "<td> $bus->dest </td>";
                        ?>
                    </tr>

                    <tr>
                        <th>Owner: </th>
                        <?php
                            echo "<td> $bus->owner </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Conductor: </th>
                        <?php
                            echo "<td> $bus->conductor </td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Driver: </th>
                        <?php
                            echo "<td> $bus->driver </td>";
                        ?>
                    </tr>
                </table>
            </ul>
        </div>
        </div>


</body>

</html>