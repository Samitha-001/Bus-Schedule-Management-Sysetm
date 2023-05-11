<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Ticket</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
    <link href="<?= ROOT ?>/activetickets">
    
</head>

<body>
<?php include 'components/navbarcon.php'; 
        // include 'components/conductorsidebar.php';
?>
  <main class="container1">
    <div class="col-1">
        <div class="header orange-header">
        <h1>Location</h1>
            
        </div>
        </div>

        <div class="data-table"></div>
        <div class="selection">
                 
        </div>  
      <?php

$id=$_GET['tripID'];
$trip = new Trip();
$tripx=$trip->first(['id'=>$id]);
    //   $trip=new Trip(); 
    //   $trips=$trip->getTripdetails($id);
//  show($tripx);

$source=$tripx->starting_halt;
?>
<div class="col-2">
            <table border='1' class="styled-table" id="tickets">
                <tr>
                    <th>Location</th>
                    <th>Update</th>
            </tr>
    <?php
if (!empty($tripx)):
        if ($source == 'Piliyandala'): ?>
            <tr>
            <td data-fieldname="Werahera">Werahera</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
            <tr>
            <td data-fieldname="Boralesgamuwa">Boralesgamuwa</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
            <tr>
            <td data-fieldname="Rattanapitiya">Rattanapitiya</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Pepiliyana">Pepiliyana</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

<tr>
            <td data-fieldname="Kohuwala">Kohuwala</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Dutugemunu St.">Dutugemunu St.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Pamankada">Pamankada</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Havelock City">Havelock City</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Thimbirigasyaya">Thimbirigasyaya</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Thummulla">Thummulla</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Kumaratunga M. Rd">Kumaratunga M. Rd</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Cambridge Place">Cambridge Place</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Public Library">Public Library</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Dharmapala Mw.">Dharmapala Mw.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Town Hall">Town Hall</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Ibbanwala Junction">Ibbanwala Junction</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="T.B. Jayah Rd.">T.B. Jayah Rd.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Gamani Hall Jct.">Gamani Hall Jct.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="D.r. Wijewardena Rd">D.r. Wijewardena Rd</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Lake House">Lake House</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

<tr>
            <td data-fieldname="Fort">Fort</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

<tr>
            <td data-fieldname="Pettah">Pettah</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<?php endif;
            else: ?>
             <tr>
            <td data-fieldname="Pettah">Pettah</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Fort">Fort</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Lake House">Lake House</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="D.r. Wijewardena Rd">D.r. Wijewardena Rd</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Gamani Hall Jct.">Gamani Hall Jct.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="T.B. Jayah Rd.">T.B. Jayah Rd.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Ibbanwala Junction">Ibbanwala Junction</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Town Hall">Town Hall</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Dharmapala Mw.">Dharmapala Mw.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Public Library">Public Library</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Cambridge Place">Cambridge Place</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Kumaratunga M. Rd">Kumaratunga M. Rd</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Thummulla">Thummulla</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Thimbirigasyaya">Thimbirigasyaya</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Havelock City">Havelock City</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

<tr>
            <td data-fieldname="Pamankada">Pamankada</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Dutugemunu St.">Dutugemunu St.</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Kohuwala">Kohuwala</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>
<tr>
            <td data-fieldname="Pepiliyana">Pepiliyana</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

            <tr>
            <td data-fieldname="Rattanapitiya">Rattanapitiya</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>
<tr></tr>

            <tr>
            <td data-fieldname="Boralesgamuwa">Boralesgamuwa</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr> <tr>
            <td data-fieldname="Werahera">Werahera</td>   
            <td class="update-location-btn">
                <button class="button-green">Upadate</button>
            </td>
            </tr>


            <?php endif; ?>
<?php 
$tripx->updateTripLocation($id, "Werahera");
?>
      

    </main>

</body>

</html>