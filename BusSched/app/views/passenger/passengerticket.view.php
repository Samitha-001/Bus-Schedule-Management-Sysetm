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
    include '../app/views/components/passengernavbar.php';
    ?>
    <div class="row">
        <div class="col-6 col-s-9 ticket" id="book-ticket">
            <div class="ticket-header">
                <h3>Buy ticket</h3>
            </div>
            <div class="ticket-body">
                <ul>
                    <li>
                        <input type="text" name="from" id="from" placeholder="Enter starting halt">
                    </li>
                    <li>
                        <input type="text" name="to" id="to" placeholder="Enter destination halt">
                    </li>
                    <li>
                        <input type="date" id="dateInput">
                        <text id="selectedDate"></text>
                    </li>
                    <li>
                        <input type="number" name="no-of-passengers" id="no-of-passengers" min="1" max="5" placeholder="No. of passengers">
                    </li>
                    <div id="reserve-seats-q">Reserve seats?</div>
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
                    <div id="pointsBalance" style="display: none;">
                        Redeemable Points Balance: <span id="balance">100 (=100LKR)</span>
                    </div>
                    <li>
                        <a href="<?= ROOT ?>/passengerschedule"><button class="button-orange ticket-button-2">Cancel</button></a>
                        <button class="button-orange ticket-button">Confirm</button>
                    </li>
                </ul>
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

</body>

</html>