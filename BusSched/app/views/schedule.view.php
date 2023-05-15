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
    padding: 8px 20px 10px;
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
            <div><input type="submit" id="btn-generate" class="button-grey" name="gen" value="Generate" onclick="generating(); buttonClicked();"></div>
            <!-- <button type="button" id="data_button">Get Data</button> -->
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
  
</div>
<div class="button-container">
    <button id="delete-button" style="display:none"><i class="fa fa-trash"></i> Delete
    </button>
</div>

<div class="schedule-cards">
   <div class="card piliyandala">
    <div class="card-content">
      <h2>From Piliyandala</h2>
      <div id="data_display"></div>
      <div class="table-container">
        <table border='1' class="styled-table">
          <tr>
            <th>Trip ID</th>
          
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
            <!-- <td data-fieldname="checking">
              <?= "<input type='checkbox' class='delete-checkbox'"?>
            </td> -->
            <!-- <td data-fieldname="starting"> <?= $schedule->starting_place ?> </td> -->
            <td data-fieldname="id"> <?= $schedule->id ?> </td>
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
    </div>
    
    <div class="card-details back">
      <!-- Additional content to be displayed -->
    </div>
    
  </div> 
 

  <div class="card piliyandala">
    <div class="card-content">
      <h2>From Pettah</h2>
      <div class="table-container">
        <table border='1' class="styled-table">
          <tr>
            <th>Trip ID</th>
            
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
            <!-- <td data-fieldname="checking">
              <?= "<input type='checkbox' class='delete-checkbox'"?>
            </td> -->
            <!-- <td data-fieldname="starting"> <?= $schedule->starting_place ?> </td> -->
            <td data-fieldname="id"> <?= $schedule->id ?> </td>
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
      
    </div>
    
    <div class="card-details">
      
    </div>
  </div>
</div>
<table border='1' class="styled-table">
          <tr>
            <th> ID</th>
            
            <th>Bus No</th>
            <th>Breakdown Time</th>
            <th>Status</th>
          </tr>
          <?php static $i = 1; 
          $bObj = json_decode(json_encode($breakdowns), false);
          ?>
          <?php if ($bObj):
          foreach ($bObj as $b): ?>
          <tr data-id=<?= $b->id ?>>
            <?php $i++; 
            if($schedule->starting_place === "Pettah"):
            ?>
            <!-- <td data-fieldname="checking">
              <?= "<input type='checkbox' class='delete-checkbox'"?>
            </td> -->
            <!-- <td data-fieldname="starting"> <?= $schedule->starting_place ?> </td> -->
            <td data-fieldname="id"> <?= $b->id ?> </td>
            <td data-fieldname="bus_no"> <?= $b->bus_no ?> </td>
            <td data-fieldname="departure"> <?= $b->breakdown_time ?> </td>
            <td data-fieldname="arrival"> <?= $b->status ?> </td>
            <?php endif;?>
          </tr>
          <?php endforeach; else: ?>
          <tr>
            <td colspan="9" style="text-align:center;color:#999999;"><i>No schedule found.</i></td>
          </tr>
          <?php endif;?>
        </table>
<div class="date-container">
  <div id="nextDate" class="date"></div>
  
</div>
<div id="sched">
<div id="A">
  <table id="trip-table"></table>
</div>
<div id="B">
  <table id="trip-table"></table>
</div>
</div>


        <script src="<?= ROOT ?>/assets/js/bus.js"></script>
        <script>

var today = new Date();
var year = today.getFullYear();
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var day = ("0" + today.getDate()).slice(-2);
var date = year + "/" + month + "/" + day;
document.querySelector(".date").innerHTML = date;


        

        // const btnGen = document.getElementById("btn-generate");
// const cards = document.querySelectorAll('.card');

// cards.forEach(card => {
//   btnGen.addEventListener('click', () => {
//     card.classList.toggle('flipped');
//   });
// });
const myButton = document.getElementById("btn-generate");



function buttonClicked() {
  const currentTime = new Date().getTime();
  myButton.style.display = "none"; // hide the button
  localStorage.setItem("lastClickTime", currentTime); // store the current click time in local storage
  setTimeout(function() {
    myButton.style.display = "block"; // show the button after 24 hours
    localStorage.removeItem("lastClickTime"); // remove the stored click time from local storage
  }, 24 * 60 * 60 * 1000);
}

// window.addEventListener("load", function() {
//   const lastClickTime = localStorage.getItem("lastClickTime"); // retrieve last click time from local storage
//   if (lastClickTime) {
//     const elapsedTime = new Date().getTime() - lastClickTime;
//     if (elapsedTime < 24 * 60 * 60 * 1000) {
//       myButton.style.display = "none"; // hide the button if less than 24 hours have passed
//       setTimeout(function() {
//         myButton.style.display = "block"; // show the button after 24 hours have passed
//         localStorage.removeItem("lastClickTime"); // remove the stored click time from local storage
//       }, 24 * 60 * 60 * 1000 - elapsedTime);
//     } else {
//       localStorage.removeItem("lastClickTime"); // remove the stored click time from local storage
//     }
//   }
// });

