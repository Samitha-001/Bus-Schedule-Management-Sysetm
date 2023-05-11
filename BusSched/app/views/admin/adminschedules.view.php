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

<div class="section-header"><p>Bus Schedules</p></div>
  <section>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
      <thead>
          <tr>
            <!-- <th>#</th> -->
            <th>Trip ID</th>
            <th>Date</th>
            <th>Departure time</th>
            <th>Source halt</th>
            <th>Bus no</th>
            <th>Status</th>
            <th>Last updated halt</th>
            <th>Time updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php static $i = 1;?>
          <?php if ($schedules): foreach ($schedules as $schedule): ?>
            <tr data-id=<?=$schedule->id?>>
              <!-- <td><?= $i++ ?></td> -->
              <td data-fieldname="id"><?= $schedule->id ?></td>
                <td data-fieldname="trip_date"><?= $schedule->trip_date ?></td>
                <td data-fieldname="departure_time"><?= $schedule->departure_time ?></td>
                <td data-fieldname="starting_halt"><?= $schedule->starting_halt ?></td>
                <td data-fieldname="bus_no"><?= $schedule->bus_no ?></td>
                <td data-fieldname="status"><?= $schedule->status ?></td>
                <td data-fieldname="last_updated_halt"><?= $schedule->last_updated_halt ?></td>
                <td data-fieldname="location_updated_time"><?= $schedule->location_updated_time ?></td>


              <td id="edit-delete">
                <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
                <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr>
              <td colspan="9" style="text-align:center;color:#999999;"><i>No schedules found.</i></td>
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