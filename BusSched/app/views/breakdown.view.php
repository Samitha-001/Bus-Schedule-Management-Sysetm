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

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'components/navbarcon.php';
    ?> 

    <main class="container1">
        <div class="col-1">
        <div class="header orange-header">
            <div>
                <h3>Breakdowns</h3>
            </div>
            <!-- <div><button id="btn" class="button-grey">Add New</button> -->
           
        <div><button id="btn" class="button-grey">Add New</button>

        </div>
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
            <table border='1' class="styled-table" >
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
                    echo "<td> $breakdown->time_to_repair </td>";
                    echo "</tr>";
                } ?>
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
} else {
    echo "No breakdowns found for your bus.";
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
            <?php if($my_breakdown->status == 'repairing') {
                ?>
            <tr>
                <td><?php echo $my_breakdown->id ?></td>
                <td><?php echo $my_breakdown->bus_no ?></td>
                <td><?php echo $my_breakdown->description ?></td>
                <td><?php echo $my_breakdown->time_to_repair ?></td>
                <td><button href=# class="button-green" id='edit-breakdown-info'>Edit</button></td>
            </tr>
            
            <?php
            } else {?>
            <tr>
                <td id="no-breakdowns-td" colspan="4">No breakdowns found</td>
            </tr>
            <?php
            }
            ?>
        </table>

        <form id="form1" method="post" >
            <input type="hidden" display="none" name="breakdown_id" value="<?php echo($my_breakdown->id) ; ?>"> 
            <input type="hidden" display="none" name="status" value="repaired">
            <button id="btn3" class="button-green" type="submit" name="repaired">Repaired</button>
            <button class="button-cancel" onclick="cancel()">Cancel</button>
          

        </form> 
        
         <!-- edit form for breakdown info -->
         <div id="edit-form-container" style="display: none;">
                <form id="edit-form" method="post">
                    <h1>Description:</h1>
                    <input type="text" name="description" id="description" value="<?= $my_breakdown->description ?>">
                    <h1>Time to repair:</h1>
                    <input type="text" name="time" id="time" value="<?= $my_breakdown->time_to_repair ?>">
                                    
                    <!-- TODO -->
                    <div class="info-grid-start-2">
                        <input type="submit" value="Save Changes" id="form-save" >
                        <button id='cancel-info' >Cancel</button>
                    </div>
                </form>
            </div>
    </div>
</div>
<?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the data from the form
        $data['status'] = isset($_POST["status"]) ? $_POST["status"] : null;

        $my_breakdowns->updateBreakdown($my_breakdown->id, $data);
    }
?>
            
<script>
    const editButton = document.getElementById('edit-breakdown-info');
    const editFormContainer = document.getElementById('edit-form-container');
    const cancelButton = document.getElementById('cancel-breakdown-info');

    editButton.addEventListener('click', () => {
        editFormContainer.style.display = 'block';
    });
    
    cancelButton.addEventListener('click', () => {
        editFormContainer.style.display = 'none';
    });
</script>

<?php


$mybreakdowns = new Breakdown();
// $mybreakdown = $mybreakdowns->getConductorBreakdowns($conductor);
// $id=$mybreakdown->id;
$conductorBreakdowns = $mybreakdowns->getConductorBreakdowns($conductor);

foreach ($conductorBreakdowns as $mybreakdown) {
    $id = $mybreakdown->id;
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the form
    $d['description']=isset($_POST["description"]) ? $_POST["description"] : null;
    $d['time'] = isset($_POST["time"]) ? $_POST["time"] : null;
  
    $mybreakdowns->updatemyBreakdown($id, $d);
    
}
?>

        <script src="<?= ROOT ?>/assets/js/breakdown.js"></script>

    </main>

</body>

</html>