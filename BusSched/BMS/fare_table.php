<?php 
    require_once "menu.php";
    

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
            $farelist.="</tr>";
            
        }
    
    }else{
        echo "Database select fare query failed";
    }

?>
<style>
    <?php 
        include("css/fare_table.css");
    ?>
</style>
<div class="data">
<div class="table">
    <div class="table-header">
        <p>Bus Fare</p>
        <div>
            <button class="add-new" onclick="openForm()" id="add">Add New</button>
        </div>
    </div>
    <div class="wrapper_div">
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
            <tbody>
            <?php 
                echo $farelist;
            ?>  
            </tbody>
        </table>
        </div>
    </div>
</div>
<div class="popup" id="popUp" style="display: none;">
        <div class="form">
            <h2>Add Fare</h2>
            <form action="fare_table.php" class="add-form" method="post" id="addForm">
                <div class="form-element">
                    <?php 
                        require_once "add_fare.php";
                        
                    ?>
                </div>
                <div class="form-element">
                    <label for="">From</label>
                    <input type="text" name="src" <?php echo 'value="' .$src . '"';?> required>
                </div>
                <div class="form-element">
                    <label for="">To</label>
                    <input type="text" name="dest" <?php echo 'value="' .$dest . '"';?>>
                </div>
                <div class="form-element">
                    <label for="">Route</label>
                    <input type="text" name="route" <?php echo 'value="' .$route . '"';?> required>
                </div>
                <div class="form-element">
                    <label for="">Type</label>
                    <input type="text" name="type" <?php echo 'value="' .$type . '"';?> required>
                </div>
                <div class="form-element">
                    <label for="">Amount</label>
                    <input type="text" name="amount" <?php echo 'value="' .$amount . '"';?> required>
    	        </div>    
                    <label for="">&nbsp;</label>
                    <input class="add_cancel" type="submit" name="add_new">   
                    <input class="add_cancel" type="button" value="Cancel" onclick="cancel()">   
            </form>
            
        </div>
    </div>
</div>

    

<script>
    function openForm(){
      document.getElementById("popUp").style.display = "block";
      document.getElementById("table").style.backgroundColor = "red";
      window.location.reload();
    }
    function cancel(){
      document.getElementById("popUp").style.display = "none";
    }

</script>