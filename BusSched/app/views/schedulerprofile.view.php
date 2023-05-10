<!-- <?php

$username = $_SESSION['USER']->username;
if (isset($_SESSION['USER'])) {
    if ($_SESSION['USER']->role == 'driver') {
        redirect('drivers');
    } else if ($_SESSION['USER']->role == 'conductor') {
        redirect('conductors');
    } else if ($_SESSION['USER']->role == 'owner') {
        redirect('owners');
    } else if ($_SESSION['USER']->role == 'admin') {
        redirect('admins');
    }
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedulerprofile.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="<?= ROOT ?>/assets/js/schedulerprofile.js"></script>
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
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";

        $scheduler = $data[0];
        $username = $scheduler->username;
        $schednew1 = new Scheduler();
    ?>

<datalist id="passenger-list">
        <?php
        $schednew = new Scheduler();
        //edit passenger info
        $schedsnew = $schednew->schedulerInfo();
        foreach ($schedsnew as $schednew) {
            if ($schednew->username != $username) {
                echo "<option value='" . $schednew->username . "'>";
            }
        }
        
        
        ?>
    </datalist>

        <div class="passenger-profile-card" id="profile-header">
        <img id="profile-picture" src="<?= ROOT ?>/assets/images/icons/profile-pic-none.png" alt="profile pic" width="50px" height="50px">
        <h1 id="username">Hi <?= $username ?>!</h1>
    </div>
    

        <div class="row">
        
        <div class="nav-cards">
        <div class="passenger-profile-card">
            <div class="info-grid" style="padding-left:5px;">
                <h1>Username:</h1>
                <p data-username="<?= $username ?>">
                    <?= $scheduler->username ?>
                </p>
                <h1>Name:</h1>
                <p>
                    <?= $scheduler->name ?>
                </p>
                
                <h1>Phone:</h1>
                <p>
                    <?= $scheduler->phone ?>
                </p>
                <h1>Address:</h1>
                <p>
                    <?= $scheduler->address ?>
                </p>
                
                <button href=# id='edit-passenger-info' style="background-color: #24315e;">Edit</button>
            </div>

            <!-- edit form for passenger info -->
            <form style="padding-left:5px;" class='edit-info-form info-grid'>
            <h1>Username:</h1>
                <input type="text" name="username" id="username" value="<?= $scheduler->username ?>">
                <h1>Name:</h1>
                <input type="text" name="name" id="name" value="<?= $scheduler->name ?>">
                <h1>Phone:</h1>
                <input type="text" name="phone" id="phone" value="<?= $scheduler->phone ?>">
                <h1>Address:</h1>
                <input type="text" name="address" id="address" value="<?= $scheduler->address ?>">
                
                
                <!-- TODO -->
                <div class="info-grid-start-2">
                    <button id='save-passenger-info' style="background-color: #24315e;">Save</button>
                    <button id='cancel-passenger-info' style="background-color: #24315e;">Cancel</button>
                </div>
            </form>

        </div>
        </div>

</body>