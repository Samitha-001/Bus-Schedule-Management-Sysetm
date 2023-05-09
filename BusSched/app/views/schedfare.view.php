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
        .cardfare {
  border: 1px solid black;
  padding: 10px;
  background-color: #24315e;
  color: #fff;
}

.edit-btn, .delete-btn {
  border: none;
  background-color: transparent;
  font-size: 18px;
  cursor: pointer;
}

.edit-icon:before {
  content: "\f040";
}

.delete-icon:before {
  content: "\f1f8";
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
    <datalist id="halt-list">
        <?php
        $len = count($halts);
        for ($i = 0; $i < $len; $i++) {
            $halt = $halts[$i];
            echo "<option value='" . $halt->name . "'>";
        }
        ?>
    </datalist>
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
                    <td style="color:#24315e;"><label for="instance">Instance </label></td>
                    <td><input name="instance" type="text" class="form-control" id="bus_no" placeholder="Instance" required></td>
                </tr>
                <tr>
                    <td style="color:#24315e;"><label for="fare">Fare </label></td>
                    <td><input name="fare" type="text" class="form-control" id="bus_no" placeholder="Fare" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right">
                        <button class="button-green" type="submit" id="save-button">Save</button>
                        <button class="button-cancel" onclick="cancel()">Cancel</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>


        <div class="fareinstance" style="width: auto; height: 250px; background-color: transparent; overflow-x: auto; overflow-y: hidden;">
  
        <table>
            <tr>
  <?php
    $len = count($halts);
    $fareinstance = new Fareinstance;
    $instance = $fareinstance->getFareInstances($len);
    foreach ($instance as $i) {
      
        echo "<td>";
        echo "<div class='cardfare'>";
        echo "<h4>$i->instance</h4>";
        echo "<p class='fare-text'>$i->fare</p>";
        echo "<button class='edit-btn'><i class='fa fa-pencil edit-icon'></i></button>";
        echo "</div>";
        echo "</td>";
    }
  ?>
            </tr>
</table>
<div style="display: flex; justify-content: space-between;">
    <div id="left-arrow" style="width: 20px; height: 100%; background-color: transparent; position: sticky; left: 0;">
      <i class="fa fa-angle-left" style="font-size: 20px;"></i>
    </div>
    <div id="right-arrow" style="width: 20px; height: 100%; background-color: transparent; position: sticky; right: 0;">
      <i class="fa fa-angle-right" style="font-size: 20px;"></i>
    </div>
  </div>
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

    var tableContainer = document.querySelector(".fareinstance");
  var table = tableContainer.querySelector("table");
  var leftArrow = document.querySelector("#left-arrow");
  var rightArrow = document.querySelector("#right-arrow");

  var scrollStep = 150; // adjust as desired
  var scrollInterval = 100; // adjust as desired

  var tableWidth = table.offsetWidth;
  var containerWidth = tableContainer.offsetWidth;

  // hide left arrow initially
  leftArrow.style.visibility = "hidden";

  // add click listener to left arrow
  leftArrow.addEventListener("click", function () {
    tableContainer.scrollBy({
      left: -scrollStep,
      behavior: "smooth"
    });
  });

  // add click listener to right arrow
  rightArrow.addEventListener("click", function () {
    tableContainer.scrollBy({
      left: scrollStep,
      behavior: "smooth"
    });
  });

  // add scroll listener to hide/show arrows
  tableContainer.addEventListener("scroll", function () {
    var scrollLeft = tableContainer.scrollLeft;
    var maxScroll = tableWidth - containerWidth;
    if (scrollLeft == 0) {
      // scrolled all the way left
      leftArrow.style.visibility = "hidden";
    } else {
      leftArrow.style.visibility = "visible";
    }
    if (scrollLeft == maxScroll) {
      // scrolled all the way right
      rightArrow.style.visibility = "hidden";
    } else {rightArrow.style.visibility = "visible";
}});

// add resize listener to adjust table and container widths
window.addEventListener("resize", function () {
tableWidth = table.offsetWidth;
containerWidth = tableContainer.offsetWidth;
if (tableWidth <= containerWidth) {
// hide arrows if table fits in container
leftArrow.style.visibility = "hidden";
rightArrow.style.visibility = "hidden";
} else {
// show arrows if table overflows container
leftArrow.style.visibility = "visible";
rightArrow.style.visibility = "visible";
}
});

//editing
const cards = document.querySelectorAll(".cardfare");

cards.forEach(function (card) {
  const editBtn = card.querySelector(".edit-btn");
  const fareText = card.querySelector(".fare-text");

  editBtn.addEventListener("click", function () {
    cards.forEach(function (c) {
      if (c !== card) {
        c.classList.remove("editing");
        c.querySelector(".tick-btn")?.removeEventListener("click", handleTick);
        c.querySelector(".cross-btn")?.removeEventListener("click", handleCross);
        c.querySelector(".tick-btn")?.remove();
        c.querySelector(".cross-btn")?.remove();
        c.querySelector(".edit-btn").style.display = "block";
      }
    });

    card.classList.add("editing");
    fareText.contentEditable = true;
    fareText.focus();

    const tickBtn = document.createElement("button");
    tickBtn.classList.add("tick-btn");
    tickBtn.innerHTML = '<i class="fa fa-check"></i>';

    const crossBtn = document.createElement("button");
    crossBtn.classList.add("cross-btn");
    crossBtn.innerHTML = '<i class="fa fa-times"></i>';

    card.appendChild(tickBtn);
    card.appendChild(crossBtn);

    const handleTick = function () {
      const newFare = fareText.textContent.trim();
      if (newFare !== "") {
        // update the database and the data shown here
        fareText.textContent = newFare;
      }
      tickBtn.removeEventListener("click", handleTick);
      crossBtn.removeEventListener("click", handleCross);
      tickBtn.remove();
      crossBtn.remove();
      editBtn.style.display = "block";
      card.classList.remove("editing");
      fareText.contentEditable = false;
    };

    const handleCross = function () {
      tickBtn.removeEventListener("click", handleTick);
      crossBtn.removeEventListener("click", handleCross);
      tickBtn.remove();
      crossBtn.remove();
      editBtn.style.display = "block";
      card.classList.remove("editing");
      fareText.contentEditable = false;
    };

    tickBtn.addEventListener("click", handleTick);
    crossBtn.addEventListener("click", handleCross);

    editBtn.style.display = "none";
  });

  fareText.addEventListener("blur", function () {
    card.classList.remove("editing");
    fareText.contentEditable = false;
    card.querySelector(".tick-btn")?.removeEventListener("click", handleTick);
    card.querySelector(".cross-btn")?.removeEventListener("click", handleCross);
    card.querySelector(".tick-btn")?.remove();
    card.querySelector(".cross-btn")?.remove();
    editBtn.style.display = "block";
  });
});

  const saveButton = document.getElementById('save-button');
saveButton.addEventListener('click', addFareInstance);
    
</script>

    </main>

</body>

</html>