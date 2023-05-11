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
</head>

<body>

<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

    <main class="container1">
        <div class="header orange-header">
            <div>
            <table>
                <tr>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactowners" ><h3>Bus Owner</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactdrivers" ><h3>Drivers</h3></a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/ownercontactconductors" ><h3>Conductors</h3></a></th>
                </tr>
                
            </table> 
            </div>
            
        </div>

        <div class="data-table">
        <div class="selection">
                <table >
                <tr>
                    
                    
                </tr>
                
            </table>   
        </div>

            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Assinged Bus</th>
                </tr>

<?php
                
                $testuser = new User();
                $conductorContacts = $testuser->getContactDetails('conductor');
                // show($driverContacts);
                // $i = 0;
                foreach ($conductorContacts as $conductorContact) {
                    echo "<tr>";
                    echo "<td>$conductorContact[name]</td>";
                    echo "<td> $conductorContact[email] </td>";
                    echo "<td>$conductorContact[address]</td>";
                    echo "<td> $conductorContact[phone] </td>";
                    echo "<td> $conductorContact[assigned_bus] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>