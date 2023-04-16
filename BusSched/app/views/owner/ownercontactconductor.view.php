<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

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
                    <th>EmailAddress</th>
                    <th>Contact No</th>
                    <th>Assinged Bus</th>
                </tr>
<!-- 
                <?php
                foreach ($contactconductors as $conductor) {
                    echo "<tr>";
                    echo "<td> $conductor->name </td>";
                    echo "<td> $conductor->email </td>";
                    echo "<td> $conductor->tp </td>";
                    echo "<td> $conductor->bus_no </td>";
                    echo "</tr>";
                } ?> -->

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>