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
                <div class="dropdown">
                    <!-- <button class="dropbtn">Services -->
                        <!-- <i class="fa fa-caret-down"></i> -->
                    <!-- </button> -->
                    <div class="dropdown-content">
                        <a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a>
                        <a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li>
                        <a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a>
                        <a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a>
                        <a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a>
                        <a href="<?= ROOT ?>/conductorrating" style="color:#9298AF;">Ratings</a>
                        <a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">Contacts</a>
                    </div>
                </div>
            </li>


            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
            
                
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
    <!-- <a class="services" href="<?= ROOT ?>/passengerprofile">My profile</a>  -->

    <!-- <a class="services">Services</a> -->
    <ul class="sidenav-links">
        <div style="margin-bottom:5%">
        <hr>
            <li><a href="<?= ROOT ?>/conductors" style="color:#9298AF;">Dashboard</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="" style="color:#9298AF;">Location</a></li> 
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/conductorschedules" style="color:#9298AF;">Schedules</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/busprofileconductors" style="color:#9298AF;">Buses</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/activetickets" style="color:#9298AF;">Bus Tickets</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/conductorfares" style="color:#9298AF;">Bus Fares</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/breakdowns" style="color:#9298AF;">Breakdowns</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li><a href="<?= ROOT ?>/contactowners" style="color:#9298AF;">contacts</a></li>
            <hr>
            </div>
            <div style="margin-bottom:5%">
            <li class="signup-button" style="margin-left:7px"><a href="<?= ROOT ?>/logout">Logout</a></li>
            <hr>
            </div>
        </div>
  

    <div class="login-buttons">
        <!-- if user is logged in -->
        <?php if (isset($_SESSION['USER'])) { ?>
            <!-- <a class="sidenav-signup-button" href="<?= ROOT ?>/logout">Logout</a> -->

            <!-- if user is logged out -->
        <?php } else { ?>
            <a class="sidenav-login-button" href="<?= ROOT ?>/login">Login</a>
            <a class="sidenav-signup-button" href="<?= ROOT ?>/signup">Sign up</a>
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