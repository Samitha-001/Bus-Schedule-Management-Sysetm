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
    <title>Breakdowns</title>
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
            foreach ($breakdowns as $breakdown) {
                echo "<tr>";
                echo "<td> $i </td>";
                $i++;
                echo "<td> $breakdown->bus_no </td>";
                echo "<td> $breakdown->description </td>";
                echo "<td> $breakdown->time_to_repair </td>";

                // edit icon
                echo "<td> <a href=#> <img src='" . ROOT . "/assets/images/icons/edit.png' alt='edit' width='20px' height='20px'> </a>";
                // delete icon
                echo "<a href='" . ROOT . "/adminbuses?delete=$breakdown->id'> <img src='" . ROOT . "/assets/images/icons/delete.png' alt='delete' width='20px' height='20px'> </a> </td>";

                echo "</tr>";
            } ?>
        </tbody>
      </table>
    </div>
  </section>

</body>

</html>