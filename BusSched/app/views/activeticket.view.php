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

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <!-- <script src="<?= ROOT ?>/assets/js/collecttickets.js"></script> -->
    <style>
    td input[disabled] {
      border: none;
      background-color: transparent;
      padding: 0;
      margin: 0;
      width: 100%;
      height: 100%;
      text-align: inherit;
      font-size: inherit;
      font-family: inherit;
      color: inherit;
      cursor: default;
    }
   
  </style>



</head>

<body>
<?php include 'components/navbarcon.php'; 
        // include 'components/conductorsidebar.php';
?>


    <!-- <nav class="navbar">
        <div>
            <h2><a href="<?= ROOT ?>/admins" id="logo-white">BusSched</a></h2>
        </div>
        <ul class="nav-links">
            <div class="menu">
                <a href="<?= ROOT ?>/admins">
                    <li><img src="<?= ROOT ?>/assets/images/profile-icon.png" class="nav-bar-img"></li>
                </a>
                <a href="<?= ROOT ?>/logout">
                <li class="signup-button" style="margin-left:7px"><a href="<?= ROOT ?>/login">Logout</a></li>
                </a>
            </div>
        </ul>
    </nav> -->

    <!-- <div class="wrapper">
        <div class="sidebar">
            <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li> -->
            <!--<li><a href="" style="color:#9298AF;">Location</a></li>-->
            <!-- <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li> -->
            <!-- <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Ratings</a></li>
            <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <li><a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a></li>
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
        </div>
    </div> -->

    <main class="container1">
    <div class="col-1">
        <div class="header orange-header">
        <table >
                <tr>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/activetickets" >Active Tickets</a></th>
                    <th style="padding-left:60px"><a href="<?= ROOT ?>/collectedtickets" >Collected Tickets</a></th>
                </tr>
                
            </table>  
            
        </div>
        </div>

        <div class="data-table">
        <div class="selection">
                 
        </div>
        <div class="col-2">
            <table border='1' class="styled-table" id="tickets">
                <tr>
                    <th>Passenger</th>
                    <th>Trip_id</th>
                    <th>seat_no</th>
                    <th>ticket_no</th>
                     
                    

                </tr>



    <?php
    $conductor = $_SESSION['USER']->username;

    $bus = new Bus();
    $businfo = $bus->getConductorBuses($conductor)[0];
    $busno = $businfo->bus_no;

    $trip = new Trip();
    $trips = $trip->getBusTrips($busno);

    $ticket = new E_ticket();
    $status = 'booked';

    foreach ($trips as $trip) {
        $tripid = $trip->id;
        $activeTickets = $ticket->getBusActiveTickets($status, $tripid);

        foreach ($activeTickets as $ticketstatus) {
            echo "<tr>";
            echo "<td> $ticketstatus->passenger </td>";
            echo "<td> $ticketstatus->trip_id </td>";

            if ($ticketstatus->seat_number === NULL) {
                $ticketstatus->seat_number = "No";
                echo "<td> $ticketstatus->seat_number </td>";
            } else {
                echo "<td> $ticketstatus->seat_number</td>";
            }
            
            echo "<td> $ticketstatus->ticket_number</td>";
            echo '<td id="Collect"> Collect </td>';
           
            echo "</tr>";
           
        }
    }

?>

            </table>
        </div>
        </div>

        <div id="popupWindow" style="display:none;">
  <!-- Popup window content goes here -->
</div>

<!-- <script>
  const table = document.getElementById("tickets");
  const popupWindow = document.getElementById("popupWindow");

  // Add event listener to each row in the table
  table.querySelectorAll("tr").forEach(row => {
    row.addEventListener("click", () => {
      // Extract data from the clicked row
      const ticketNo = row.querySelector("td:nth-child(4)").textContent;

      //<?php
        //$ticket = new E_ticket();
       // $arr['ticketdetails'] = $ticket->getTicket($ticketNo);
      ?>

      // Show popup window
      popupWindow.style.display = "block";

      // Fill in the data
      popupWindow.querySelector("#passenger").textContent = "<?php echo $arr['ticketdetails'][0]->passenger; ?>";
      popupWindow.querySelector("#trip-id").textContent = "<?php echo $arr['ticketdetails'][0]->trip_id; ?>";
      popupWindow.querySelector("#seat-no").textContent = "<?php echo $arr['ticketdetails'][0]->seat_no; ?>";
      popupWindow.querySelector("#ticket-no").textContent = "<?php echo $arr['ticketdetails'][0]->ticket_no; ?>";
    });
  });

  function closePopup() {
    // Hide popup window
    popupWindow.style.display = "none";
  }
</script> -->

<div id="popupWindow"></div>

<script>
  const table = document.getElementById("tickets");
  const popupWindow = document.getElementById("popupWindow");

  // Define the closePopup function
  function closePopup() {
    popupWindow.style.display = "none";
  }

  // Add event listener to each row in the table
  table.querySelectorAll("tr").forEach(row => {
    row.addEventListener("click", () => {
      // Extract data from the clicked row
      const passenger = row.querySelector("td:nth-child(1)").textContent;
      const tripId = row.querySelector("td:nth-child(2)").textContent;
      const seatNo = row.querySelector("td:nth-child(3)").textContent;
      const ticketNo = row.querySelector("td:nth-child(4)").textContent;

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Log the response from the PHP script
          console.log(this.responseText);
        }
      };
      xhr.open("POST", "activeticket.view.php");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("ticketNo=" +ticketNo );
      // Display data in the popup window
      popupWindow.innerHTML = `
        <h2>Passenger Details</h2>
        <p><strong>Passenger:</strong> ${passenger}</p>
        <p><strong>Trip ID:</strong> ${tripId}</p>
        <p><strong>Seat No:</strong> ${seatNo}</p>
        <p><strong>Ticket No:</strong> ${ticketNo}</p>
        <button onclick="closePopup()">Close</button>
      `;

      // Show the popup window
      popupWindow.style.display = "block";
    });
  });
</script>

<?php
      // Retrieve the value of the myVariable parameter from the AJAX request
      if (isset($_POST["ticketNo"])) {
        $ticketNo = $_POST["ticketNo"];
        echo "<p>ticketNo = $ticketNo</p>";
      }
    ?>
        <script src="<?= ROOT ?>/assets/js/bus.js"></script>

    </main>

</body>

</html>