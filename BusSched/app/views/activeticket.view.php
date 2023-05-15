<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php';?>

    <title>Bus Tickets</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <!-- <script src="<?= ROOT ?>/assets/js/collecttickets.js"></script> -->
    <!-- <style>
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

  
      table tr:not(:first-child){
        cursor:pointer;transition: all.25s ease-in-out;
      }
  

      table tr:not(:first-child){
        cursor:pointer;transition: all.25s ease-in-out;
      }
     
  
   
  </style> -->



</head>

<body>
<?php include 'components/navbarcon.php'; 
        // include 'components/conductorsidebar.php';
?>

<?php 
        $conductor = $_SESSION['USER']->username;
        $bus = new Bus();
        $businfo = $bus->getConductorBuses($conductor)[0];
        $busno = $businfo->bus_no;
        $trip = new Trip();
        $trips = $trip->getBusTrips($busno);
        
        $starting_trip = null;
        foreach ($trips as $trip) {
            if ($trip->status == "notstarted") {
                $starting_trip = $trip;
                break;
            }
        }
        
        if ($starting_trip) {
            $trip_id = $starting_trip->id;
            // rest of your code
        } else {
            // handle the case where no starting trip is found
        }
        
                 // $trip_id=$starting_trip->id;
            
            // show($trip_id);
        ?>


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

        <div class="data-table"></div>
        <div class="selection">
                 
        </div>
      

     

        <?php
     

     $bus = new Bus();
     $businfo = $bus->getConductorBuses($conductor)[0];
     $busno = $businfo->bus_no;

    // $trip = new Trip();
    // $trips = $trip->getBusTrips($busno);

    $ticket = new E_ticket();
    $tickets=$ticket->getTripBusTickets($busno);

?>
        <div class="col-2">
            <table border='1' class="styled-table" id="tickets">
                <tr>
                    <th>Passenger</th>
                    <th>Trip_id</th>
                    <th>seat_no</th>
                    <th>ticket_no</th>
                     <th></th>
            </tr> 

            <?php 
            if (!empty($tickets)):
                foreach ($tickets as $ticket):
                    if ($ticket->status == 'booked'): ?>
                        <tr>
                        <td data-fieldname="passenger"><?= $ticket->passenger ?></td>
                        <td data-fieldname="trip_id"><?= $ticket->trip_id ?></td>
                        <td data-fieldname="seat_no"><?= $ticket->seat_number ?></td>
                        <td data-fieldname="ticket_number"><?= $ticket->ticket_number ?></td>
                        <?php ?>
                        <td class="collect-ticket-btn">
                            <button class="button-green">Collect</button>
                        </td>
                        </tr>
                    <?php endif;
                endforeach;
            else: ?>
                <tr>
                    <td id="no-active-tickets" colspan="4">No Active Tickets Found</td>
                </tr>
            <?php endif; ?>


  </table>
  
  </div>   
  
 

        <script src="<?= ROOT ?>/assets/js/activetickets.js"></script>

    </main>

</body>

</html>