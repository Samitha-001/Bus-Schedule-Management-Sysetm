<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Ticket</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <link href="<?= ROOT ?>/activetickets">
    
</head>

<body>
<?php include 'components/navbarcon.php'; 
        // include 'components/conductorsidebar.php';
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

        $ticket_number=$_GET['ticketID'];
        $ticket = new E_ticket();
        $activeTickets=$ticket->first(['ticket_number'=>$ticket_number]);
  ?>

<div class="data-table" id="view_ticket">
  <div class="col-2">
    <table class="styled-table">
      <tr>
        <th>Passenger; </th>
        <td><?php echo $activeTickets->passenger ?></td>
      </tr>
      <tr>
        <th>Trip ID: </th>
        <td><?php echo $activeTickets->trip_id ?></td>
      </tr>
      <tr>
        <th>Seat Number: </th>
        <td><?php echo $activeTickets->seat_number ?></td>
      </tr>
      <tr>
        <th>Ticket Number </th>
        <td><?php echo $activeTickets->ticket_number ?></td>
      </tr>
      <tr>
        <th>Source Halt: </th>
        <td><?php echo $activeTickets->source_halt ?></td>
      </tr>
      <tr>
        <th>Destination Halt: </th>
        <td><?php echo $activeTickets->dest_halt ?></td>
      </tr>
      <tr>
        <th>Number of Passengers: </th>
        <td><?php echo $activeTickets->passenger_count ?></td>
      </tr>
      <tr>
        <th>Booking Time: </th>
        <td><?php echo $activeTickets->booking_time ?></td>
      </tr>
    </table>
  </div>
</div> 

<form id="form1" method="post" action="<?=ROOT?>/collecttickets/collectTicket/<?=$activeTickets->id?>">
<?php
?>
  <input type="hidden" display="none" name="ticket_id" value="<?php echo($activeTickets->id) ; ?>">
  <button id="btn3" class="button-green" type="submit" name="Collect">Collect</button>
</form>    

<button id="cancel-button" onclick="cancel()">Cancel</button>
       <script src="<?= ROOT ?>/assets/js/activetickets.js"></script> 

    </main>

</body>

</html>