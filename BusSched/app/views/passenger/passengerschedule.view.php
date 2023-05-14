
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Bus Schedule</title>
    <?php include '../app/views/components/head.php';?>

    <link href="<?= ROOT ?>/assets/css/ticket.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/schedule.js"></script>
</head>

<body>
    <?php
    include '../app/views/components/navbar.php';
    // get from and to from link if they exist
    $from = $_GET['from'] ?? '';
    $to = $_GET['to'] ?? '';
    // current date
    $date = date('Y-m-d');
    ?>

    <!-- get halt list to suggest halt list -->
    <datalist id="halt-list">
        <?php
        $halt = new Halt();
        $halts = $halt->getHalts();
        $len = count($halts);
        for ($i = 0; $i < $len; $i++) {
            $halt = $halts[$i];
            echo "<option value='" . $halt->name . "'>";
        }
        ?>
    </datalist>

    <div class="search-bar" style="padding: 10px;">
        <div id="from-to" class="from-to">
                <input type="text" name="from" id="from" placeholder="From" <?php if ($from) echo "value=".$from; ?> list="halt-list" required>
                <input type="text" name="to" id="to" placeholder="To" <?php if ($to) echo "value=".$to; ?> list="halt-list" required>
                <input type="date" name="date" id="date" placeholder="Date" <?php if ($date) echo "value=".$date; ?> min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>
            <button class="button-orange" style="width:55.5%; margin-top:4.5px; font-size:13px;" id="find-trip-btn">Find</button>
        </div>
    </div>

    <div class="row">
        <div class="col-10 col-s-10" style="margin: auto; padding:0px;">
            <table id="schedule-table" style="width: 100%; font-size: 12px;">
                <tr>
                    <th>Trip ID</th> <!-- comment later -->
                    <th>Trip starts</th>
                    <th>Start</th>
                    <th>Src</th>
                    <th>Time to reach (src)</th>
                    <th>Dest</th>
                    <th>Time to reach (dest)</th>
                    <th>Bus No</th>
                    <th>Bus Type</th>
                    <!-- <th>Price</th> -->
                    <th>Last Passed</th>
                    <th>Book</th>
                </tr>
                <?php if ($trips):
                foreach ($trips as $trip):
                // shows only trips that are not ended
                if ($trip->status != "ended") { ?>

                <tr data-id = <?= $trip->id ?> class='data-row'>
                <?php
                $tripx = new Bus();
                $bus = $tripx->getBus($trip->bus_no);
                ?>
                <td><?= $trip->id ?></td>
                    <td data-fieldname="trip_date"><span data-fieldname="trip_date_val"><?= $trip->trip_date ?></span>&nbsp&nbsp&nbsp|&nbsp&nbsp<span data-fieldname="departure_time"><?= $trip->departure_time ?></span></td>
                    <td data-fieldname="starting_halt"><?= $trip->starting_halt ?></td>
                    <td data-fieldname="from">-</td>
                    <td data-fieldname="estimated_time_from"></td>
                    <td data-fieldname="to">-</td>
                    <td data-fieldname="estimated_time_to"></td>
                    <td data-fieldname="bus_no"><?= $trip->bus_no ?></td>
                    <td data-fieldname="bus_type"><?= $bus->type ?></td>
                    <!-- <td data-fieldname="price">-</td> -->
                    <td data-fieldname="last_updated">
                        <?php if ($trip->last_updated_halt)
                            echo "$trip->last_updated_halt";
                        else
                            echo "Trip hasn't started yet" ?>
                    </td>
                    <td class="buy-ticket-btn">
                        <?php if (isset($_SESSION['USER'])) {?>
                            <a><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:30px"></a>
                        <?php
                        } else { ?>
                            <a href="<?= ROOT ?>/login"><img src="<?= ROOT ?>/assets/images/icons/buyticket-icon.png" alt="Buy Ticket" style="height:30px"></a>
                        <?php }
                        ?>
                    </td>
                </tr>
                <?php } endforeach; else:?>
                <tr>
                    <td colspan="9" style="text-align:center;color:#999999;"><i>Sorry! No matches found.</i></td>
            </tr>
          <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>