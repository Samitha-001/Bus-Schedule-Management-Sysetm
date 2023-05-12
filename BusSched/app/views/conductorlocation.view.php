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

// $id=$_GET['tripID'];
// // $id=substr($ids, 1);
// if ($id[0]=='/'):
//     $id=substr($id, 1);
// endif;    
// show($id);
$id=11;
$trip = new Trip();
$tripx=$trip->first(['id'=>$id]);
if (!$tripx) {
    echo "Invalid trip id: $id";
    exit;
}

$source=$tripx->starting_halt; 

$halts=array("Werahera","Boralesgamuwa","Rattanapitiya","Pepiliyana","Kohuwala","Dutugemunu St.","Pamankada","Havelock City","Thimbirigasyaya","Thummulla","Kumaratunga M. Rd","Cambridge Place","Public Library","Dharmapala Mw.","Town Hall","Ibbanwala Junction","T.B. Jayah Rd.","Gamani Hall Jct.","D.r. Wijewardena Rd","Lake House","Pettah");

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
            <?php foreach ($halts as $halt) { ?>
                <tr>
                <td><?= $halt?></td>
                <td>
                    <form method="post" action="<?= ROOT ?>/conductorlocations">
                    <input type="hidden" name="trip_id" value="<?= $tripx->id ?>">
                    <input type="hidden" name="location" value="<?= $halt ?>">
                    <button type="submit" >Update</button>
                    </form>
                </td>
                </tr>
            <?php } ?>

<?php endif;
            else: ?>
           
 

            <?php endif; ?>

      
            <script src="<?= ROOT ?>/assets/js/trips.js"></script>
    </main>

</body>

</html>