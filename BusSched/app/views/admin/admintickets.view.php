<?php
if (!isset($_SESSION['USER'])) {
  redirect('home');
}
if ($_SESSION['USER']->role == 'passenger') {
  redirect('home');
} else if ($_SESSION['USER']->role == 'driver') {
  redirect('drivers');
} else if ($_SESSION['USER']->role == 'conductor') {
  redirect('conductors');
} else if ($_SESSION['USER']->role == 'scheduler') {
  redirect('schedulers');
} else if ($_SESSION['USER']->role == 'owner') {
  redirect('owners');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
  <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
  <!-- <script src="<?= ROOT ?>/assets/js/adminhalts.js"></script> -->
  <title>Halts</title>
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
    .edit-options, .dummy-row, .dummy-input, .add-options{
      display: none;
    }
  </style>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<div class="section-header"><p>Bus Tickets</p></div>
  <section>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
      <thead>
          <tr>
            <th>#</th>
            <th>Passenger</th>
            <th>Trip ID</th>
            <th>Seats Reserved</th>
            <th>Ticket Number</th>
            <th>Source Halt</th>
            <th>Destination Halt</th>
            <th>Booking Time</th>
            <th>Status</th>
            <th>Passenger Count</th>
            <th>Arrival Time</th>
            <th>Departure Time</th>
            <th>Collected Time</th>
            <th>Price</th>
            <th>Payment Method</th>
            <th><button class="add-halt button-green">Add ticket</button></th>
          </tr>
        </thead>
        <tbody>
          <?php static $i = 1;?>
          <?php if ($tickets): foreach ($tickets as $ticket): ?>
            <tr data-id=<?=$ticket->id?>>
              <td><?= $i++ ?></td>
              <td data-fieldname="passenger"><?= $ticket->passenger ?></td>
                <td data-fieldname="trip_id"><?= $ticket->trip_id ?></td>
                <td data-fieldname="seats_reserved"><?= $ticket->seats_reserved ?></td>
                <td data-fieldname="ticket_number"><?= $ticket->ticket_number ?></td>
                <td data-fieldname="source_halt"><?= $ticket->source_halt ?></td>
                <td data-fieldname="dest_halt"><?= $ticket->dest_halt ?></td>
                <td data-fieldname="booking_time"><?= $ticket->booking_time ?></td>
                <td data-fieldname="status"><?= $ticket->status ?></td>
                <td data-fieldname="passenger_count"><?= $ticket->passenger_count ?></td>
                <td data-fieldname="arrival_time"><?= $ticket->arrival_time ?></td>
                <td data-fieldname="departure_time"><?= $ticket->departure_time ?></td>
                <td data-fieldname="collected_time"><?= $ticket->collected_time ?></td>
                <td data-fieldname="price"><?= $ticket->price ?></td>
                <td data-fieldname="payment_method"><?= $ticket->payment_method ?></td>

              <td id="edit-delete">
                <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
                <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr>
              <td colspan="9" style="text-align:center;color:#999999;"><i>No tickets found.</i></td>
            </tr>
          <?php endif; ?>

          <!-- this row is cloned to collect input for editing and adding rows -->
          <!-- <tr class='dummy-input'>
            <td></td>
            <td data-fieldname="route_id">
              <input type="text" value="" placeholder="Route ID">
            </td>
            <td data-fieldname="name">
              <input type="text" value="" placeholder="Name">
              </td>
            <td data-fieldname="distance_from_source">
              <input type="number" value="" placeholder="Distance">
            </td>
            <td data-fieldname="fare_from_source">
              <input type="number" value="" placeholder="Fare">
            </td>
            <td class='edit-options'>
              <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon save-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-btn" width='20px' height='20px'>
            </td>
            <td class='add-options'>
              <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon add-row-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-add-btn" width='20px' height='20px'>
            </td>
          </tr> -->

          <!-- this row  is cloned and is the actual row that's gonna be added to the table -->
          <!-- <tr class='dummy-row'>
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

        </tbody>
      </div>
      </table>
  </section>

</body>

</html>