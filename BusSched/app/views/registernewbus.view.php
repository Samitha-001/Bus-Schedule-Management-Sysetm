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
   
   <form method="post" id="view_registernewbus" style="margin-left: 150px;background-color:white;font-size:18px;line-height:3em" >

<?php if (!empty($errors)) : ?>
    <?= implode("<br>", $errors) ?>
<?php endif; ?>

<div>
    <table >
    <tr>
                        <td style="color:#24315e;"><label for="bus_no">Bus No. </label></td>
                        <td><input name="bus_no" type="text" class="form-control" id="bus_no" required></td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="source">Source</label></td>
                        <td ><input name="source" type="text" id="source" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td style="color:#24315e;"><label for="dest">Destination </label></td>
                        <td><input name="dest" type="text" class="form-control" id="dest"  required></td>
                    </tr>


        <tr>
            <td style="color:#24315e;"><label for="owner">Owner </label></td>
            <td><input name="owner" type="text" class="form-control" id="owner"  required></td>
        </tr>

        <tr>
            <td style="color:#24315e;"><label for="license_no">License No. </label></td>
            <td><input name="license_no" type="text" class="form-control" id="license_no"  required></td>
        </tr>

        <tr>
            <td style="color:#24315e;"><label for="cond">Assigned Conductor </label></td>
            <td><input name="cond" type="text" class="form-control" id="cond"  required></td>
        </tr>

        <tr>
            <td style="color:#24315e;"><label for="cond_cont_no">Conductor Contact Number</label></td>
            <td><input name="cond_cont_no" type="text" class="form-control" id="cond_cont_no"  required></td>
        </tr>

        <tr>
            <td style="color:#24315e;"><label for="driver">Assigned Driver </label></td>
            <td><input name="driver" type="text" class="form-control" id="driver"  required></td>
        </tr>

        <tr>
            <td style="color:#24315e;"><label for="dri_cont_no">Driver Contact Number </label></td>
            <td><input name="dri_cont_no" type="text" class="form-control" id="dri_cont_no"  required></td>
        </tr>

       
        <tr>
            <td></td>
            <td align="right">
                <button class="button-green" type="submit" style="margin-left: 450px">Register</button>
            </td>
        </tr>

    </table>
</div>
</form>
  </div>
</div> 
</main>
</body>

</html>


