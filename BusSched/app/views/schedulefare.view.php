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
            <div><button id="btn" class="button-grey">Add New</button></div>
        </div>

        <form method="post" id="view_fare" style="display:none">

            <?php if (!empty($errors)) : ?>
                <?= implode("<br>", $errors) ?>
            <?php endif; ?>

            <div>
                <table class="styled-table">
                    <tr>
                        <td><label for="source">From</label></td>
                        <td><input type="text" class="form-control" name="source" id="source" placeholder="Starting halt..."></td>
                    </tr>

                    <tr>
                        <td><label for="dest">To</label></td>
                        <td>
                            <input type="text" name="dest" class="form-control" id="dest" placeholder="Destination halt...">
                        </td>
                    </tr>

                    <tr>
                        <td><label for="route_bus">Route</label></td>
                        <td><input type="text" name="route_bus" class="form-control" id="route_bus" placeholder="Bus route..."></td>
                    </tr>

                    <tr>
                        <td><label for="type_bus">Type </label></td>
                        <td>
                            <select name="type_bus" id="type_bus" class="form-control">
                                <option disabled selected value>--select an option--</option>
                                <option value="L">Luxury</option>
                                <option value="S">Semi-Luxury</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="amount">Amount</label></td>
                        <td><input type="number" name="amount" class="form-control" id="amount" placeholder="Bus fare..."></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td align="right">
                            <button class="button-green" type="submit">Save</button>
                            <button class="button-cancel" onclick="cancel()">Cancel</button>
                        </td>
                    </tr>

                </table>
            </div>
        </form>

        <div>
            <br>
            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>From</th>
                    <th>Route</th>
                    <th>To</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                    <!-- <th>Action</th> -->
                </tr>

                <?php
                foreach ($fares as $fare) {
                    echo "<tr>";
                    echo "<td> $fare->id </td>";
                    echo "<td> $fare->source </td>";
                    echo "<td> $fare->dest </td>";
                    echo "<td> $fare->route_bus </td>";
                    echo "<td> $fare->type_bus </td>";
                    echo "<td> $fare->amount</td>";
                    echo "<td> $fare->last_updated </td>";
                    echo "<td>
                                <div class='edit_delete'> 
                                <img src='ROOT/assets/images/Edit.png'>
                                <img src=' ROOT/assets/images/Delete.png'>
                                </div>      
                          </td>";
                    echo "</tr>";
                } ?>

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
    </main>

</body>

</html>