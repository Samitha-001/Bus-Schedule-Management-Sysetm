<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/landing.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Home page view</title>
</head>
<body>
    <nav class="navbar">
    <div><h2><a href="<?=ROOT?>/home" id="logo-white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
    <div class="menu">
    <?php
        if(isset($_SESSION['USER'])){
    ?> 
    <li><a href="<?=ROOT?>/buses">Buses</a></li>
    <li><a href="<?=ROOT?>/halts">Halts</a></li>
    <li><a href="<?=ROOT?>/fares">Fare</a></li>
    <li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
    </div>
    </ul>

    </nav>
    
    <?php
        // echo "Welcome ".$_SESSION['USER']->username."!";
    ?>

    <?php }
    else{
    ?>
    
    <li><a href="#">Services</a></li>
    <li><a href="#">About</a></li>
    <a href="<?=ROOT?>/login"><li class="button-orange" style="background-color:black; border: 2px solid #f4511e;">Login</li></a>
    <a href="<?=ROOT?>/signup"><li class="button-orange" style="border: 2px solid #f4511e;">Sign Up</li></a>
    </nav>
    
    <?php } ?>

    </h2>
    <!-- <div class="landing-bg"> -->
        <div class="grid-container">
            <div class="grid-item grid-item-1">
                <h1 style="padding: 0px;">Find a Bus</h1><br>
                <label for="from">From</label>
                <input type="text" name="from" id="from" placeholder="Choose city"><br><br> 
                <label for="to">To</label>
                <input type="text" name="to" id="to" placeholder="Choose city"><br><br><br>
                <button id="btn" class="button-orange" onclick="#" style="width: 140px; align:right;">Find</button>
            </div>
        </div>
    <!-- </div> -->
    <div>
    <!-- <h3>Our Services</h3>
    <h1>What we can do for you</h1> -->
    </div>
</body>
</html>
