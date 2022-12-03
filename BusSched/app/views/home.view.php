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
    <h1>Home page view</h1>
    <div>
        
    <h2>
    
    <?php
        if(isset($_SESSION['USER'])){
            
            echo "Welcome ".$_SESSION['USER']->username."!";
    ?><br>
    <br>
    <a href="<?=ROOT?>/buses">BUSES</a><br>
    <a href="<?=ROOT?>/halts">HALTS</a><br><br>
    <a href="<?=ROOT?>/logout">LOGOUT</a>

    <?php }
    else{
        echo "Not logged in."?>
    
    <br><br><a href="<?=ROOT?>/login">PASSENGER - LOGIN</a>
    <br><a href="<?=ROOT?>/signup">PASSENGER - SIGNUP</a>
    <br><br><a href="<?=ROOT?>/ownerlogin">BUS OWNER - LOGIN</a>
    <br><a href="<?=ROOT?>/ownersignup">BUS OWNER - SIGNUP</a>

    <?php } ?>
    </div>

    </h2>
    
</body>
</html>