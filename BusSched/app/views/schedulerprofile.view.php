<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/schedsidebar.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Profile</title>
</head>

<body>
    <?php 
        include "components/navbar_new.php";
        include "components/schedulersidebar.php";
    ?>

    

        <div class="row">
        
        <div class="card-container-sched" id="info-card-sched">
            <ul>
                <p style="font-size: 32px;">Personal Info</p>
                <table class="styled-table">
                    <tr>
                        <th>Username: </th>
                        <td>
                            <?= $_SESSION['USER']->username ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td>
                            Scheduler
                        </td>
                    <tr>
                        <th>Email: </th>
                        <td>
                            <?= $_SESSION['USER']->email ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>
                             Enter the phone number
                        </td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td>
                            Enter the address
                        </td>
                    </tr>
                </table>
            </ul>
        </div>
        <div class="profile-picture-container">
        <div class="profile-picture">
            
            <img src="profile_picture.jpg" alt="Profile Picture">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
        </div>

</body>