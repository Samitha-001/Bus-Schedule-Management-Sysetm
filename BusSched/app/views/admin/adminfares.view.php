<?php
if (!isset($_SESSION['USER'])) {
  redirect('home');
}
if ($_SESSION['USER']->role == 'passenger') {
  redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
  redirect('drivers');
} else if ($_SESSION['USER']->role == 'conductor') {
  redirect('conductors');
} else if ($_SESSION['USER']->role == 'scheduler') {
  redirect('schedulers');
} else if ($_SESSION['USER']->role == 'owner') {
  redirect('owners');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <!-- <script src="<?= ROOT ?>/assets/js/adminratings.js"></script> -->
    <title>Fares</title>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<section>

<h1 style="margin-top:40px; color:#24315e; text-align:center;">A/C bus fares</h1>
        <div class="fare-from-to-grid">
            <input type="text" name="from" id="fare-from" placeholder="From" list="halt-list" required>
            <input type="text" name="to" id="fare-to" placeholder="To" list="halt-list" required>

            <button id="calculate-fare" class="button-orange">Find fare</button>
            <h3 id="fare-result" class='span-3'></h3>
        </div>
        </section>

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
                <span id="about-scroll"></span>
            </div>
        </section>
    
    </body>

</html>