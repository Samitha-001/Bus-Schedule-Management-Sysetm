<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>OwnerFares</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/landing.css">
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/landing.js"></script>
    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
</head>

<body >
<?php include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';?>

<datalist id="halt-list">
 <?php
    $len = count($halts);
    for ($i = 0; $i < $len; $i++) {
        $halt = $halts[$i];
        echo "<option value='" . $halt->name . "'>";
    }
    ?> 

</datalist> 

<div class="row" style="margin-left:220px;"> 
    <h1 style="margin-top:40px;margin-bottom:40px; color:#24315e; text-align:center;">A/C bus fares</h1>
    <div class="fare-from-to-grid">
        <input type="text" name="from" id="fare-from" placeholder="From" list="halt-list" style="width:200px;font-size:15px;height:35px;text-align:center" required>
        <input type="text" name="to" id="fare-to" placeholder="To" list="halt-list" style="width:200px;font-size:15px;height:35px;margin-left:5px;text-align:center" required>

        <button id="calculate-fare" class="button-orange" style="width:200px;font-size:15px;height:42px;padding-bottom:3px;padding-top:3px;text-align:center">Find fare</button>
        <div id="fare-result" class='span-3' style="font-size:20px;margin:30px 0px 5px 30px;color:orangered"></div>
    </div>
    <section id="busfare" >
        <div style="width:100%">
            <table id="busfare-table">
                <?php

                $len = count($halts);
                $fareinstance = new Fareinstance;
                $instance = $fareinstance->getFareInstances($len);
                
                
                for ($i = 0; $i < $len; $i++) {
                    $halt = $halts[$i];
                ?>
                    <tr data-haltfrom='<?=$halt->name?>'><td class='halt-name'><?=$halt->name?></td>
                    <?php
                    for ($j = 0; $j <= $i; $j++)
                        { if ($i == $j) {?>

                        <td class='halt-name-top'><?=$halt->name?></td>

                    <?php } else {?>

                        <td class='fare-td' data-haltto='<?=$halts[$j]->name?>'><?=$instance[$i-$j]->fare?></td>

                    <?php }}}?>
            </table>
        </div>
    </section>

</div>
</body>

</html> 