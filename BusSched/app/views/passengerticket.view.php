<?php
include 'components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets</title>
    <style>
        body {
            background-size: auto;
            background-image: url('<?= ROOT ?>/assets/images/backgrounds/bg-ticket.png');
        }
    </style>
    <link href="<?= ROOT ?>/assets/css/ticket.css" rel="stylesheet">
</head>

<body>

    <div class="row">
        <div class="col-6 col-s-9 ticket">
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
                        <input type="date" name="date" id="date" placeholder="Choose date">
                        <select name="bus-type" id="bus-type" placeholder="Bus type">
                            <option value="L">Luxury</option>
                            <option value="SL">Semi-Luxury</option>
                        </select>
                    </li>
                    <li>
                        <select name="no-of-passengers" id="no-of-passengers">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </li>
                    <li>
                        <text>Seats reserved:</text><text>2</text>
                    </li>
                    <li>
                        <text>Amount payable:</text><text>500.00 LKR</text>
                    </li>
                    <li>
                        <text>Pay with:</text>
                        <!-- radio button for cash or card -->
                        <input type="radio" id="cash" name="payment" value="cash">
                        <label for="cash">Cash</label>
                        <input type="radio" id="points" name="payment" value="points">
                        <label for="points">Points</label>
                    </li>
                    <li>
                        <text>Redeemable points:</text><text>150</text>
                    </li>
                    <li>
                        <button class="button-orange ticket-button">Cancel</button>
                        <button class="button-orange ticket-button">Confirm</button>
                    </li>
                </ul>
            </div>
        </div>

        <div id="reserve-seats" style="display:none">
            <br><br>
            <h3>Reserve</h3>
            <h1>Seats</h1>
            <div class="card">
                <div class="card-content">
                    <div class="bus-container">
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
                    </div>
                </div>
            </div>
            <script src="<?= ROOT ?>/assets/js/seat.js"></script>
        </div>

</body>

</html>