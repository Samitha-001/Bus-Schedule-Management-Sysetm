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

        <!-- <form method="post" id="view_fare" style="display:none">

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
            <table border='1' class="styled-table" style="border-radius: 40px;">
                <tr>
                    <th>#</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Route</th>
                    <!-- <th>Type</th> -->
                    <th>Instance</th>
                    <th>Amount</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                    <!-- <th>Action</th> -->
                </tr>
                <?php
                  print_r($schedfares);
                ?>
                <!-- <?php
                
                foreach ($schedfares as $fare): ?> 
                    <tr>
                    <td> <?php echo $fare->id ?></td>
                    <td> <?php echo $fare->instance ?></td>
                    <td> <?php echo $fare->fare ?></td>
                    
                    <td> <?php echo $fare->last_updated ?></td>
                    <td>
                        <div class='edit_delete'> 
                                <img src='<?= ROOT ?>/assets/images/icons/edit.png'>
                                <img class = "delete-btn" src='<?=ROOT ?>/assets/images/icons/delete.png'>
                        </div>      
                    </td>
                    </tr>
                <?php endforeach ?>; 

                <!-- <?php static $i = 1; ?>
                <?php if ($schedfares):
               foreach ($schedfares as $schedfare): ?>
                <tr data-id=<?= $schedfare->id ?>>
                    <td> <?= $i ?> </td>
                    <?php $i++; ?>
                    <td data-fieldname="source"> <?= $schedfare->source ?> </td>
                    <td data-fieldname="dest"> <?= $schedfare->dest ?> </td>
                    <td data-fieldname="bus_route"> <?= $schedfare->bus_route ?> </td>
                    <td data-fieldname="amount"> <?= $schedfare->amount ?> </td>
                    <td data-fieldname="last updated"> <?= $schedfare->last_updated ?> </td>

                    <td id="edit-delete"> 
                    <img src='<?= ROOT ?>/assets/images/icons/edit.png'  width='20px' height='20px'>
                      <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
                    </td>
                  </tr>
              <?php endforeach; else: ?>
                <tr>
                  <td colspan="9" style="text-align:center;color:#999999;"><i>No fares found.</i></td>
                </tr>
        <?php endif; ?>

        <tr class='dummy-input' >
            <td></td>
            <td data-fieldname="source">
              <input type="text" value="" placeholder="source">
            </td>
            <td data-fieldname="dest">
              <input type="text" value="" placeholder="dest">
            </td>
            <td data-fieldname="bus_route">
              <input type="text" value="" placeholder="Route">
            </td>
            <td data-fieldname="amount">
              <input type="text" value="" placeholder="amount">
            </td>
            <td data-fieldname="last_updated">
              <input type="text" value="" placeholder="last_updated">
            </td>
            <!-- <td data-fieldname="dest">
              <input type="text" value="" placeholder="Destination">
            </td>
            <td data-fieldname="owner">
              <input type="text" value="" placeholder="Owner">
            </td>
            <td data-fieldname="conductor">
              <input type="text" value="" placeholder="Conductor">
            </td>
            <td data-fieldname="driver">
              <input type="text" value="" placeholder="Driver">
            </td> -->
            <!-- <td class='edit-options'>
              <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon save-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-btn" width='20px' height='20px'>
            </td>
            <td class='add-options'>
              <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon add-row-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-add-btn" width='20px' height='20px'>
            </td>
          </tr>
          <tr class='dummy-row' style="display: none;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td id="edit-delete">
              <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
            </td>
          </tr> --> 

            </table>
        </div>
       


        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
    </main>

</body>

</html>