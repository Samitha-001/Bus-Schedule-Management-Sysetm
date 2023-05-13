<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>


    <title>Contacts</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

    <main class="container1">
        <div class="header orange-header">
            <div>
            <table class="header-links">
                <tr>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactowners" ><h3>Bus Owners</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactdrivers" ><h3>Drivers</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactconductors" ><h3>Conductors</h3></a></th>
                </tr>
                
            </table> 
            </div>
            
        </div>

            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Assigned Bus</th>
                </tr>

                <?php
                
                $testuser = new User();
                $driverContacts = $testuser->getContactDetails('driver');
                // show($driverContacts);
                // $i = 0;
                foreach ($driverContacts as $driverContact) {
                    echo "<tr>";
                    echo "<td>$driverContact[name]</td>";
                    echo "<td> $driverContact[email] </td>";
                    echo "<td>$driverContact[address]</td>";
                    echo "<td> $driverContact[phone] </td>";
                    echo "<td> $driverContact[assigned_bus] </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>
        <?php
        
        // $testuser = new User();
        // $testuser->getContactDetails('driver');
        ?>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>