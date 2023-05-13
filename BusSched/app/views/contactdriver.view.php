<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>

    <title>Contacts</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php include 'components/navbarcon.php'; ?>
    <main class="container1">
        <div class="header orange-header">
            <h2>Contacts - Drivers</h2>
        </div>
        <!-- <div class="col-1"> -->
            <table style="background:#24315e; margin-top:0px">
                <tr>
                    <th style="padding-left:30px; background:#24315e;"><a href="<?= ROOT ?>/contactdrivers" ><h3 style="color:#24315e; background:white;">Drivers</h3></a></th>
                    <th style="padding-left:60px; background:#24315e;"><a href="<?= ROOT ?>/contactconductors"><h3>Conductors</h3></a></th>
                </tr>
            </table> 
        <!-- </div> -->

        <div class="data-table">
        <div class="selection">
            
        </div>
        <div class="col-2">
        <table border='1' class="styled-table">
                
        
                <?php
                
                $testuser = new User();
                $driverContacts = $testuser->getContactDetails('driver');
                // show($driverContacts);
                // $i = 0;
                foreach ($driverContacts as $driverContact) {
                    echo "<tr>";
                    echo "<th>Assigned Bus</th>";
                    echo "<td> $driverContact[assigned_bus] </td>";
                    echo "<tr>";

                    echo "<tr>";
                    echo "<th></th>";
                    echo "<th>Name</th>";
                    echo "<td>$driverContact[name]</td>";
                    echo "</tr>";
                    

                    echo "<tr>";
                    echo "<th></th>";
                    echo "<td>Email</td>";
                    echo "<td> $driverContact[email]</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th></th>";
                    echo "<td>Address</td>";
                    echo "<td>$driverContact[address]</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th></th>";
                    echo "<td>Contact No</td>";
                    echo "<td> $driverContact[phone] </td>";
                    echo "</tr>";

                                 






                   
                } ?>

            </table>
        </div>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>