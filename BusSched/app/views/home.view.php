<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Home page view</title>
</head>
<body>
    <nav class="navbar">
    <div><h2><a href="<?=ROOT?>/home" id="logo_white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
    <div class="menu">
    <?php
        if(isset($_SESSION['USER'])){
    ?> 
    <li><a href="<?=ROOT?>/buses">Buses</a></li>
    <li><a href="<?=ROOT?>/halts">Halts</a></li>
    <li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
    </div>
    </ul>

    </nav>
    
    <?php
        echo "Welcome ".$_SESSION['USER']->username."!";
    ?>

    <h1>Home page view</h1>
    <div>
        
    <h2>
    <br>
    <a href="<?=ROOT?>/buses">BUSES</a><br>
    <a href="<?=ROOT?>/halts">HALTS</a><br>

    <?php }
    else{
    ?>
    
    <li class="button-orange"><a href="<?=ROOT?>/login">Login</a></li>
    </nav>

    <?php
        echo "Not logged in.";
    ?>
    
    <br><br><a href="<?=ROOT?>/login">ADMIN - LOGIN</a>
    <br><a href="<?=ROOT?>/signup">PASSENGER - SIGNUP</a>
    <br><br><a href="<?=ROOT?>/ownerlogin">BUS OWNER - LOGIN</a>
    <br><a href="<?=ROOT?>/ownersignup">BUS OWNER - SIGNUP</a>

    <?php } ?>
    </div>

    </h2>
    
</body>
</html>
