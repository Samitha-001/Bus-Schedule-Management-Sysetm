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
    <title>Buses</title>
</head>

<body>
<?php
  include '../app/views/components/navbar.php';
  include '../app/views/components/adminsidebar.php';
?>

  <section>
    <h1>Buses</h1>
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
        <?php
          static $i = 1;
          foreach ($buses as $bus) {
              echo "<tr>";
              // bus counter
              echo "<td> $i </td>";
              $i++;
              // echo "<td> $bus->id </td>";
              echo "<td> $bus->bus_no </td>";
              echo "<td> $bus->type </td>";
              echo "<td> $bus->seats_no </td>";
              // if bus is available
              if ($bus->availability) {
                  echo "<td> Yes </td>";
              } else {
                  echo "<td> No </td>";
              }
              echo "<td> $bus->route </td>";
              echo "<td> $bus->start </td>";
              
              // edit icon
              echo "<td> <a href=#> <img src='" . ROOT . "/assets/images/icons/edit.png' alt='edit' width='20px' height='20px'> </a>";
              // delete icon
              echo "<a href='" . ROOT . "/adminbuses?delete=$bus->id'> <img src='" . ROOT . "/assets/images/icons/delete.png' alt='delete' width='20px' height='20px'> </a> </td>";

              echo "</tr>";
          } ?>
        </tbody>
      </table>
    </div>
  </section>

</body>

</html>