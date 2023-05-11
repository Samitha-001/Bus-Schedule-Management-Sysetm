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
    <?php include '../app/views/components/head.php';?>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
    <script src="<?= ROOT ?>/assets/js/adminusers.js"></script>
    <title>Users</title>
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
            <th>#</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Role</th>
            <th><button class="add-user button-green">Add User</button></th>
          </tr>
        </thead>
        <tbody>
        <?php static $i = 1; ?>
        <?php if ($users):
          foreach ($users as $user): ?>
              <tr data-id=<?= $user->id ?>>
                <td><?= $i++ ?></td>
                <td data-fieldname="id"><?= $user->id ?></td>
                <td data-fieldname="username"><?= $user->username ?></td>
                <td data-fieldname="email"><?= $user->email ?></td>
                <td data-fieldname="role"><?= $user->role ?></td>
          
                <td id="edit-delete"> 
                  <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
                  <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
                </td>
              </tr>
          <?php endforeach; else: ?>
            <tr>
              <td colspan="9" style="text-align:center;color:#999999;"><i>No users found.</i></td>
            </tr>
        <?php endif; ?>

        <!-- this row is cloned to collect input for editing and adding rows -->
        <tr class='dummy-input'>
            <td></td>
            <td></td>
            <!-- <td data-fieldname="id">
              <input type="text" value="" placeholder="Route ID">
            </td> -->
            <td data-fieldname="username">
              <input type="text" value="" placeholder="Username">
              </td>
            <td data-fieldname="email">
              <input type="email" value="" placeholder="Email">
            </td>
            <!-- add select dropdown for role -->
            <td data-fieldname="role">
              <!-- select options -->
              <select name="role" id="role">
                <option value="passenger">passenger</option>
                <option value="driver">driver</option>
                <option value="conductor">conductor</option>
                <option value="scheduler">scheduler</option>
                <option value="owner">owner</option>
                <option value="admin">admin</option>
              </select>
              <!-- <input type="select" value="" placeholder="Fare"> -->
            </td>
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
            <td></td>
            <td>
              <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn" width='20px' height='20px'>
              <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn" width='20px' height='20px'>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>


</body>

</html>