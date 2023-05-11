<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Income</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">
    <!-- <link href="<?= ROOT ?>/assets/css/owner_view.css" rel="stylesheet"> -->
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>
<main class="container1">

<?php
$bus=new Bus();
$buses = $bus->getOwnerBuses($_SESSION['USER']->username);
$date = '2023-01-1';
// show($date);
foreach($buses as $busx)
{
  $income=$bus->calculateDailyIncome($busx->bus_no, $date);
}
?>
    <div class="header orange-header">
          
    <button style="background-color: #f4511e;"><h3 type="button">Today Income <?php echo '(',"$date",')'?> </h3></a></button>
                    <h3>weekly Income</h3></a>
                    <h3>Monthly Income</h3></a>
     </div>



<table border='1' id="incometable" class="styled-table" style="width: 400px;margin-top:20px">
 <tr >
  <th style="padding-left:100px;">Bus No</th>
  <th style="padding-left:100px;">Income(LKR)</th>
 </tr>

<tr>
 <?php
        // if not empty, then display the buses
        if ($buses):
        foreach ($buses as $busx): ?>
       
       <?php    
           $income=$bus->calculateDailyIncome($busx->bus_no,$date);?>
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

      
    
</main>
</body>

</html>