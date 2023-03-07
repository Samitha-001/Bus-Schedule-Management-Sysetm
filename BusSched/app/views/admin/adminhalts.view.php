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
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<h1 class="section-header">Bus Halts</h1>
  <section>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <!-- halts table
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `route_id` varchar(6) NOT NULL,
            `name` varchar(50) NOT NULL UNIQUE,
            `distance_from_source` float NOT NULL,
            `fare_from_source` float NOT NULL,
        -->
      <thead>
          <tr>
            <th>#</th>
            <th>Route ID</th>
            <th>Name</th>
            <th>Distance from Source</th>
            <th>Fare from Source</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php static $i = 1; ?>
          <?php if ($halts): foreach ($halts as $halt): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $halt->route_id ?></td>
                <td><?= $halt->name ?></td>
                <td><?= $halt->distance_from_source ?></td>
                <td><?= $halt->fare_from_source ?></td>
                <td id="edit-delete">
                    <a href=# class='edit-btn'>
                        <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon" width='20px' height='20px'>
                    </a>
                    <a href='<?= ROOT ?>/adminhalts?delete=<?= $halt->id ?>'>
                        <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon" width='20px' height='20px'>
                    </a>
                </td>
                <td id="save-cancel">
                    <a href='#' class='save-btn'>
                      <img src='<?= ROOT ?>/assets/images/icons/save.png' alt='save' class="icon" width='20px' height='20px'>
                    </a>
                    <a href='#' class='cancel-btn'>
                      <img src='<?= ROOT ?>/assets/images/icons/cancel.png' alt='cancel' class="icon" width='20px' height='20px'>
                    </a>
                </td>
            </tr>
          <?php endforeach; else: ?>
            <tr>
              <td colspan="9" style="text-align:center;color:#999999;"><i>No ratings found.</i></td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>
    </div>
  </section>

</body>

</html>