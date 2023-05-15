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
    <?php include 'components/head.php';?>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedulerprofile.css">
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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 92vh;
            width: 60%;
        }

        .passenger-profile-card {
            display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
    margin-top: 30px;
        }

        #profile-header {
            flex-direction: column;
        }

        #profile-pic {
            border-radius: 50%;
            margin-right: 30px;
            object-fit: cover;
            width: 110px;
            height: 110px;
        }

        #username {
            margin-top: 0;
        }

        #passenger-info-div {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            width: 50%;
            padding: 10px;
        }

        #edit-passenger-info {
            align-self: center;
            margin-top: 5px;
        }

        .edit-info-form {
            display: none;
            width: 50%;
            padding: 4px;
        }

        .edit-info-form input {
            width: 80%;
            margin-bottom: 5px;
        }

        .info-grid-start-2 {
            display: grid;
            grid-template-columns: 1fr 1fr auto auto;
            justify-items: start;
            align-items: center;
            margin-top: 10px;
        }

        .info-grid-start-2 span {
            grid-column: 1 / 3;
        }

        #profile-pic-from-div {
            display: none;
        }

        

        @media (max-width: 768px) {
            .passenger-profile-card {
                flex-direction: column;
                width: 90%;
                height: auto;
                padding: 20px;
            }

            #profile-pic {
                margin-right: 0;
                margin-bottom: 20px;
            }

            #passenger-info-div {
                width: 80%;
            }

            .edit-info-form {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";

        $scheduler = $data[0];
        $username = $scheduler->username;
       
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
                <?= $scheduler->name ?>
            </p>
            <h5>Phone</h5>
            <hr>
            <p>
                <?= $scheduler->phone ?>
            </p>
            <h5>Address</h5>
            <hr>
            <p>
                <?= $scheduler->address ?>
            </p>
            <br>
            <button href=# id='edit-passenger-info'>Edit profile</button>
        </div>

        <!-- edit form for passenger info -->
        <form class='edit-info-form'>
            <h5>Name</h5>
            <hr>
            <input type="text" name="name" id="name" value="<?= $scheduler->name ?>">
            <h5>Phone</h5>
            <hr>
            <input type="text" name="phone" id="phone" value="<?= $scheduler->phone ?>">
            <h5>Address</h5>
            <hr>
            <input type="text" name="address" id="address" value="<?= $scheduler->address ?>">
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

</body>