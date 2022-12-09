<?php 
    require_once('../core/connection.php');

    // if(!isset($_SESSION['user_id']))
    // header('Location: login.php');

    $errors = array();

    $src = '';
    $dest = '';
    $type = '';
    $route = '';
    $amount = '';

    if(isset($_POST['add_new'])){

    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $type = $_POST['route'];
    $route = $_POST['type'];
    $amount = $_POST['amount'];

        $req_fields = array('src', 'dest', 'route', 'type', 'amount');

        foreach($req_fields as $field){
            if(empty(trim($_POST[$field]))){
                $errors[] = $field . ' is required';
            }
        }

        $src = mysqli_real_escape_string($connction, $_POST['src']);
        $dest = mysqli_real_escape_string($connction, $_POST['dest']);
        $type = mysqli_real_escape_string($connction, $_POST['type']);
        $route = mysqli_real_escape_string($connction, $_POST['route']);
        $amount = mysqli_real_escape_string($connction, $_POST['amount']);
        date_default_timezone_set('Asia/Kolkata');
        $dt2=date("Y-m-d h:i:sa");

        $check_duplicate = mysqli_num_rows(mysqli_query($connction, "SELECT * FROM fare WHERE source='$src' AND dest = '$dest' AND route_bus='$route'"));

        if($check_duplicate>0){
            $errors[] = 'Already existing record';
        }

        if(empty($errors)){
            
            $query = "INSERT INTO fare (source, dest, route_bus, type_bus, amount, last_updated) VALUES ('$src', '$dest', '$route', '$type', '$amount', '$dt2')";

            $result = mysqli_query($connction, $query);

            if($result){
                echo "<script>alert('inserted successfully');</script>";
                echo "<script>window.location.reload();</script>";
                header("Location: ../view/fare_table.php");

            }else{
                echo "<script>alert('registration failed');</script>";
            }

        }
    }

        
?>

<style>
    <?php 
        include("css/add_fare.css");
        
    ?>
</style>

<!-- <div id="t-header" class="table-header" style="display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: beige;">
        <p>Bus Fare</p>
        <div>
            
            <a href="scheduler_dashboard.php"><button class="back" onclick="Change()">Back</button></a>
        </div>
    </div> -->

    <?php 
        if(!empty($errors)){
            echo '<div class="errmsg">';
            // echo 'There was empty fileds '.'</br>';
            foreach($errors as $error){
                echo $error .'</br>';
            }
            echo '</div>';

            $max_len_fields = array('src' => 20, 'dest' => 20, 'route'=> 11, 'type' => 11, 'amount' => 11);
        foreach($max_len_fields as $field => $max_len){
            if(strlen(trim($_POST[$field])) > $max_len){
                $errors[] = $field. 'must be less than ' . $max_len . 'characters';
            }
        }
        }

        
    ?>  

    