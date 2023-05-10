<?php
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
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/passenger_profile.css">
        <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
        <script src="<?= ROOT ?>/assets/js/passengerprofile.js"></script>
        <title>Profile</title>
</head>

<body>
<?php
    include '../app/views/components/navbar.php';
    $passenger = $data[0];
    $username = $passenger->username;
?>
    <div class="container">
    <div class="passenger-profile-card" id="profile-header">
        <?php
        // get profile picture if exists, else use default
        $pics = "assets/images/profile-pics/" . $username . ".*";
        $profile_pics = glob($pics);
        if (count($profile_pics) > 0) {
            $profile_pic = $profile_pics[0];
        } else {
            $profile_pic = "assets/images/icons/profile-pic-none.png";
        }
        ?>

        <img id="profile-pic" src="<?= $profile_pic ?>" alt="profile pic" width="200px" height="200px">
        <img id="edit-pencil" src="<?= ROOT ?>/assets/images/icons/edit-pencil.png">
        
        <h1 id="username">Hi <?= $username ?>!</h1>

        <div id="passenger-info-div">
        <h5>Name</h5>
        <hr>
        <p data-username="<?= $username ?>">
            <?= $passenger->name ?>
        </p>
        <h5>Phone</h5>
        <hr>
        <p>
            <?= $passenger->phone ?>
        </p>
        <h5>Address</h5>
        <hr>
        <p>
            <?= $passenger->address ?>
        </p>
        <h5>Birthday</h5>
        <hr>
        <p>
            <?= $passenger->dob ?>
        </p>
        <br>
        <button href=# id='edit-passenger-info'>Edit profile</button>
        </div>

        <!-- edit form for passenger info -->
        <form class='edit-info-form'>
            <h5>Name</h5>
            <hr>
            <input type="text" name="name" id="name" value="<?= $passenger->name ?>">
            <h5>Phone</h5>
            <hr>
            <input type="text" name="phone" id="phone" value="<?= $passenger->phone ?>">
            <h5>Address</h5>
            <hr>
            <input type="text" name="address" id="address" value="<?= $passenger->address ?>">
            <h5>Birthday</h5>
            <hr>
            <input type="date" name="dob" id="dob" value="<?= $passenger->dob ?>" style="margin-bottom:17px;">
            
            <br>
            
            <div class="info-grid-start-2">
            <span></span>
            <span></span>
                <button id='cancel-passenger-info'>Cancel</button>
                <button id='save-passenger-info'>Save</button>
            </div>
        </form>
        <!-- div to add profile picture -->
        <div class="passenger-profile-card" id="profile-pic-from-div" style="display:none;">
            <form id="profile-pic-form">
                <input type="file" name="profile-pic" id="profile-pic-input" accept="image/*">
                <input type="hidden" name="username" id="username" value="<?= $username ?>">
                <button id="upload-profile-pic-btn">Upload</button>
            </form>
        </div>

        <!-- input to get image file as profile picture -->
    </div>

    <!-- <div class="nav-cards"> -->
        <div class="passenger-profile-card">
            <h1 style="margin-bottom: 0px;">My points</h1>
            <div id="point-balance-div" class="info-grid" style="padding-left:5px;">
                <h1>Points:</h1> <p><?= $passenger->points ?></p>
                <h1>Value:</h1> <p><?= $passenger->points ?> LKR</p>
                <h1>Exp. date:</h1> <p><?= $passenger->points_expiry ?></p>
                <span></span>
                <button id="gift-points-btn" style="width:100%;">Gift points</button>
            </div>

            <div id='gift-points-div'>
                <div class="dropdown">
                    <select name="points_to" id="gift-to" required>
                        <option value="" disabled selected>Choose friend</option>
                        <?php
                        $friend = new Friends();
                        $friends = $friend->getFriends($username);
                        foreach ($friends as $friend) {
                            echo "<option value='" . $friend . "'>" . $friend . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div id="gift-points-amount">
                    <input type="number" name="amount" id="points" placeholder="Enter points" max="<?php if ($passenger->points > 5):
                        echo($passenger->points - 5);
                    endif;?>" min='0' required>
                    <!-- hidden input -->
                    <input type="hidden" name="points_from" id="gift-from" value="<?= $username ?>">
                    
                    <div class="info-grid">
                        <button id="confirm-gift-btn" style="width:100;">Gift</button>
                        <button id="cancel-gift-btn" style="width:100;">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="passenger-profile-card">
            <div>
            <h1>Friends</h1>
            <div id="friend-list-div" >
            <?php
            foreach ($friends as $friend) {
                echo "<div>";
                echo "<i class='remove-friend-i' data-friend='".$friend."'>Remove friend</i>";
                echo "<p>@" . $friend . "</p>";                
                echo "<hr></div>";
            }
            ?>
            </div>
            <span class="info-grid">
                <button id="add-friend-btn">Add friend</button>
            </span>
            </div>

            <div id="add-friend-div" style="display:none;">
                <div class="dropdown">
                    <!-- input text -->
                    <input type="text" name="friend" id="friend" placeholder="Enter username" required>
                </div>
                <div class="info-grid">
                    <button id="confirm-add-friend-btn" style="width:100;">Add</button>
                    <button id="cancel-add-friend-btn" style="width:100;">Cancel</button>
                </div>
            </div>
        </div>

    <!-- </div> -->
    <div id="my-ratings-div" class="passenger-profile-card">
        <h1>My ratings</h1>
        <table id="my-ratings">
            <tr>
                <th>Ticket ID</th>
                <th>Bus No.</th>
                <th>Bus rating</th>
                <th>Driver rating</th>
                <th>Conductor rating</th>
                <th>Time</th>
            </tr>
        <tr>
        <?php
        $passenger = new Passenger();
        $ratings = $passenger->getRatings();
        foreach ($ratings as $rating) {
            echo "<td>" . $rating->ticket_id . "</td>";
            echo "<td>" . $rating->bus_no . "</td><td>";

            for($i = 0; $i < $rating->bus_rating; $i++) {
                echo "<i class='fas fa-star fa-xs'></i>";
            }
            echo "&nbsp(" . $rating->bus_rating . "/5)</><td>";

            for($i = 0; $i < $rating->driver_rating; $i++) {
                echo "<i class='fas fa-star fa-xs'></i>";
            }
            echo "&nbsp(" . $rating->driver_rating . "/5)</><td>";

            for($i = 0; $i < $rating->conductor_rating; $i++) {
                echo "<i class='fas fa-star fa-xs'></i>";
            }
            echo "&nbsp(" . $rating->conductor_rating . "/5)</td>";
            
            echo "<td>" . $rating->time_updated . "</td></tr><tr>";
        }
        ?>
        </tr>
        </table>
    </div>
    </div>
    </div>    
</body>

</html>