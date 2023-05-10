
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
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
<?php
$bus = new Bus();
$buses = $bus->getOwnerBuses($_SESSION['USER']->username);
// show($buses);
?>
        
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

                <?php
        // if not empty, then display the buses
        if ($buses):
        foreach ($buses as $bus): ?>
       
            <tr >
                
                 <td><?= $bus->start ?></td>
                 <td><?= $bus->dest ?></td>
                 <td><?= $bus->route ?></td>
                 <td><?= $bus->bus_no ?></td>
                 <td><?= $bus->type ?></td>
                
            </tr>
           
        <?php endforeach;
            else : ?>
            <tr>
                <td colspan="10">No buses found</td>
            </tr>
        <?php endif;?>

            </table>

        </div>

    </main>

</body>

</html>