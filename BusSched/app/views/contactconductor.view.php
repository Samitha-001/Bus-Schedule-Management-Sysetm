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
            <h2>Contacts - Conductors</h2>
        </div>
        <!-- <div class="col-1">   -->
            <table style="background:#24315e; margin-top:0px">
                <tr>
                    <th style="padding-left:30px; background:#24315e;"><a href="<?= ROOT ?>/contactdrivers" ><h3>Drivers</h3></a></th>
                    <th style="padding-left:30px; background:#24315e;"><a href="<?= ROOT ?>/contactconductors" ><h3 style="color:#24315e; background:white;">Conductors</h3></a></th>
                </tr>
            </table> 
        <!-- </div> -->

        <div class="data-table">
        <div class="selection">
                <table >
                <tr>
                    
                    
                </tr>
                
            </table>   
        </div>
    <div class="col-2">
    <table border='1' class="styled-table">
    <?php
                $testuser = new User();
                $conductorContacts = $testuser->getContactDetails('conductor');
                foreach ($conductorContacts as $conductorContact) {

                    echo "<tr>";
                    echo "<th>Assigned Bus</th>";
                    echo "<td> $conductorContact[assigned_bus] </td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<td>$conductorContact[name]</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td>Email</td>";
                    echo "<td> $conductorContact[email] </td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Address</td>";
                    echo "<td>$conductorContact[address]</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td>Contact No</td>";
                    echo "<td> $conductorContact[phone] </td>";
                    echo "</tr>";

                   

                
                } ?>
            </table>
    
        </div>
    </div>

        

    </main>

</body>

</html>