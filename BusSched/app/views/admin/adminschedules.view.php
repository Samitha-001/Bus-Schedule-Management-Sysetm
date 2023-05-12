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
    <?php include '../app/views/components/head.php'; ?>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
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
        label{
            color: #ffffff;
            font-size: large;
        }

    </style>
</head>

<body>
<?php
include '../app/views/components/navbar.php';
include '../app/views/components/adminsidebar.php';
?>

<div class="section-header d-flex justify-content-space-between">
    <div class="w-50">
        <p>Bus Schedules</p>
    </div>
    <div class="w-50">
        <label for="s-date">Date</label>
        <input type="date" id="s-date" class="form-control w-25" value="<?= date('Y-m-d') ?>">
        <label class="ml-5" for="s-source">Source</label>
        <select id="s-source" class="w-25 form-control">
            <option value="Pettah">Pettah</option>
            <option value="Piliyandala">Piliyandala</option>
        </select>
    </div>
</div>
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
            <?php static $i = 1; ?>
            <?php if ($schedules): foreach ($schedules as $schedule): ?>
                <tr data-id=<?= $schedule->id ?>>
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
                        <img src='<?= ROOT ?>/assets/images/icons/edit.png' alt='edit' class="icon edit-btn"
                             width='20px' height='20px'>
                        <img src='<?= ROOT ?>/assets/images/icons/delete.png' alt='delete' class="icon delete-btn"
                             width='20px' height='20px'>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="9" style="text-align:center;color:#999999;"><i>No schedules found.</i></td>
                </tr>
            <?php endif; ?>

            </tbody>
    </div>
    </table>
</section>

</body>

</html>
<script>
    // filter rows based on source and date
    let sourceFilter = document.getElementById('s-source');
    let dateFilter = document.getElementById('s-date');

    sourceFilter.addEventListener('change', filterRows);
    dateFilter.addEventListener('change', filterRows);

    function filterRows() {
        let source = sourceFilter.value;
        let date = dateFilter.value;
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let sourceCell = row.querySelector('td[data-fieldname="starting_halt"]');
            let dateCell = row.querySelector('td[data-fieldname="trip_date"]');
            if (source == '' && date == '') {
                row.style.display = 'table-row';
            } else if (source == '') {
                if (dateCell.innerText == date) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            } else if (date == '') {
                if (sourceCell.innerText == source) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            } else if (sourceCell.innerText == source && dateCell.innerText == date) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    //dispatch event to date change
    let event = new Event('change');
    dateFilter.dispatchEvent(event);

</script>
