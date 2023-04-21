<?php
include 'components/navbar_new.php';
include 'components/schedulersidebar.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Buses</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedbus.css">

</head>

<body>



    <main class="container1">

        <div class="header orange-header">
            <div>
                <h3>Buses</h3>
            </div>
            <div><button id="downloadBtn" class="button-grey">Download</button></div>
        </div>

        <form method="post" id="view_bus" style="display:none">

            <?php if (!empty($errors)) : ?>
                <?= implode("<br>", $errors) ?>
            <?php endif; ?>

            <div>
                <table class="styled-table" id="tableData">
                    <tr>
                        <td style="color:#24315e;"><label for="bus_no">Bus No. </label></td>
                        <td><input name="bus_no" type="text" class="form-control" id="bus_no" placeholder="Bus No..." required></td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="type">Bus Type </label></td>
                        <td>
                            <select name="type" id="type" class="form-control" required>
                                <option disabled selected value>--select an option--</option>
                                <option value="L">Luxury</option>
                                <option value="S">Semi-Luxury</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="seats_no">Capacity </label></td>
                        <td><input name="seats_no" type="number" class="form-control" id="seats_no" placeholder="Available no. of seats..." required></td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="availability">Bus Available</label></td>
                        <td>
                        <div class="toggle-switch">
                            <input type="checkbox" id="toggle" class="toggle-input">
                            <label for="toggle" class="toggle-label"></label>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="route">Route </label></td>
                        <td><input name="route" type="text" class="form-control" id="route" placeholder="Bus route..." required></td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="start">Start </label></td>
                        <td><input name="start" type="text" class="form-control" id="start" placeholder="Starting halt..." required></td>
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
                    <th>Bus No.</th>
                    <th>Bus Type</th>
                    <th>No. of Seats</th>
                    <!-- <th>Bus Available?</th> -->
                    <th>Bus Route</th>
                    <th>Start</th>
                </tr>

                <?php
                foreach ($buses as $bus) :?>
                    <tr>
                    <td> <?php echo $bus->id ?> </td>
                    <td> <?php echo $bus->bus_no ?> </td>
                    <td> <?php echo $bus->type ?></td>
                    <td> <?php echo $bus->seats_no ?></td>
                    <td> <?php echo $bus->route ?></td>
                    <td> <?php echo $bus->start ?></td>
                    </tr>
                    <?php endforeach; ?>
                
                
                // if (isset($_POST['data'])) {
                //     // Retrieve the CSV data from the query parameter
                //     $csv = $_POST['data'];
                
                //     // Set the appropriate headers for a CSV download
                //     header('Content-Type: text/csv');
                //     header('Content-Disposition: attachment; filename=table_data.csv');
                
                //     // Output the CSV data
                //     echo $csv;
                // }
                ?>

            </table>
        </div>

        <!-- <script src="<?= ROOT ?>/assets/js/bus.js"></script> -->
        <script src="<?= ROOT ?>/assets/js/downloadbus.js"></script>

    </main>

</body>

</html>