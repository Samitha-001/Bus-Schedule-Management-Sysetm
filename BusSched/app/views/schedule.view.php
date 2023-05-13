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

    <title>Schedules</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">

    <style>

.date-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
  font-size: 24px;
  font-weight: bold;
  color: #333;
}
.button-container{
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    margin-top: 30px;
    font-weight: bold;
    position: relative;

}

.date {
  margin-right: 20px;
}

.fa-arrow-right {
  font-size: 24px;
  color: #333;
}
        .schedule-cards {
    display: flex;
    justify-content: space-around;
    padding: 80px 20px 10px;
  }
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 24px;
    width: 47%;
  }
  .card h2 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 16px;
  }
  .table-container {
    overflow: auto;
  }
  .piliyandala {
    border: 2px solid #FF9800;
  }
  .pettah {
    border: 2px solid #2196F3;
  }

  .styled-table input[type="checkbox"] {
  width: 20px;
  height: 20px;
  margin: 0;
}

.styled-table td:last-child {
  text-align: center;
}


#delete-button{
    cursor: pointer;
    background-color: red;

}
.card {
  /* Your card styles here */
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.card.flipped {
  transform: rotateY(180deg);
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
                <h3>Schedule</h3>
            </div>
            <div><button id="btn-generate" class="button-grey">Generate</button></div>
            <div><button id="btn" class="button-grey">Download</button></div>
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

       
        
        <div class="date-container">
  <div class="date">date</div>
  <i class="fa fa-arrow-right"></i>
</div>
<div class="button-container">
    <button id="delete-button" style="display:none"><i class="fa fa-trash"></i> Delete
    </button>
</div>

<div class="schedule-cards">
  <!-- <div class="card piliyandala">
    <div class="card-content">
      <h2>From Piliyandala</h2>
      <div class="table-container">
        <table border='1' class="styled-table">
          <tr>
            <th></th>
            <th>Starting Halt</th>
            <th>Bus No</th>
            <th>Departure</th>
            <th>Arrival</th>
          </tr>
          <?php static $i = 1; 
          $schedulesObject = json_decode(json_encode($schedules), false);
          ?>
          <?php if ($schedulesObject):
          foreach ($schedulesObject as $schedule): ?>
          <tr data-id=<?= $schedule->id ?>>
            <?php $i++; 
            if($schedule->starting_place === "Piliyandala"):
            ?>
            <td data-fieldname="checking">
              <?= "<input type='checkbox' class='delete-checkbox'"?>
            </td>
            <td data-fieldname="starting"> <?= $schedule->starting_place ?> </td>
            <td data-fieldname="bus_no"> <?= $schedule->bus_no ?> </td>
            <td data-fieldname="departure"> <?= $schedule->departure_time ?> </td>
            <td data-fieldname="arrival"> <?= $schedule->arrival_time ?> </td>
            <?php endif;?>
          </tr>
          <?php echo $schedules?>
          <?php endforeach; else: ?>
          <tr>
            <td colspan="9" style="text-align:center;color:#999999;"><i>No schedule found.</i></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div>
    <button class="card-toggle"></button>
    <div class="card-details">
      <!-- Additional content to be displayed -->
    </div>
    <?php 
       print_r($schedules);
    ?>
  </div> 
 

  <!-- <div class="card piliyandala">
    <div class="card-content">
      <h2>From Pettah</h2>
      <div class="table-container">
        <table border='1' class="styled-table">
          <tr>
            <th></th>
            <th>Starting Halt</th>
            <th>Bus No</th>
            <th>Departure</th>
            <th>Arrival</th>
          </tr>
          <?php static $i = 1; 
          $schedulesObject = json_decode(json_encode($schedules), false);
          ?>
          <?php if ($schedulesObject):
          foreach ($schedulesObject as $schedule): ?>
          <tr data-id=<?= $schedule->id ?>>
            <?php $i++; 
            if($schedule->starting_place === "Pettah"):
            ?>
            <td data-fieldname="checking">
              <?= "<input type='checkbox' class='delete-checkbox'"?>
            </td>
            <td data-fieldname="starting"> <?= $schedule->starting_place ?> </td>
            <td data-fieldname="bus_no"> <?= $schedule->bus_no ?> </td>
            <td data-fieldname="departure"> <?= $schedule->departure_time ?> </td>
            <td data-fieldname="arrival"> <?= $schedule->arrival_time ?> </td>
            <?php endif;?>
          </tr>
          <?php endforeach; else: ?>
          <tr>
            <td colspan="9" style="text-align:center;color:#999999;"><i>No schedule found.</i></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div> -->
    <button class="card-toggle"></button>
    <div class="card-details">
      <!-- Additional content to be displayed -->
    </div>
  </div>
</div>



        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
        <script>

        var today = new Date();
        var date = today.toLocaleDateString();
        document.querySelector(".date").innerHTML = date;
        

 // Get all the checkboxes with class 'delete-checkbox'
const deleteCheckboxes = document.querySelectorAll(".delete-checkbox");

// Get the delete button
const deleteButton = document.getElementById("delete-button");

// Loop through each checkbox and add an event listener to detect when it is clicked
deleteCheckboxes.forEach(function(deleteCheckbox) {
  deleteCheckbox.addEventListener("click", function() {
    // Count the number of checked checkboxes
    const numChecked = document.querySelectorAll(".delete-checkbox:checked").length;

    // If at least one checkbox is checked, show the delete button, otherwise hide it
    if (numChecked > 0) {
      deleteButton.style.display = "inline";
      
    } else {
      deleteButton.style.display = "none";
    }

    // Remove and re-add the event listener to ensure it is always active
    deleteCheckbox.removeEventListener("click", arguments.callee);
    deleteCheckbox.addEventListener("click", arguments.callee);
  });
});

function generateNewDiv() {
  const card = document.querySelector('.card');
  const newDiv = document.createElement('div');
  newDiv.classList.add('new-div');
  card.appendChild(newDiv);
  
  card.classList.toggle('rotate');
  card.addEventListener('transitionend', () => {
    card.classList.toggle('rotate');
  }, { once: true });
}

document.addEventListener(
    "DOMContentLoaded", function(){

        const genBtn = document.getElementById("btn-generate");

        genBtn.addEventListener("click", ()=>{
          
            generating();
            alert("H");
        });

       function generating(){
        const ROOT =  'http://localhost/Bus-Schedule-Management-System/bussched/public'; 
        fetch(`${ROOT}/schedules/scheduleGenerate`, {
          method: "POST",
          credentials: "same-origin",
          mode: "same-origin",
          headers: {
            "Content-Type": "application/json;charset=utf-8",
          },
          body: JSON.stringify({ id: id }),
        })
          .then((res) => res.json())
          .catch((error) => console.log(error))
          .then((data) => {
            console.log(data);
          });
          
       }
      
    
    }


  

    );


        </script>
    </main>

</body>

</html>