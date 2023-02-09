<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Register New Bus</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
</head>

<body>
<?php
include 'components/ownernavbar.php';
include 'components/ownersidebar.php';
?>
<main class="container1">

<div class="row">
  <div class="column left">
  <img src="<?= ROOT ?>/assets/images/backgrounds/bus6.png" class="image">
  </div>
  <div class="column middle">
   <h1 class="content">Add New Bus</h1>
   
                <form style="margin-left: 150px;background-color:white;margin-bottom:100px" class="form">
                 Bus No. <input placeholder="NW-2123" style="width:40%;font-size:18px;margin-left:180px"><br>
                 Source<input placeholder="Piliyandala" style="width:40%;font-size:18px;margin-left:190px"><br>
                 Destination<input placeholder="Fort" style="width:40%;font-size:18px;margin-left:155px"><br>
                 Owner<input placeholder="P.W. Nanayakkara" style="width:40%;font-size:18px;margin-left:190px"><br>
                 License No.<input placeholder="204561250" style="width:40%;font-size:18px;margin-left:155px"><br> 
                 Assigned Conductor<input placeholder="W.P. Silva" style="width:40%;font-size:18px;margin-left:85px"><br>
                 Conductor Contact Number<input placeholder="0772345612" style="width:40%;font-size:18px;margin-left:20px"><br>
                 Assigned Driver<input placeholder="A.K.Ananda" style="width:40%;font-size:18px;margin-left:115px"><br>
                 Driver Contact Number<input placeholder="0714325678" style="width:40%;font-size:18px;margin-left:55px"><br>
                 <button type="submit" class="Button" style="margin-left: 450px;background-color: rgb(90, 221, 96)">Register</button>
                </form>
  </div>
</div> 
</main>
</body>

</html>