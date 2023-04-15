<?php
// (new Passenger())->updatePassenger("passenger1", ["name" => "Venudi Hetti", "phone" => "0333333333"]);
$username = $_SESSION['USER']->username;
if (isset($_SESSION['USER'])) {
    if ($_SESSION['USER']->role == 'driver') {
        redirect('drivers');
    } else if ($_SESSION['USER']->role == 'conductor') {
        redirect('conductors');
    } else if ($_SESSION['USER']->role == 'scheduler') {
        redirect('schedulers');
    } else if ($_SESSION['USER']->role == 'owner') {
        redirect('owners');
    } else if ($_SESSION['USER']->role == 'admin') {
        redirect('admins');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_profile.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/passengerprofile.js"></script>
    <title>Profile</title>
    <style>
      td input[disabled] {
        border: none;
        background-color: transparent;
        padding: 0;
        margin: 0;
        font-size: inherit;
        font-family: inherit;
        color: inherit;
        cursor: default;
      }
      form.info-grid {
        display: none;
      }
    </style>
</head>

<body>
<?php
    include '../app/views/components/navbar.php';
    $passenger = $data[0];
    $username = $passenger->username;
    $otherpassenger1 = new Passenger();
?>
    <datalist id="passenger-list">
        <?php
        $otherpassenger = new Passenger();
        $otherpassengers = $otherpassenger->passengerInfo();
        foreach ($otherpassengers as $otherpassenger) {
            if ($otherpassenger->username != $username) {
                echo "<option value='" . $otherpassenger->username . "'>";
            }
        }
        
        
        ?>
    </datalist>

    <div class="passenger-profile-card" id="profile-header">
        <img id="profile-picture" src="<?= ROOT ?>/assets/images/icons/profile-pic-none.png" alt="profile pic" width="50px" height="50px">
        <h1 id="username">Hi <?= $username ?>!</h1>
    </div>

    <div class="nav-cards">
        <div class="passenger-profile-card">
            <div class="info-grid" style="padding-left:5px;">
                <h1>Name:</h1>
                <p data-username="<?= $username ?>">
                    <?= $passenger->name ?>
                </p>
                <h1>Phone:</h1>
                <p>
                    <?= $passenger->phone ?>
                </p>
                <h1>Address:</h1>
                <p>
                    <?= $passenger->address ?>
                </p>
                <h1>DOB:</h1>
                <p>
                    <?= $passenger->dob ?>
                </p>
                <i></i>
                <button href=# id='edit-passenger-info'>Edit</button>
            </div>

            <!-- edit form for passenger info -->
            <form style="padding-left:5px;" class='edit-info-form info-grid'>
                <h1>Name:</h1>
                <input type="text" name="name" id="name" value="<?= $passenger->name ?>">
                <h1>Phone:</h1>
                <input type="text" name="phone" id="phone" value="<?= $passenger->phone ?>">
                <h1>Address:</h1>
                <input type="text" name="address" id="address" value="<?= $passenger->address ?>">
                <h1>DOB:</h1>
                <input type="date" name="dob" id="dob" value="<?= $passenger->dob ?>">
                
                <!-- TODO -->
                <div class="info-grid-start-2">
                    <button id='save-passenger-info'>Save</button>
                    <button id='cancel-passenger-info'>Cancel</button>
                </div>
            </form>

        </div>
        <div class="passenger-profile-card">
            <h1 style="margin-bottom: 0px;">My points</h1>
            <div id="point-balance-div" class="info-grid" style="padding-left:5px;">
                <h1>Points:</h1> <p><?= $passenger->points ?></p>
                <h1>Value:</h1> <p><?= $passenger->points ?> LKR</p>
                <h1>Exp. date:</h1> <p><?= $passenger->points_expiry ?></p>
            </div>

            <button id="gift-points-btn" class="button-orange" style="width:100;">Gift points</button>

            <div id='gift-points-div'>
                <div class="dropdown">
                    <select name="points_to" id="gift-to" required>
                        <option value="" disabled selected>Select passenger</option>
                        <?php
                        $otherpassenger = new Passenger();
                        $otherpassengers = $otherpassenger->passengerInfo();
                        foreach ($otherpassengers as $otherpassenger) {
                            if ($otherpassenger->username != $username) {
                                echo "<option value='" . $otherpassenger->username . "'>" . $otherpassenger->username . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <input type="number" name="amount" id="points" placeholder="Enter points" max="<?php if ($passenger->points > 5):
                    echo($passenger->points - 5);
                endif;?>" min='0' required>
                <!-- hidden input -->
                <input type="hidden" name="points_from" id="gift-from" value="<?= $username ?>">
                
                <div class="info-grid">
                    <button id="confirm-gift-btn" class="button-orange" style="width:100;">Gift</button>
                    <button id="cancel-gift-btn" class="button-orange" style="width:100;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>