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
    <script src="<?= ROOT ?>/assets/js/adminbuses.js"></script>
    <title>Buses</title>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<h1 class="section-header">Buses</h1>
  <section>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Bus No.</th>
            <th>Bus Type</th>
            <th>No. of Seats</th>
            <th>Bus Available?</th>
            <th>Bus Route</th>
            <th>Start</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php static $i = 1; ?>
          <?php foreach ($buses as $bus): ?>
                <tr data-busid= <?= $bus->id ?>>
                  <td> <?= $i ?> </td>
                  <?php $i++; ?>
                  <td data-fieldname="bus_no"><?= $bus->bus_no ?></td>
                  <td data-fieldname="type"><?= $bus->type ?></td>
                  <td data-fieldname="seats_no"><?= $bus->seats_no ?></td>

                    <td data-fieldname="availability">
                       <?php echo $bus->availability ? "Yes" : "No" ?>
                    </td>

                  <td data-fieldname="route"><?= $bus->route ?></td>
                  <td data-fieldname="start"><?= $bus->start ?></td>
                  <td id="edit-delete">
                    <a href=# class='edit-btn'>
                      <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon" width='20px' height='20px'>
                    </a>
                    <a href='<?= ROOT ?>/adminbuses?delete=<?= $bus->id ?>'>
                      <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon" width='20px' height='20px'>
                    </a>
                  </td>
                  <td id="save-cancel">
                    <a href='#' class='save-btn'><img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon" width='20px' height='20px'></a>
                    <a href='#' class='cancel-btn'>
                      <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon" width='20px' height='20px'>
                    </a>
                  </td>
                </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </section>

</body>

</html>