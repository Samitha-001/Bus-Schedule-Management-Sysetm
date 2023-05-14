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
        <div class="col-1">
            <div class="header orange-header">
                <div>
                    <h3>Breakdowns</h3>
                </div>
                <!-- <div><button id="btn" class="button-grey">Add New</button> -->
            
                <div>
                    <button id="btn" class="button-grey">Add New</button>
                    <span id="error-msg" style="color: red;"></span>
                </div>
            </div>
        </div>

     

        <div class="col-2">

        <!-- TODO -->
        <form method="post" id="view_breakdown" style="display:none" action="<?=ROOT?>/conductorbreakdowns/addBreakdown">

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
                                <button class="button-green" type="submit" id="form-save">Save</button>
                                <button class="button-cancel" onclick="cancel()">Cancel</button>
                            </td>
                        </tr>
                    </table>
                </div>
                </form>
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
            
        

        <div class="data-table">
            <div class="col-3">
                <table border='1' class="styled-table" >
                    <tr>
                        <th>#</th>
                        <th>Bus No.</th>
                        <th>Description</th>
                        <th>Time to repair</th>
                    </tr>

                    <?php
                    if(!empty($breakdowns)) :
                    foreach ($breakdowns as $breakdown) {
                        echo "<tr>";
                        echo "<td> $breakdown->id </td>";
                        echo "<td> $breakdown->bus_no </td>";
                        echo "<td> $breakdown->description </td>";
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
            </div>
        </div>

        <div><button id="btn2" class="button-grey">My Breakdowns</button></div>
        
        <?php
        $conductor= $_SESSION['USER']->username;
        $my_breakdowns = new Breakdown();
        $my_breakdown = $my_breakdowns->getConductorBreakdowns($conductor);

        if (is_array($my_breakdown) && count($my_breakdown) > 0) {
            $my_breakdown = end($my_breakdown);
        }
        ?>

        <div class="data-table" style="display: none;" id="view_my_breakdowns">
            <div class="col-4">


            <table border='1' class="styled-table">
    <tr>
        <th>#</th>
        <th>Bus No.</th>
        <th>Description</th>
        <th>Time to repair</th> 
        <th></th> 
    </tr>
    <?php 
    if (!empty($my_breakdown) && $my_breakdown->status == 'repairing') :
        ?>
        <tr>
            <td><?php echo $my_breakdown->id ?></td>
            <td><?php echo $my_breakdown->bus_no ?></td>
            <td><?php echo $my_breakdown->description ?></td>
            <td><?php echo $my_breakdown->time_to_repair ?></td>
            <td><button href=# class="button-green" id='edit-breakdown-info'>Edit</button></td>
        </tr>
    <?php else: ?>
        <tr>
            <td id="no-breakdowns-td" colspan="5">No breakdowns found</td>
        </tr>
    <?php endif; ?>
</table>


               

                <form id="form1" method="post" action="<?=ROOT?>/conductorbreakdowns/repairBreakdown/<?=$my_breakdown->id?>">
                    <input type="hidden" display="none" name="breakdown_id" value="<?php echo($my_breakdown->id) ; ?>"> 
                    <!-- <input type="hidden" display="none" name="status" value="repaired"> -->
                    <button id="btn3" class="button-green" type="submit" name="repaired">Repaired</button>
                    <button class="button-cancel" onclick="cancel()">Cancel</button>
                </form>

                <!-- edit form for breakdown info -->
                <div id="edit-form-container" style="display: none;">
                        <form id="edit-form" method="post" action="<?=ROOT?>/conductorbreakdowns/modifyBreakdown/<?=$my_breakdown->id?>">
                            <h1>Description:</h1>
                            <input type="text" name="description" id="description" value="<?= $my_breakdown->description ?>">
                            <h1>Time to repair:</h1>
                            <input type="text" name="time" id="time" value="<?= $my_breakdown->time_to_repair ?>">

                            <!-- TODO -->
                            <div class="info-grid-start-2">
                                <input type="submit" value="Save Changes" id="form-save" >
                                <button id='cancel-info'>Cancel</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        

        <div>
    <button id="btn_history" class="button-grey">History</button>
</div>

<?php
$conductor = $_SESSION['USER']->username;
$history_breakdowns = new Breakdown();
$history_breakdown = $history_breakdowns->getConductorBreakdowns($conductor);
?>

<div class="data-table" style="display: none;" id="view_history_breakdowns">
    <div class="col-5">
        <table border='1' class="styled-table">
            <tr>
                <th>#</th>
                <th>Bus No.</th>
                <th>Description</th>
                <th>Time to repair</th> 
                <th>Date and Time</th>
                <th></th> 
            </tr>
            <?php 
            if (!empty($history_breakdown)):
                foreach ($history_breakdown as $breakdown):
                    if ($breakdown->status == 'repaired'): ?>
                        <tr>
                            <td><?php echo $breakdown->id ?></td>
                            <td><?php echo $breakdown->bus_no ?></td>
                            <td><?php echo $breakdown->description ?></td>
                            <td><?php echo $breakdown->time_to_repair ?></td>
                            <td><?php echo $breakdown->Date_time ?></td>
                        </tr>
                    <?php endif;
                endforeach;
            else: ?>
                <tr>
                    <td id="no-breakdowns" colspan="4">No breakdowns found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>


    </main>

</body>

</html>