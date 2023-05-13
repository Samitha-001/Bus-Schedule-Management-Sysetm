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
                </tr>

                 <?php
                    $testuser = new User();
                    $ownerContacts = $testuser->getContactDetails('owner');
                    // show($driverContacts);
                    // $i = 0;
                    foreach ($ownerContacts as $ownerContact) {
                        echo "<tr>";
                        echo "<td>$ownerContact[name]</td>";
                        echo "<td> $ownerContact[email] </td>";
                        echo "<td>$ownerContact[address]</td>";
                        echo "<td> $ownerContact[phone] </td>";
                        
                        echo "</tr>";
                } ?> 

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>