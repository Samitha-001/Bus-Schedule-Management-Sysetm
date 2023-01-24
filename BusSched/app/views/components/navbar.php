<nav class="navbar">
        <div>
            <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png"></a>
        </div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">
            <div class="menu">
                <?php
                if (isset($_SESSION['USER'])) {
                ?>
                <li><a href="<?= ROOT ?>/buses">Buses</a></li>
                <li><a href="<?= ROOT ?>/halts">Halts</a></li>
                <li><a href="<?= ROOT ?>/fares">Fare</a></li>
                <li class="button-orange"><a href="<?= ROOT ?>/logout">Logout</a></li>
            </div>
        </ul>

    </nav>

    <div class="grid-container">
        <div class="grid-item grid-item-1">
            <p style="color: #f4511e;">
                <?php
                    echo "Welcome " . $_SESSION['USER']->username . "!";
                ?>
            </p>
            <?php } else {
                ?>

            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <a href="<?= ROOT ?>/login">
                <li class="button-orange" style="background-color:black; border: 2px solid #f4511e;">Login</li>
            </a>
            <a href="<?= ROOT ?>/passengersignup">
                <li class="button-orange" style="border: 2px solid #f4511e;">Sign Up</li>
            </a>
            </div></ul>
            </nav>
            <?php }?>