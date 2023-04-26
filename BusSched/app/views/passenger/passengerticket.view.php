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
    // include '../app/views/components/passengernavbar.php';


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
        <h3>Buy ticket</h3>
    </div>
    <div class="row" style="justify-content:center">
        <div class="ticket" id="book-ticket">
            <div class="ticket-body">
                <table>
                    <tr>
                        <th colspan='3' style='text-align:center;'>
                            e-Ticket
                        </th>
                    </tr>
                    <tr>
                        <td colspan='3' style='text-align:center' data-tripid=<?=$tripid?> id='trip-id'>
                            Ticket for trip starting at <?php if ($trip->departure_time) echo $trip->departure_time; ?>
                            from <?php if ($trip->starting_halt) echo $trip->starting_halt; ?>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>From</td>
                        <td data-fieldname="source_halt">
                            <input type="text" name="from" id="from" placeholder="From" list="halt-list" oninput="getValue()" required>
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
                            <input type="number" name="no-of-passengers" id="no-of-passengers" min="1" max="5" placeholder="Passengers">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            trip date
                        </td>
                        <td><a href="#">Change</a></td>
                    </tr>
                    <tr>
                        <td>Amount payable</td>
                        <td>
                            <text>500 LKR</text>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center">
                            <a href='#' id="reserve-seats-q">Reserve seats?</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Pay with:</td>
                        <td>
                            <input type="radio" id="cash" name="payment" value="cash">
                            <label for="cash">Cash</label>
                            <input type="radio" id="points" name="payment" value="points">
                            <label for="points">Points</label>
                        </td>
                    </tr>
                    <tr id="pointsBalance" style="display: none;">
                        <td colspan="3" style="text-align:center">
                            Redeemable Points Balance: <?= $passenger->points ?> (= <?= $passenger->points ?> LKR)
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
                
                <!-- <ul>
                    <div id="reserve-seats-q">Reserve seats?</div>
                    <li>
                        <input type="text" name="from" id="from" placeholder="Enter starting halt">
                    </li>
                    <li>
                        <input type="text" name="to" id="to" placeholder="Enter destination halt">
                    </li>
                    <li id="selectedDate">
                        <input type="date" id="dateInput">
                    </li>
                    <li>
                        <input type="number" name="no-of-passengers" id="no-of-passengers" min="1" max="5" placeholder="No. of passengers">
                    </li>
                    <li>
                        <text>Seats reserved: </text><text>2</text>
                    </li>
                    <li>
                        <text>Amount payable: </text><text>500.00 LKR</text>
                    </li>
                    <li>
                        <text>Pay with:</text>
                        <input type="radio" id="cash" name="payment" value="cash">
                        <label for="cash">Cash</label>
                        <input type="radio" id="points" name="payment" value="points">
                        <label for="points">Points</label>
                    </li>
                    
                    <li>
                        <a href="<?= ROOT ?>/passengerschedule"><button class="button-orange ticket-button-2">Cancel</button></a>
                        <button class="button-orange ticket-button">Confirm</button>
                    </li>
                </ul> -->
                <script src="<?= ROOT ?>/assets/js/ticket.js"></script>

            </div>
        </div>

        <div class="col-6 col-s-9 ticket" id="reserve-seats" style="display:none">
            <div class="ticket-header">
                <h3>Reserve seats</h3>
            </div>
            <div class="ticket-body  col-6">
                <div class="card-content">
                    <!-- <div class="bus-container"> -->
                    <table class="seating-grid">
                        <tr>
                            <td class="seat" data-seat="A1">A1</td>
                            <td class="no-seat"></td>
                            <td class="no-seat"></td>
                            <td class="unavailable" data-seat="A3">A2</td>
                        </tr>
                        <tr>
                            <td class="no-seat"></td>
                            <td class="no-seat"></td>
                            <td class="unavailable" data-seat="A2">B1</td>
                            <td class="unavailable" data-seat="A3">B2</td>
                        </tr>
                        <tr>
                            <td class="unavailable" data-seat="B1">C1</td>
                            <td class="no-seat"></td>
                            <td class="unavailable" data-seat="B2">C2</td>
                            <td class="unavailable" data-seat="B3">C3</td>
                        </tr>
                        <tr>
                            <td class="seat" data-seat="D1">D1</td>
                            <td class="no-seat"></td>
                            <td class="seat" data-seat="D2">D2</td>
                            <td class="seat" data-seat="D3">D3</td>
                        </tr>
                        <tr>
                            <td class="booked" data-seat="E1">E1</td>
                            <td class="no-seat"></td>
                            <td class="seat" data-seat="E2">E2</td>
                            <td class="seat" data-seat="E3">E3</td>
                        </tr>
                        <tr>
                            <td class="unavailable" data-seat="F1">F1</td>
                            <td class="no-seat"></td>
                            <td class="unavailable" data-seat="F2">B2</td>
                            <td class="unavailable" data-seat="F3">F3</td>
                        </tr>
                        <tr>
                            <td class="unavailable" data-seat="G1">G1</td>
                            <td class="unavailable" data-seat="G2">G2</td>
                            <td class="unavailable" data-seat="G3">G3</td>
                            <td class="unavailable" data-seat="G4">G4</td>
                        </tr>
                    </table>
                    <!-- </div> -->
                    <div id="book-ticket-q"><button class="button-orange ticket-button">Done</button></div>
                </div>

            </div>
        </div>
        <script src="<?= ROOT ?>/assets/js/seat.js"></script>
        <?php
        // $halt = new Halt();
        // $halts = $halt->calculateFare('Piliyandala', 'Kohuwala');
        ?>
        <script>
            function getValue() {
            let halts = document.getElementById("halt-list");
            const options = Array.from(halts.options).map(option => option.value);
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
                    // call php calculate fare

                    // check if from and to are in the same index
                    if (options.indexOf(from) < options.indexOf(to)) {
                        console.log("to is after from");
                        toInput.disabled = true;
                    // calculate fare
                    // display fare
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