
<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Schedule</title>

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
                <h3>Schedule</h3>
            </div>
            <div><button id="btn" class="button-grey">Download</button></div>
        </div>
        <body>

        
        <div>
            <br>
            <table border='1' class="styled-table">
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Bus Route</th>
                    <th>Bus No.</th>
                    <th>Bus Type</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                </tr>

    

            </table>

        </div>

    </main>

</body>

</html>