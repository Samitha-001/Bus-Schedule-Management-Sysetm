<?php
require_once "menu.php";

if(!isset($_SESSION['user_id']))
    header('Location: login.php');

?>
<div class="data">
    <?php 
    echo $_SESSION['user_id'] . "<br>"; 
    echo $_SESSION['user_name'] . "<br>";
    echo $_SESSION['user_email'] . "<br>";
    ?>
</div>