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
    
    <style>
        .card {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    margin: 10px;
    width: 100%; /* Set width to 100% */
  /* Set max-width to 200px */
  height: 100px;
  position: relative;
  }
  
  .card h4 {
    margin: 0;
    font-size: 18px;
  }
  
  .card p {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
  }

  .card .edit-btn,
  .card .delete-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 30px;
    height: 30px;
    background-color: transparent;
    border: none;
    cursor: pointer;
  }
  
  .card .edit-btn:hover,
  .card .delete-btn:hover {
    background-color: #ccc;
  }
  
  .card .edit-icon,
  .card .delete-icon {
    color: #24315e;
    font-size: 20px;
  }
  
  .fareinstance {
    width: auto;
    height: 500px;
    background-color: #fff;
    overflow-x: auto;
  }
  
  .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 200px;
    width: 100%;
    table-layout: fixed;
  }
  #popup_form_container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
}

#popup_form_container form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
}

#popup_form_container form table {
    width: 100%;
}

#popup_form_container form td {
    padding: 5px;
}

#popup_form_container form .button-green {
    background-color: green;
    color: #fff;
}

#popup_form_container form .button-cancel {
    background-color: red;
    color: #fff;
}


  
    </style>

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
            <div><button class="button-grey add-btn" id="add_new_button">Add New</button></div>
        </div>

        
<div id="popup_form_container">
    <form method="post" id="view_bus">
        <?php if (!empty($errors)) : ?>
            <?= implode("<br>", $errors) ?>
        <?php endif; ?>

        <div>
            <table class="styled-table">
                <tr>
                    <td style="color:#24315e;"><label for="instacne">Instance </label></td>
                    <td><input name="instance" type="text" class="form-control" id="bus_no" placeholder="Bus No..." required></td>
                </tr>
                <tr>
                    <td style="color:#24315e;"><label for="fare">Fare </label></td>
                    <td><input name="fare" type="text" class="form-control" id="bus_no" placeholder="Bus No..." required></td>
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
</div>


        <div class="fareinstance" style="width: auto; height: 250px; background-color: #fff;">
  
  <table>
    <tr>
      <?php
        $len = count($halts);
        $fareinstance = new Fareinstance;
        $instance = $fareinstance->getFareInstances($len);
        foreach ($instance as $i) {
          echo "<td>";
          echo "<div class='card'>";
          echo "<button class='edit-btn'><i class='fa fa-pencil edit-icon'></i></button>";
          echo "<button class='delete-btn'><i class='fa fa-trash delete-icon'></i></button>";
          echo "<h4>$i->instance</h4>";
          echo "<p>$i->fare</p>";
          echo "</div>";
          echo "</td>";
        }
      ?>
    </tr>
    
  </table>
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
        <script>
    // Get the button and the popup form container
    var addNewButton = document.getElementById("add_new_button");
    var popupFormContainer = document.getElementById("popup_form_container");

    // When the button is clicked, show the popup form
    addNewButton.onclick = function() {
        popupFormContainer.style.display = "block";
    }

    // When the "Cancel" button is clicked, hide the popup form
    function cancel() {
        popupFormContainer.style.display = "none";
    }
</script>

    </main>

</body>

</html>