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
    
    <script src="<?= ROOT ?>/assets/js/adminbreakdowns.js"></script>
    <title>Breakdowns</title>
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

<h1 class="section-header">Breakdowns</h1>
  <section>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <!-- `id``bus_no``description``time_to_repair` -->
            <th>#</th>
            <th>Bus No.</th>
            <th>Description</th>
            <th>Time to Repair</th>
            <th><button class="add-breakdown button-green">Add New</button></th>
          </tr>
        </thead>
        <tbody>
        <?php static $i = 1; ?>
             <?php if ($breakdowns):
               foreach ($breakdowns as $breakdown): ?>
                <tr data-id=<?= $breakdown->id ?>>
                    <td> <?= $i ?> </td>
                    <?php $i++; ?>
                    <td data-fieldname="bus_no"> <?= $breakdown->bus_no ?> </td>
                    <td data-fieldname="description"> <?= $breakdown->description ?> </td>
                    <td data-fieldname="time_to_repair"> <?= $breakdown->time_to_repair ?> </td>

                    <td id="edit-delete"> 
                      <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
                      <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
                    </td>
                  </tr>
              <?php endforeach; else: ?>
                <tr>
                  <td colspan="9" style="text-align:center;color:#999999;"><i>No breakdowns found.</i></td>
                </tr>
        <?php endif; ?>
        
        <!-- this row is cloned to collect input for editing and adding rows -->
        <tr class='dummy-input'>
          <td></td>
          <td data-fieldname='bus_no'><input type='text' placeholder='Bus No'></td>
          <td data-fieldname='description'><input type='text' placeholder='Description'></td>
          <td data-fieldname='time_to_repair'><input type="text" pattern="[0-9]{2}:[0-5][0-9]:[0-5][0-9]" placeholder='Time to repair'></td>

          <td class='edit-options'>
            <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon save-btn" width='20px' height='20px'>
            <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-btn" width='20px' height='20px'>
          </td>
          <td class='add-options'>
            <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon add-row-btn" width='20px' height='20px'>
            <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-add-btn" width='20px' height='20px'>
          </td>
        </tr>
        
        <!-- this row  is cloned and is the actual row that's gonna be added to the table -->
        <tr class='dummy-row'>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
            <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
          </td>

        </tbody>
      </table>
    </div>
  </section>

</body>

</html>