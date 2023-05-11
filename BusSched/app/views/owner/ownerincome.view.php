<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php';?>

    <title>Income</title>

    <link href="<?= ROOT ?>/assets/css/style2.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner_view.css" rel="stylesheet">
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>
<main class="container1">

        <div class="header orange-header">
                <h3>Income</h3>
        </div>
    
     <div class="row">
          <div class="column left2">

          <div class="top">
            <div class="time">
                2022-11-11
            </div>


         <div class="row">
            <div class="column details">
              <li>Total E-ticket Income</li>
              <li>No. of Buses</li> 
            </div>

            <div class="column income">
              <li>Rs.50,000</li>
              <li>10</li> 
            </div>
          </div>
          
        </div>

       <div class="bottom">
       <div class="row">
            <div class="column leftleft">
              <li>Bus No.</li>
            </div>

            <div class="column leftright">
              <li>E-ticket Income</li>
            </div>
          </div>
        
          
       </div>
       <div class="imag"><img src="<?= ROOT ?>/assets/images/backgrounds/hlines.jpg" ></div>
      </div>

   
      
     

        <div class="column right2">
        <div class="row">
              <div class="image">
              
              </div>

    <div class="money">
       
    
    </div>
    
   </div>
  </div>
        </div>


     </div>
    
</main>
</body>

</html>