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
    <div class="buy-tickets">
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
                        <td colspan="3" style="text-align: center;"><a href="#">Reserve seats?</a></td>
                    </tr>
                    <tr>
                        <td>Pay with</td>
                        <td>Cash | Points</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="reserve-seats">
        <br><br><br>
        <h3>Reserve</h3>
        <h1>Seats</h1>
        <div class="card">
            <div class="card-content">
                <div class="bus-container">
                    <table class="seating-grid">
                        <tr>
                            <td class="seat" data-seat="A1"></td>
                            <td class="seat" data-seat="A2"></td>
                            <td class="seat" data-seat="A3"></td>
                            <td class="seat" data-seat="A4"></td>
                            <td class="seat" data-seat="A5"></td>
                        </tr>
                        <tr>
                            <td class="seat" data-seat="B1"></td>
                            <td class="seat" data-seat="B2"></td>
                            <td class="seat" data-seat="B3"></td>
                            <td class="seat" data-seat="B4"></td>
                            <td class="seat" data-seat="B5"></td>
                        </tr>
                        <tr>
                            <td class="seat" data-seat="C1"></td>
                            <td class="seat" data-seat="C2"></td>
                            <td class="seat" data-seat="C3"></td>
                            <td class="seat" data-seat="C4"></td>
                            <td class="seat" data-seat="C5"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script src="<?= ROOT ?>/assets/js/script.js"></script>
    </div> -->

</body>

</html>