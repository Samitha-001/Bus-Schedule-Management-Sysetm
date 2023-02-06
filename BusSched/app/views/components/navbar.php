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
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="<?= ROOT ?>/passengerschedule">Bus schedule</a>
                        <a href="<?= ROOT ?>/passengerticket">Buy tickets</a>
                        <a href="#busfare">Bus fares</a>
                    </div>
                </div>
            </li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <?php
            if (isset($_SESSION['USER'])) {
                ?>
                <li class="signup-button"><a href="<?= ROOT ?>/logout">Logout</a></li>
            </div>
        </ul>
        <?php } else {
                ?>
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