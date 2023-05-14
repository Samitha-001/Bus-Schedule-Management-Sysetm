<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">

</head>

<body>
    <?php include '../app/views/components/navbarcon.php'; ?>
<main class="container1">

<?php
$bus = new Bus();
$buses = $bus->getConductorBuses($_SESSION['USER']->username);
$date = date('Y-m-d');


// show($date);

?>
    <div class="header orange-header">
          
    <h3 type="button">Today E-Ticket Income <?php echo '(',"$date",')'?> </h3>
                    <!-- <h3>weekly Income</h3></a>
                    <h3>Monthly Income</h3></a> -->
     </div>


     <?php
$bus = new Bus();
$buses = $bus->getConductorBuses($_SESSION['USER']->username);
$date = date('Y-m-d');


?>

<table border='1' id="incometable" class="styled-table" style="width: 400px;margin-top:20px">
 <tr >
  <th style="padding-left:100px;">Bus No</th>
  <th style="padding-left:100px;">Income(LKR)</th>
 </tr>

<?php
        // if not empty, then display the buses
        if ($buses):
        foreach ($buses as $busx): ?>
       
       <?php    
           $income=$bus->calculateDailyIncome($busx->bus_no,$date);?>
                <tr>
                    <td style="padding-left:100px;"><?= $busx->bus_no?></td>
                    <td style="padding-left:100px;"><?= $income?></td>
                </tr>
           
        <?php endforeach;
            else : ?>
            <tr>
                <td colspan="10">No buses found</td>
            </tr>
        <?php endif;?>

 

</table>



<?php
if ($buses):
    foreach ($buses as $busx): 
        $bus_no=$busx->bus_no;
        $trip=new Trip();
        $trips=$trip->getBusTrips($bus_no);
    ?>

<div class="header orange-header">
          
          <h3 type="button">Today Trips Income <?php echo '(',"$date",')'?> </h3>
                          <!-- <h3>weekly Income</h3></a>
                          <h3>Monthly Income</h3></a> -->
           </div>

    <table border='1' id="incometable" class="styled-table" style="width: 400px;margin-top:20px">
        <tr >
            <th style="padding-left:100px;">Trip-ID</th>
            <th style="padding-left:100px;">Income(LKR)</th>
        </tr>

        <?php
        // if not empty, then display the buses
        if ($trips):
        foreach ($trips as $tripx): ?>
       
       <?php    
           $income=$bus->calculateTripIncome($tripx->id);?>
                <tr>
                    <td style="padding-left:100px;"><?= $tripx->id?></td>
                    <td style="padding-left:100px;"><?= $income?></td>
                </tr>
           
        <?php endforeach;
            else : ?>
            <tr>
                <td colspan="10">No trips found for this bus</td>
            </tr>
        <?php endif;?>

 

    </table>      
    
<?php endforeach; endif; ?>

</main>

 


</body>

</html>

</html>