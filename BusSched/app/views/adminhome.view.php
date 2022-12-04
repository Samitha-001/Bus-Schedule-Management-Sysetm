<?php
    if(!isset($_SESSION['USER'])){
        redirect('home');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style2.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <title>Admin - Home</title>
</head>
<body>
    
    <nav class="navbar">
    <div><h2><a href="<?=ROOT?>/adminhome" id="logo_white">BusSched</a></h2></div>
    
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">    
    <li class="button-orange"><a href="<?=ROOT?>/logout">Logout</a></li>
    </div>
    </ul>

    </nav>

    <div>
    <h2>
    <?php
        echo "Welcome ".$_SESSION['USER']->username."!";
    ?>
    </div>
    </h2>

    <h3>Personal Info</h3>
    <ul>    
        <table>
            <?php
            show(get_defined_vars());
            ?>

            <tr>
                <th>Username: </th>
                <td><?=$_SESSION['USER']->username?></td>
            </tr>
            <tr>
                <th>Name: </th>
                <td><?=$_SESSION['USER']->name?></td>
            <tr>
                <th>Email: </th>
                <td><?=$_SESSION['USER']->email?></td>
            </tr>
            <tr>
                <th>Phone: </th>
                <td><?=$_SESSION['USER']->phone?></td>
            </tr>
            <tr>
                <th>Address: </th>
                <td><?=$_SESSION['USER']->address?></td>
            </tr>
        </table>
    </ul>
</body>
</html>
