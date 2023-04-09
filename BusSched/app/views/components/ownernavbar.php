<?php
//   gets current URL
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div>
        <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" width="120"></a>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="nav-menu">
            <li>
                <?php if (strpos($current_url, '/home') == true) { ?>
                    <a href="#about">About</a>
                <?php } else { ?>
                    <a href="<?= ROOT ?>/home#about">About</a>
                <?php } ?>
            </li>

            <li>
            

            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
            <a href="<?= ROOT ?>/owners"><img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" size="15" width="35"></a>
            <a href="<?= ROOT ?>/ownernotifications"><img src="<?= ROOT ?>/assets/images/icons/Bell_Icon.png" width="30"  style="padding-bottom:5px"></a>
                <li class="signup-button" style="margin-left:7px"><a href="<?= ROOT ?>/logout">Logout</a></li>
            </div>
        </ul>

        <!-- if user is logged out -->
    <?php } else { ?>
        <a href="<?= ROOT ?>/login">
            <li class="signup-button" style="background-color:black; border: 2px solid #f4511e;">Login</li>
        </a>
        <a href="<?= ROOT ?>/passengersignup">
            <li class="signup-button" style="border: 2px solid #f4511e;">Sign up</li>
        </a>
        </div>
        </ul>
    <?php } ?>

    <!-- <div class="burger" id="hamburger">
        <div onclick="openNav()"><img src="<?= ROOT ?>/assets/images/hamburger.png" height="15"></div>
    </div> -->

</nav>

