 <?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
// show($_POST);
?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>

    <title>Fares</title>
    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/conductorfare.js"></script>
</head>

<body>
<?php include 'components/navbarcon.php'; ?>

    <datalist id="halt-list">
    <?php
        $len = count($halts);
        for ($i = 0; $i < $len; $i++) {
            $halt = $halts[$i];
            echo "<option value='" . $halt->name . "'>";
        }
        ?> 

    </datalist> 

    <div class="header orange-header">
        <h2>A/C bus fares</h2>
    </div>

    <div class="fare-from-to-grid">
        <input type="text" name="from" id="fare-from" placeholder="From" list="halt-list" required>
        <input type="text" name="to" id="fare-to" placeholder="To" list="halt-list" required>

        <button id="calculate-fare" class="button-orange">Find fare</button>
    </div>
    <div id="fare-result" class='span-3'></div>

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
</body>

</html> 