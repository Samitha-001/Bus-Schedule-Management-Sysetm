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
    <title>Fares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link href="<?= ROOT ?>/assets/css/schedfare.css" rel="stylesheet">
    <!-- <script src="<?= ROOT ?>/assets/js/schedulebreakdown.js">console.log("Hey")</script> -->
    <script src="<?= ROOT ?>/assets/js/schedbusfare.js">console.log("Hey")</script>
</head>

<body>

    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    <main class="container1">

        <div class="header orange-header">
            <div>
                <h3>Bus Fares</h3>
            </div>
            <div><button class="button-grey add-btn">Add New</button></div>
        </div>

        <div class="row">
        <h1 style="margin-top:40px; color:#24315e; text-align:center;">A/C bus fares</h1>
        <div class="fare-from-to-grid">
            <input type="text" name="from" id="fare-from" placeholder="From" list="halt-list" required>
            <input type="text" name="to" id="fare-to" placeholder="To" list="halt-list" required>

            <button id="calculate-fare" class="button-orange">Find fare</button>
            <div id="fare-result" class='span-3'></div>
        </div>
        <section id="busfare">
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


        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
    </main>

</body>

</html>