<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Breakdowns</title>

    <!-- <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet"> -->
    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
<?php
// include '../app/views/components/ownernavbar.php';
// include '../app/views/components/ownersidebar.php';
    include '../app/views/components/navbarcon.php';
?>
<!--  -->
    <main class="container1">
    <div class="col-1">
        <div class="header orange-header">
            <div>
                <h3>Breakdowns</h3>
            </div>
            <div><button id="btn" class="button-grey">Add New</button></div>
        </div>
        </div>

        <div class="col-2">

        <form method="post" id="view_breakdown" style="display:none">

            <?php if (!empty($errors)): ?>
            <?= implode("<br>", $errors) ?>
                <?php endif; ?>

                <div>
                    <table class="styled-table">
                        <tr>
                            <td style="color:#24315e;"><label for="bus_no">Bus No. </label></td>
                            <td><input name="bus_no" type="text" class="form-control" id="bus_no"
                                    placeholder="Bus No..." required></td>
                        </tr>

                        <tr>
                            <td style="color:#24315e;"><label for="description">Description </label></td>
                            <td><input name="description" type="text" class="form-control" id="description"
                                    placeholder="Description..." required></td>
                        </tr>
                        <tr>
                            <td style="color:#24315e;"><label for="time_to_repair">Time to Repair </label></td>
                            <td><input name="time_to_repair" type="text" class="form-control" id="time_to_repair"
                                    placeholder="Time to repair..." required></td>
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
            </div>
        </form>

        <div class="data-table">
        <div class="col-3">

            <table border='1' class="styled-table">
                <tr>
                    <th>#</th>
                    <th>Bus No.</th>
                    <th>Description</th>
                    <th>Time to repair</th>
                </tr>
                
                <?php
                foreach ($breakdowns as $breakdown) {
                    echo "<tr>";
                    echo "<td> $breakdown->id </td>";
                    echo "<td> $breakdown->bus_no </td>";
                    echo "<td> $breakdown->description </td>";
                    // echo "<td> $breakdown->date </td>";
                    // echo "<td> $breakdown->time </td>";
                    echo "<td> $breakdown->time_to_repair </td>";
                    echo "</tr>";
                } ?>

<tr>
                    <!-- <td></td>
                    <td></td>
                        <td align="right">
                                <button class="button-delete" id="delete_breakdown" type="delete">Delete</button>
                        </td> -->
                    </tr>
<!-- <tr>
<input type="submit" value="View My Breakdowns" id="my breakdowns" >
</tr> -->
                   

            </table>
        </div>

        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>