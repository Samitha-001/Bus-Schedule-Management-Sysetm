<nav class="navbar">
    <div>
        <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" width="150"></a>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="nav-menu">
            <?php
            if (isset($_SESSION['USER'])) {
            ?>
                <li><a href="<?= ROOT ?>/buses">Buses</a></li>
                <li><a href="<?= ROOT ?>/halts">Halts</a></li>
                <li><a href="<?= ROOT ?>/fares">Fare</a></li>
                <li class="signup-button"><a href="<?= ROOT ?>/logout">Logout</a></li>
        </div>
    </ul>
<?php } else {
?>

    <li><a href="#services" onclick="goToSection()">Services</a></li>
    <li><a href="#about" onclick="goToSection()">About</a></li>
    <li><a href="#contact" onclick="goToSection()">Contact</a></li>
    <a href="<?= ROOT ?>/login">
        <li class="signup-button" style="background-color:black; border: 2px solid #f4511e;">Login</li>
    </a>
    <a href="<?= ROOT ?>/passengersignup">
        <li class="signup-button" style="border: 2px solid #f4511e;">Sign Up</li>
    </a>
    </div>
    </ul>
<?php } ?>

<div class="burger">
    <div><a href=#><img src="<?= ROOT ?>/assets/images/hamburger.png" height="15"></a></div>
</div>
</nav>

<!-- mobile nav bar -->
<!-- <nav class="mobile-navbar">
    <ul class="nav-links">
        <div class="nav-menu">
            <li><a style="color:black" href="<?= ROOT ?>/buses">Schedules</a></li>
            <li><a style="color:black" href="<?= ROOT ?>/halts">Check fare</a></li>
            <li><a style="color:black" href="<?= ROOT ?>/fares">Book tickets</a></li>
        </div>
    </ul>
</nav> -->