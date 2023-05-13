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
    <!-- <script src="<?= ROOT ?>/assets/js/adminratings.js"></script> -->
    <title>Ratings</title>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<div class="section-header"><p>User Ratings</p></div>
  <section>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Rater ID</th>
            <th>Trip ID</th>
            <th>Bus No</th>
            <th>Bus Rating</th>
            <th>Conductor ID</th>
            <th>Conductor Rating</th>
            <th>Driver ID</th>
            <th>Driver Rating</th>
            <th></th>
          </tr>
        </thead>
      <!-- </table> -->
    <!-- </div> -->
    <!-- <div class="tbl-content"> -->
      <!-- <table cellpadding="0" cellspacing="0" border="0"> -->
        <tbody>
          <?php static $i = 1; ?>
          <?php if ($ratings): foreach ($ratings as $rating): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $rating->rater ?></td>
              <td><?= $rating->trip_id ?></td>
              <td><?= $rating->bus_no ?></td>
              <td><?= $rating->bus_rating ?></td>
              <td><?= $rating->conductor ?></td>
              <td><?= $rating->conductor_rating ?></td>
              <td><?= $rating->driver ?></td>
              <td><?= $rating->driver_rating ?></td>
              <td>
                <a href='<?= ROOT ?>/adminratings?delete=<?= $rating->id ?>'>
                    <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon" width='20px' height='20px'>
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