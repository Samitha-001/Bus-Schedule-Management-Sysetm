<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Breakdowns</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/breakdown.js"></script>

</head>

<body>
    <?php include '../app/views/components/navbarcon.php'; ?>

    <main class="container1">
        
        <div class="header orange-header" style="position:sticky; top:69px;">
            <h2>Breakdowns</h2>
        </div>

    <?php  
        $my_breakdown = new Breakdown();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data['bus_no'] = strtoupper($_POST["bus_no"]);
            $data['description'] = $_POST["description"];
            $data['time_to_repair'] = $_POST["time_to_repair"];
            if ($my_breakdown->validate($data)) {
                $my_breakdown->addBreakdown($data);            
            }
        }
    ?>

    <!-- current breakdown if any -->
    <div class="col-2">
        <h3 style="margin-top:0px; margin-bottom:10px;">Current Breakdowns</h3>
        <?php
        // go through $breakdowns and get breakdowns with status = "repairing"
        $current_breakdowns = array();
        foreach ($breakdowns as $breakdown) {
            if ($breakdown->status == "repairing") {
                array_push($current_breakdowns, $breakdown);
            }
        }

        if (count($current_breakdowns) > 0) {
            ?>
            <table border='1' class='styled-table'>
                <tr>
                    <th>#</th>
                    <th>Breakdown time</th>
                    <th>Bus</th>
                    <th>Description</th>
                    <th>Estimated repair time</th>
                    <th></th>
                </tr>

                <?php
                // display each current breakdown
                foreach ($current_breakdowns as $breakdown) {?>
                    <tr>
                        <td> <?=$breakdown->id?> </td>
                        <td> <?=$breakdown->breakdown_time?> </td>
                        <td> <?=$breakdown->bus_no?> </td>
                        <td> <?=$breakdown->description?> </td>
                        <td> <?=$breakdown->time_to_repair?> </td>
                        <td>
                            <input type="hidden" name="id" value="<?=$breakdown->id?>">
                            <button class="button-green">repaired</button>
                            <button class="button-green" style="border:#f15f22;background-color:#f15f22;">edit</button>
                        </td>
                    </tr>
                    <?php
                }
                echo "</table>";
            } else echo "No current breakdowns";
        ?>
    </div>
    
    <!-- breakdowns history -->
    <div class="col-2">
        <h3 style="margin-top:0px; margin-bottom:10px;">Breakdown History</h3>
            <!-- <div class="data-table"> -->
                <table border='1' class="styled-table" >
                    <tr>
                        <th>#</th>
                        <th>Breakdown time</th>
                        <th>Bus</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Repaired at</th>
                        <th>Estimated repair time</th>
                    </tr>

                    <?php
                    if(!empty($breakdowns)) :
                    foreach ($breakdowns as $breakdown) {
                        echo "<tr>";
                        echo "<td> $breakdown->id </td>";
                        echo "<td> $breakdown->breakdown_time </td>";
                        echo "<td> $breakdown->bus_no </td>";
                        echo "<td> $breakdown->status </td>";
                        echo "<td> $breakdown->description </td>";
                        echo "<td> $breakdown->repaired_time </td>";
                        echo "<td> $breakdown->time_to_repair </td>";
                        echo "</tr>";
                    }
                else: ?>
                    <tr>
                        <td id="" colspan="4">No breakdowns found</td>
                    </tr>
                <?php endif; ?>
                    <tr></tr> 
                    <tr></tr> 
                    <tr></tr> 
                </table>
            <!-- </div> -->
        </div>

    </main>

</body>

</html>