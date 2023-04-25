<?php
//   gets current URL
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<script>
    const ROOT = "<?= ROOT ?>"
</script>
<nav class="navbar">
    <div>
        <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" width="120"></a>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="nav-menu">
        <?php
        if (isset($_SESSION['USER'])) {
            if ($_SESSION['USER']->role == 'passenger') {
                ?>
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Services
                    </button>
                    <div class="dropdown-content">
                        <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
                        <a href="<?= ROOT ?>/passengertickets">Tickets</a>

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
            
            <?php }} ?>

            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
            <a href="<?= ROOT ?>/passengerprofile"><img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" width="30" ></a>
                <li class="signup-button" style="margin-left:7px"><a href="<?= ROOT ?>/logout">Logout</a></li>
            </div>
        </ul>

        <!-- if user is logged out -->
    <?php } else { ?>
        <div class="dropdown">
            <button class="dropbtn" style="margin-top:6px;">Services
            </button>
            <div class="dropdown-content">
                <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
                <a href="<?= ROOT ?>/passengertickets">Tickets</a>

                <?php
                if (strpos($current_url, '/home') == true) { // checks if current URL is home page
                    ?>
                    <a href="#busfare">Bus fares</a>
                <?php } else { ?>
                    <a href="<?= ROOT ?>/home#busfare">Bus fares</a>
                <?php } ?>
            </div>
        </div>
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

    <a onclick="closeNav()" class="sidenav-logo"><img src="<?= ROOT ?>/assets/images/logo.png" width="120"></a>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php if (isset($_SESSION['USER'])) { ?>
    <a class="li" href="<?= ROOT ?>/passengerprofile">My Profile</a>

    <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
    <a href="<?= ROOT ?>/passengertickets">My tickets</a>

    <?php } else { ?>
    <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
    <a href="<?= ROOT ?>/login">Bus tickets</a>
    <?php } ?>
    <?php
    if (strpos($current_url, '/home') == true) { // checks if current URL is home page
        ?>
        <a href="#busfare">Bus fares</a>
    <?php } else { ?>
        <a href="<?= ROOT ?>/home#busfare">Bus fares</a>
    <?php } ?>

    <div class="login-buttons">
        <!-- if user is logged in -->
        <?php if (isset($_SESSION['USER'])) { ?>
            <a class="signup-button" style="background-color:black; border: 2px solid #f4511e;" href="<?= ROOT ?>/logout">Logout</a>

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
    document.getElementById("Sidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("Sidenav").style.width = "0";
}
</script>