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
    <!-- background image -->
    <style>
        body {
            background-image: url('<?= ROOT ?>/assets/images/backgrounds/bg-ticket.png');
        }
    </style>
    <link href="<?= ROOT ?>/assets/css/style3.css" rel="stylesheet">
</head>

<body>
    <div id="buy-tickets">
        <br><br><br>
        <h3>Buy</h3>
        <h1>Tickets</h1>
        <div class="card">
            <div class="card-content">
                <table class="ticket-table">
                    <tr>
                        <td>From:</td>
                        <td style="font-size: 25px;">Kohuwala</td>
                        <td style="color:#f4511e">Change</td>
                    </tr>
                    <tr>
                        <td>To:</td>
                        <td style="font-size: 25px;">Kohuwala</td>
                        <td style="color:#f4511e">Change</td>
                    </tr>
                    <tr>
                        <td>No. of passengers:</td>
                        <td style="font-size: 25px;"></td>
                    </tr>
                    <tr>
                        <td>Amount payable:</td>
                        <td style="font-size: 25px;">0.00 LKR</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;"><a href="#" id="reserve-seats">Reserve seats?</a></td>
                    </tr>
                    <tr>
                        <td>Pay with</td>
                        <td>Cash | Points</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div>
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