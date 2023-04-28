<?php
if (!isset($_SESSION['USER'])) {
    redirect('login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets</title>
    <link href="<?= ROOT ?>/assets/css/ticket.css" rel="stylesheet">
</head>

<body>
    <?php
    include '../app/views/components/navbar.php';

    $user = $_SESSION['USER'];
    $passenger = new Passenger();
    $passenger = $passenger->getPassenger($user->username)[0];
    
    $trip = new Trip();
    if(isset($_GET['tripid'])){
        $tripid = $_GET['tripid'];
        $data['id'] = $tripid;
        $trip = $trip->getTrip($data);
    }
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
        <h3 id="buy-tickets-title">Buy ticket</h3>
    </div>
    <div class="row" style="justify-content:center">
        <div class="ticket" id="book-ticket">
            <div class="ticket-body" style="padding:15px 30px 30px;">
                <table>
                    <tr>
                        <th colspan='3' style='text-align:center;'>
                            e-Ticket
                        </th>
                    </tr>
                    <tr>
                        <td colspan='3' style='text-align:center' data-tripid=<?=$tripid?> data-busno=<?=$trip->bus_no?> id='trip-id'>
                            Ticket for trip starting at <?php if ($trip->departure_time) echo $trip->departure_time; ?>
                            from <?php if ($trip->starting_halt) echo $trip->starting_halt; ?>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>From</td>
                        <td data-fieldname="source_halt">
                            <input type="text" name="from" id="from" placeholder="Enter starting halt" list="halt-list" oninput="getValue()" required>
                        </td>
                        <td><a href="#">Change</a></td>
                    </tr>
                    <tr>
                        <td>To</td>
                        <td data-fieldname="dest_halt">
                            <input type="text" name="to" id="to" placeholder="Enter destination halt" list="halt-list" oninput="getValue()" required>
                        </td>
                        <td><a href="#">Change</a></td>
                    </tr>
                    <tr>
                        <td>No. of passengers</td>
                        <td data-fieldname="passenger_count">
                            <input type="number" name="no-of-passengers" id="no-of-passengers" min="1" max="5" placeholder="Passengers" value="1">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                        <?php if ($trip->trip_date) echo $trip->trip_date; ?>
                        </td>
                        <td><a href="#">Change</a></td>
                    </tr>
                    <tr>
                        <td>Amount payable</td>
                        <td>
                            <text></text>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center">
                            <span id="reserved-seats"></span>
                            <a href='#' id="reserve-seats-q">Reserve seats?</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Pay with:</td>
                        <td data-fieldname="payment_method">
                            <input type="radio" id="cash" name="payment" value="cash">
                            <label for="cash">Cash</label>
                            <input type="radio" id="points" name="payment" value="points">
                            <label for="points">Points</label>
                        </td>
                    </tr>
                    <tr id="pointsBalance" style="display: none;">
                        <td colspan="3" style="text-align:center">
                            Redeemable Points Balance: 
                            <span id="pointsBalanceSpan">
                            <?= $passenger->points ?>
                            </span>
                             (= <?= $passenger->points ?> LKR)
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="text-align:right">
                            <button id="confirm-ticket" class="ticket-button" style="margin:0px;">Confirm</button>
                        </td>
                        <td style="text-align:left">
                            <button id="cancel-ticket" class="ticket-button-2" style="margin:0px;" href="<?= ROOT?>./passengerschedule">Cancel</button>
                        </td>
                    </tr>
                </table>
                <script src="<?= ROOT ?>/assets/js/ticket.js"></script>

            </div>
        </div>
    </div>

    <?php
    $bus = new Bus();
    $busType = ($bus->getBus($trip->bus_no))->type;
    ?>
    <div id="reserve-seats-div" class="ticket-body" style="width:fit-content; display:none;" data-bus-type="<?=$busType?>">
        <div id="bus-layout-l" class="card-content" style="padding:0 20px;">
            <table class="seating-grid">
                <tr>
                    <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                </tr>
                <tr>
                    <td class="seat" data-seat="A1">A1</td>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="DS">DS</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="D2">D2</td>
                    <td class="unavailable" data-seat="E2">E2</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A3">A3</td>
                    <td class="unavailable" data-seat="B3">B3</td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="D3">D3</td>
                    <td class="unavailable" data-seat="E3">E3</td>
                </tr>
                <tr>
                    <td class="seat" data-seat="A4">A4</td>
                    <td class="seat" data-seat="B4">B4</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="D4">D4</td>
                    <td class="seat" data-seat="E4">E4</td>
                </tr>
                <tr>
                    <td class="booked" data-seat="A5">A5</td>
                    <td class="booked" data-seat="B5">B5</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="D5">D5</td>
                    <td class="seat" data-seat="E5">E5</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A6">A6</td>
                    <td class="unavailable" data-seat="B6">B6</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="D6">D6</td>
                    <td class="seat" data-seat="E6">E6</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A7">A7</td>
                    <td class="unavailable" data-seat="B7">B7</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="D7">D7</td>
                    <td class="seat" data-seat="E7">E7</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A8">A8</td>
                    <td class="unavailable" data-seat="B8">B8</td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="D8">D8</td>
                    <td class="unavailable" data-seat="E8">E8</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A9">A9</td>
                    <td class="unavailable" data-seat="B9">B9</td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="D9">D9</td>
                    <td class="unavailable" data-seat="E9">E9</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A10">A10</td>
                    <td class="unavailable" data-seat="B10">B10</td>
                    <td class="unavailable" data-seat="C10">C10</td>
                    <td class="seat" data-seat="D10">D10</td>
                    <td class="seat" data-seat="E10">E10</td>
                </tr>
            </table>
            <!-- </div> -->
            <div><button id="reserve-seats-done" class="button-orange ticket-button">Done</button>
            <button id="reserve-seats-cancel" class="button-orange ticket-button-2">Cancel</button></div>
        </div>

        <div id="bus-layout-s" class="card-content" style="padding:0 20px; display:none">
            <!-- <div class="bus-container"> -->
            <table class="seating-grid">
                <tr>
                    <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                </tr>
                <tr>
                    <td class="seat" data-seat="A1">A1</td>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="DS">DS</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td class="no-seat"></td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="C2">C2</td>
                    <td class="unavailable" data-seat="D2">D2</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A3">A3</td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="C3">C3</td>
                    <td class="unavailable" data-seat="D3">D3</td>
                </tr>
                <tr>
                    <td class="seat" data-seat="A4">A4</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="C4">C4</td>
                    <td class="seat" data-seat="D4">D4</td>
                </tr>
                <tr>
                    <td class="booked" data-seat="A5">A5</td>
                    <td class="no-seat"></td>
                    <td class="seat" data-seat="C5">C5</td>
                    <td class="seat" data-seat="D5">D5</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A6">A6</td>
                    <td class="no-seat"></td>
                    <td class="unavailable" data-seat="C6">C6</td>
                    <td class="unavailable" data-seat="D6">D6</td>
                </tr>
                <tr>
                    <td class="unavailable" data-seat="A7">A7</td>
                    <td class="unavailable" data-seat="B7">B7</td>
                    <td class="unavailable" data-seat="C7">C7</td>
                    <td class="unavailable" data-seat="D7">D7</td>
                </tr>
            </table>
            <!-- </div> -->
            <div><button id="reserve-seats-done" class="button-orange ticket-button">Done</button>
            <button id="reserve-seats-s-cancel" class="button-orange ticket-button-2">Cancel</button></div>
        </div>

    </div>
        <!-- </div> -->
        <script src="<?= ROOT ?>/assets/js/seat.js"></script>
        <script>
            function getValue() {
            let halts = document.getElementById("halt-list");
            const options = Array.from(halts.options).map(option => option.value);
            // console.log(options);
            var tripStart = "<?php echo $trip->starting_halt ?>";
            // console.log(tripStart);
            if (tripStart='Pettah') {
                // reverse list
                options.reverse();
            }
            var fromInput = document.getElementById("from");
            var toInput = document.getElementById("to");
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            // check if from is an option value in halts
            if (options.includes(from)) {
                console.log("from is valid");
                fromInput.disabled = true;
                // check if to is an option value in halts
                if (options.includes(to)) {
                    console.log("to is valid");
                    // check if from and to are in the same index
                    if (options.indexOf(from) < options.indexOf(to)) {
                        console.log("to is after from");
                        toInput.disabled = true;
                    } else {
                        alert("Please select a valid destination");
                    }
                } else {
                    // alert("Please select a valid destination");
                }
            } else {
                // alert("Please select a valid starting halt");
            }
            }
        </script>
</body>

</html>