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

            <?php if (isset($_SESSION['USER'])) { ?>
                    <li class="signup-button"><a href="<?= ROOT ?>/logout">Logout</a></li>
                </div>
            </ul>
            <?php } else { ?>
                    <a href="<?= ROOT ?>/login">
                        <li class="signup-button" style="background-color:black; border: 2px solid #f4511e;">Login</li>
                    </a>
                    <a href="<?= ROOT ?>/passengersignup">
                        <li class="signup-button" style="border: 2px solid #f4511e;">Sign Up</li>
                    </a>
                    </div>
                    </ul>
            <?php } ?>

            <div class="burger" id="hamburger">
        <div onclick="openNav()"><img src="<?= ROOT ?>/assets/images/hamburger.png" height="15"></div>
    </div>
    
</nav>

<div id="Sidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
    <a href="#">Services</a>
    <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
    <a href="<?= ROOT ?>/passengerticket">Buy tickets</a>

    <?php
    if (strpos($current_url, '/home') == true) { // checks if current URL is home page
        ?>
                <a href="#busfare">Bus fares</a>
    <?php } else { ?>
                <a href="<?= ROOT ?>/home#busfare">Bus fares</a>
    <?php } ?>

    <?php if (strpos($current_url, '/home') == true) { ?>
        <a href="#about">About</a>
    <?php } else { ?>
        <a href="<?= ROOT ?>/home#about">About</a>
    <?php } ?>
    
    <?php if (strpos($current_url, '/home') == true) { ?>
        <a href="#contact">Contact</a>
    <?php } else { ?>
        <a href="<?= ROOT ?>/home#contact">Contact</a>
    <?php } ?>
        <ul>
    <?php if (isset($_SESSION['USER'])) { ?>
            <li class="signup-button"><a href="<?= ROOT ?>/logout">Logout</a></li>
    <?php } else { ?>
            <a href="<?= ROOT ?>/login">
                <li class="button-orange" style="background-color:black; border: 2px solid #f4511e;">Login</li>
            </a>
            <a href="<?= ROOT ?>/passengersignup">
                <li class="button-orange" style="border: 2px solid #f4511e;">Sign Up</li>
            </a>
            </div>
            <?php } ?>
        </ul>
</div>
<script>
function openNav() {
  document.getElementById("Sidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("Sidenav").style.width = "0";
}
</script>