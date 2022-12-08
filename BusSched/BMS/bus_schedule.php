<?php
require_once "menu.php";

if(!isset($_SESSION['user_id']))
    header('Location: login.php');
?>
<div class="data">Schedule will be shown here</div>