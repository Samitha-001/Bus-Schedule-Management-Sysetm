<?php
//   gets current URL
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div>
        <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png" width="120" ></a>
    </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="nav-menu">

            <li>
            

            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
            <a href="<?= ROOT ?>/ownerprofile"><img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" size="15" width="35" style="margin-bottom:0.01%;margin-right:17px"></a>
            <a href="<?= ROOT ?>/ownernotifications"><img src="<?= ROOT ?>/assets/images/icons/Bell_Icon.png" width="30"  style="padding-bottom:4px;margin-right:0.01px"></a>
                <li class="signup-button" style="margin-left:7px;height:40px;margin-top:7px;padding-top:7px"><a href="<?= ROOT ?>/logout">Logout</a></li>
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

<script>
    const ROLE = 'owner'
    const USERNAME = '<?= $_SESSION['USER']->username ?>'

    //Breakdown notifications
    let funcBreakdown = (d) => {
        new Toast('fa fa-bus', 'rgba(255,0,0,0.78)', 'Bus Breakdown', d.message, true, 3000)
    }
    new Socket().receive_data("breakdown", funcBreakdown, ROLE, USERNAME)

</script>