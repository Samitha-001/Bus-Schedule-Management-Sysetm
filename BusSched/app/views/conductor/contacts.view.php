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

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
    <?php include '../app/views/components/navbarcon.php'; ?>

    <main class="container1">
        <div class="header orange-header" style="position:sticky; top:69px;">
            <h2>Contacts</h2>
        </div>
        <div class="col-2" id="owner-contacts">
            <h3 style="margin-top:0px; margin-bottom:10px;">Owners</h3>
            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                </tr>

                <?php
                foreach ($data['ownerContacts'] as $owner) {
                    echo "<tr>";
                    echo "<td> $owner[name] </td>";
                    echo "<td> $owner[email] </td>";
                    echo "<td> $owner[phone] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>

        <div class="col-2" id="driver-contacts" style="padding-top:0px;">
            <h3 style="margin-top:0px; margin-bottom:10px;">Drivers</h3>
            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                </tr>

                <?php
                foreach ($data['driverContacts'] as $driver) {
                    echo "<tr>";
                    echo "<td> $driver[name] </td>";
                    echo "<td> $driver[email] </td>";
                    echo "<td> $driver[phone] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>

        <div class="col-2" id="conductor-contacts" style="padding-top:0px;">
            <h3 style="margin-top:0px; margin-bottom:10px;">Conductors</h3>
            <table border='1' class="styled-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                </tr>

                <?php
                foreach ($data['conductorContacts'] as $conductor) {
                    echo "<tr>";
                    echo "<td> $conductor[name] </td>";
                    echo "<td> $conductor[email] </td>";
                    echo "<td> $conductor[phone] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>
        <!-- <script src="<?= ROOT ?>/assets/js/bus.js"></script> -->

    </main>
    

</body>

</html>