<?php 
  require('includes/header.php')
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
</head>
<body> -->
<div class="home-content">
      <div class="find">
        <h1 class="find-title">Find Bus</h1>
        <div class="from-to">
            <div class="from">
                <h3>From</h3>
                <select name="halt" id="halt" class="select-from">
                    <option selected disabled></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="to">
                <h3>To</h3>
                <select name="halt" id="halt" class="select-from">
                    <option selected disabled></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
        </div>
      </div>
      <div class="pic"></div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>