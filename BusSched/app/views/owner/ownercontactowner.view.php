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

    <div class="header orange-header">
        <div>
            <h2>Register New Bus</h2>            
        </div>
    </div>
    <div class="row" style="justify-content: center;">        
    <main class="container">
        <div id="owner-contacts">
            <h3 style="margin-bottom:10px;">Owners</h3>
            <table class="schedule-table">
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Contact No</th>
                </tr>
                <?php
                foreach ($data['ownerContacts'] as $owner) {
                    echo "<tr>";
                    echo "<td> $owner[email] </td>";
                    echo "<td> $owner[name] </td>";
                    echo "<td> $owner[phone] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>

        <!-- driver contacts -->
        <div id="driver-contacts">
            <h3 style="margin-bottom:10px;">Drivers</h3>
            <table class="schedule-table">
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Contact No</th>
                </tr>
                <?php
                foreach ($data['driverContacts'] as $driver) {
                    echo "<tr>";
                    echo "<td> $driver[email] </td>";
                    echo "<td> $driver[name] </td>";
                    echo "<td> $driver[phone] </td>";
                    echo "</tr>";
                } ?>
            </table>
        </div>

        <!-- conductor contacts -->
        <div id="conductor-contacts" style="padding-top:0px;">
            <h3 style="margin-bottom:10px;">Conductors</h3>
            <table class="schedule-table">
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
        </div>
        
    </main>
</div>

</body>

</html>