function generating(){
  const ROOT =  'http://localhost/Bus-Schedule-Management-System/bussched/public'; 

  fetch(`${ROOT}/schedules/generate`, {
        method: "POST",
        credentials: "same-origin",
        mode: "same-origin",
        headers: {
          "Content-Type": "application/json;charset=utf-8",
        },
        body: JSON.stringify(),
      })
        .then((res) => res.json())
        .catch((error) => console.log(error))
        .then((data) => {
          console.log(data[0]);
          console.log(data[1]);
          // Get a reference to the table where the list will be displayed
          document.querySelector("#nextDate").innerHTML = data[1];
const mainDiv = document.getElementById("sched");
mainDiv.classList.add("schedule-cards");
const divA = document.getElementById('A');
divA.classList.add("card");
divA.classList.add("piliyandala");
const table = document.getElementById('trip-table');
table.classList.add("styled-table");
// Create a header row for the table
const headerRow = document.createElement('tr');

// Create header cells for each column in the table
const startHeader = document.createElement('th');
startHeader.textContent = 'Starting';
headerRow.appendChild(startHeader);

const busNoHeader = document.createElement('th');
busNoHeader.textContent = 'Bus No';
headerRow.appendChild(busNoHeader);

const DepartureHeader = document.createElement('th');
DepartureHeader.textContent = 'Departure';
headerRow.appendChild(DepartureHeader);

const arrivalHeader = document.createElement('th');
arrivalHeader.textContent = 'Arrival';
headerRow.appendChild(arrivalHeader);


table.appendChild(headerRow);


data[0].forEach(bus => {
  
  const row = document.createElement('tr');
  if(bus.starting_place === "Piliyandala"){
   
  const startcell = document.createElement('td');
  startcell.textContent = bus.starting_place;
  row.appendChild(startcell);

  const busNocell = document.createElement('td');
  busNocell.textContent = bus.bus_no;
  row.appendChild(busNocell);

  const departureCell = document.createElement('td');
  departureCell.textContent = bus.departure_time;
  row.appendChild(departureCell);

  const arrivalCell = document.createElement('td');
  arrivalCell.textContent = bus.arrival_time;
  row.appendChild(arrivalCell);

  // Add the row to the table
  table.appendChild(row);
  }
});
  divA.appendChild(table);
  mainDiv.appendChild(divA);

const divB = document.getElementById('B');
divB.classList.add("card");
divB.classList.add("pettah");
const table2 = document.getElementById('trip-table');
table2.classList.add("styled-table");
// Create a header row for the table
const headerRow2 = document.createElement('tr');

// Create header cells for each column in the table
const startHeader2 = document.createElement('th');
startHeader2.textContent = 'Starting';
headerRow2.appendChild(startHeader2);

const busNoHeader2 = document.createElement('th');
busNoHeader2.textContent = 'Bus No';
headerRow2.appendChild(busNoHeader2);

const DepartureHeader2 = document.createElement('th');
DepartureHeader2.textContent = 'Departure';
headerRow2.appendChild(DepartureHeader2);

const arrivalHeader2 = document.createElement('th');
arrivalHeader2.textContent = 'Arrival';
headerRow2.appendChild(arrivalHeader2);


table2.appendChild(headerRow2);


data[0].forEach(bus => {
  
  const row = document.createElement('tr');
  if(bus.starting_place === "Pettah"){
   
  const startcell = document.createElement('td');
  startcell.textContent = bus.starting_place;
  row.appendChild(startcell);

  const busNocell = document.createElement('td');
  busNocell.textContent = bus.bus_no;
  row.appendChild(busNocell);

  const departureCell = document.createElement('td');
  departureCell.textContent = bus.departure_time;
  row.appendChild(departureCell);

  const arrivalCell = document.createElement('td');
  arrivalCell.textContent = bus.arrival_time;
  row.appendChild(arrivalCell);

  // Add the row to the table
  table2.appendChild(row);
  }
});
  divB.appendChild(table2);
  
  mainDiv.appendChild(divB);

  alert("Successfully generated");
        });
}

//             // using jQuery
// $(document).ready(function() {
//   const ROOT =  'http://localhost/Bus-Schedule-Management-System/bussched/public'; 
//   let path = ROOT+'Schedules.php';  
//   $('#data_button').click(function() {
//             $($data_display).load(path);        
//         });
//     });



// function nextDaySchedule(){
//   alert("Hey");
// }
 // Get all the checkboxes with class 'delete-checkbox'



        </script>
    </main>

</body>

</html>