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
            <!-- if the user is logged in -->
            <?php if (isset($_SESSION['USER'])) { ?>
                <a href="<?= ROOT ?>/ownerprofile">
                    <img src="<?= ROOT ?>/assets/images/icons/profile-icon.png" width="25">
                </a>
                <a href="<?= ROOT ?>/logout" style="padding-top:7px;">
                    <li class="signup-button" style="border: 2px solid #f4511e;background-color:black;">Logout</li>
            </a>
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
</nav>

<script>
    const ROLE = 'owner'
    const USERNAME = '<?= $_SESSION['USER']->username ?>'

    //Breakdown notifications
    let funcBreakdown = (d) => {
        new Toast('fa fa-bus', 'rgba(255,0,0,0.78)', 'Bus Breakdown', d.message, true, 3000)
    }
    try {
        new Socket().receive_data("breakdown", funcBreakdown, ROLE, USERNAME)
    } catch (e) {
        new Toast('fa fa-wifi', 'rgba(255,0,0,0.78)', 'Bad Connection', 'Please check your internet connection', true, 3000)
    }

</script>