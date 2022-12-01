<?php 
  require_once('includes/connection.php');
  require_once("includes/header-logged.php");


  if(!isset($_SESSION['user_id']))
    header('Location: login.php');

    $farelist = '';
    
    $query = "SELECT * FROM fare";

    $fares = mysqli_query($connction, $query);
    if($fares){
        while($fare = mysqli_fetch_assoc($fares)){
            $farelist.= "<tr>";
            $farelist.="<td>{$fare['source']}</td>";
            $farelist.="<td>{$fare['dest']}</td>";
            $farelist.="<td>{$fare['route_bus']}</td>";
            $farelist.="<td>{$fare['type_bus']}</td>";
            $farelist.="<td>{$fare['amount']}</td>";
            $farelist.="<td>{$fare['last_updated']}</td>";
            $farelist.="<td><a href=\"modify-fare.php?fare_id={$fare['id']}>\"><button><i class=\"fa-solid fa-pen-to-square\"></i></button></a>
            <a href=\"delete-fare.php?fare_id={$fare['id']}>\"><button><i class=\"fa-solid fa-trash\"></i></button></a>
            </td>";
            
        }
    
    }else{
        echo "Database select fare query failed";
    }

?>
<style>
    <?php 
        include("css/fare_table.css");
        include("css/add_fare.css");
    ?>
</style>
<div class="table">
    <div class="table-header">
        <p>Bus Fare</p>
        <div>
            <input type="text">
            <a href="add_fare.php"><button class="add-new" onclick="openForm()" id="add">Add New</button></a>
        </div>
    </div>
    <div class="table-section">
        <table>
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Route</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="overflow-y: auto;">
            <?php 
                echo $farelist;
            ?>  
            </tbody>
        </table>
    </div>
</div>
<script>
    
      
    </script>