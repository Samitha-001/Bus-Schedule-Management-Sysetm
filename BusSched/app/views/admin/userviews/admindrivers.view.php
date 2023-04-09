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
    <script src="<?= ROOT ?>/assets/js/adminusers/admindrivers.js"></script>
    <title>Drivers</title>
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
  include '../app/views/components/adminusersnavbar.php';
?>
  <section>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
          <!-- `owner`(`username`, `name`, `phone`, `address`) -->
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>License No</th>
            <th>Assigned Bus</th>
            <th>Date of Birth</th>
          </tr>
        </thead>
        <tbody>
        <?php static $i = 1; ?>
        <?php if ($users):
          foreach ($users as $user): ?>
            <tr data-username=<?= $user->username ?>>
              <td><?= $i++ ?></td>
              <td data-fieldname="username"><?= $user->username ?></td>
              <td data-fieldname="email"><?= $user->email ?></td>
              <td data-fieldname="name"><?= $user->name ?></td>
              <td data-fieldname="phone"><?= $user->phone ?></td>
              <td data-fieldname="address"><?= $user->address ?></td>
              <td data-fieldname="licence_no"><?= $user->licence_no ?></td>
              <td data-fieldname="assigned_bus"><?= $user->assigned_bus ?></td>
              <td data-fieldname="date_of_birth"><?= $user->date_of_birth ?></td>

              <td id="edit-delete"> 
                <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr>
              <td colspan="9" style="text-align:center;color:#999999;"><i>No drivers found.</i></td>
            </tr>
        <?php endif; ?>

        <!-- this row is cloned to collect input for editing rows -->
        <tr class='dummy-input'>
            <td data-fieldname="rowno"></td>
            <td data-fieldname="username"></td>
            <td data-fieldname="email"></td>
            <td data-fieldname="name">
              <input type="text" value="" placeholder="Name">
            </td>
            <td data-fieldname="phone">
              <input type="text" value="" placeholder="Phone">
            </td>
            <td data-fieldname="address">
              <input type="text" value="" placeholder="Address">
            </td>
            <td data-fieldname="licence_no">
              <input type="text" value="" placeholder="Licence no.">
            </td>
            <td data-fieldname="assigned_bus">
              <input type="text" value="" placeholder="Assigned bus">
            </td>
            <td data-fieldname="date_of_birth">
              <input type="date" value="" placeholder="DOB" min="<?php echo date('Y-m-d', strtotime('-100 years')); ?>" max="<?php echo date('Y-m-d', strtotime('-5 years')); ?>">
            </td>

            <td class='edit-options'>
              <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon save-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon cancel-btn" width='20px' height='20px'>
            </td>
          </tr>

          <!-- this row  is cloned and is the actual row that's gonna be added to the table -->
          <tr class='dummy-row'>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

</body>

</html>