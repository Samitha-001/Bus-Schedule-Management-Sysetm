<?php
//   gets current URL
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div>
        <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" width="150"></a>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="nav-menu">
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Services
                        <!-- <i class="fa fa-caret-down"></i> -->
                    </button>
                    <div class="dropdown-content">
                        <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
                        <a href="<?= ROOT ?>/passengerticket">Buy tickets</a>

                        <?php
                        if (strpos($current_url, '/home') == true) { // checks if current URL is home page
                            ?>
                        <a href="#busfare">Bus fares</a>
                        <?php } else { ?>
                        <a href="<?= ROOT ?>/home#busfare">Bus fares</a>
                        <?php } ?>
                    </div>
                </div>
            </li>

            <li>
                <?php if (strpos($current_url, '/home') == true) { ?>
                <a href="#about">About</a>
                <?php } else { ?>
                <a href="<?= ROOT ?>/home#about">About</a>
                <?php } ?>
            </li>

            <li>
                <!-- checks if current URL is home page -->
                <?php if (strpos($current_url, '/home') == true) { ?>
                <a href="#contact">Contact</a>
                <?php } else { ?>
                <a href="<?= ROOT ?>/home#contact">Contact</a>
                <?php } ?>
            </li>

            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
            <li class="signup-button"><a href="<?= ROOT ?>/logout">Logout</a></li>
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

    <div class="burger" id="hamburger">
        <div onclick="openNav()"><img src="<?= ROOT ?>/assets/images/hamburger.png" height="15"></div>
    </div>

</nav>

<!-- side navigation bar for smaller screens -->
<div id="Sidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a class="services">Services</a>
    <ul class="sidenav-links">
        <ul>
            <li><a href="<?= ROOT ?>/passengerschedule">Bus schedule</a></li>
            <li><a href="<?= ROOT ?>/passengerticket">Buy tickets</a></li>
            <li>
                <?php
                if (strpos($current_url, '/home') == true) { // checks if current URL is home page
                ?>
                <a href="#busfare">Bus fares</a>
                <?php } else { ?>
                <a href="<?= ROOT ?>/home#busfare">Bus fares</a>
                <?php } ?>
            </li>
        </ul>
    </ul>

    <?php if (strpos($current_url, '/home') == true) { ?>
    <a class="li" href="#about">About</a>
    <?php } else { ?>
    <a class="li" href="<?= ROOT ?>/home#about">About</a>
    <?php } ?>

    <?php if (strpos($current_url, '/home') == true) { ?>
    <a class="li" href="#contact">Contact</a>
    <?php } else { ?>
    <a class="li" href="<?= ROOT ?>/home#contact">Contact</a>
    <?php } ?>

    <div class="login-buttons">
        <!-- if user is logged in -->
        <?php if (isset($_SESSION['USER'])) { ?>
        <a class="sidenav-signup-button" href="<?= ROOT ?>/logout">Logout</a>

        <!-- if user is logged out -->
        <?php } else { ?>
        <a class="sidenav-login-button" href="<?= ROOT ?>/login">Login</a>
        <a class="sidenav-signup-button" href="<?= ROOT ?>/passengersignup">Sign up</a>
        <!-- </div> -->
        <?php } ?>
    </div>

</div>

<script>
function openNav() {
    document.getElementById("Sidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("Sidenav").style.width = "0";
}
</script>