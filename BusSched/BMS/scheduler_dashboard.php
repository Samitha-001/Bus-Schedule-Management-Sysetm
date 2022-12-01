<?php 
require_once("includes/header-logged.php");
session_start();

if(!isset($_SESSION['user_id']))
    header('Location: login.php')
?>
<style>
    <?php 
        include("css/dashboard.css");
    ?>
    
    .modle{
        
        top: 50%;
        left: 50%;
    }

</style>
<div class="dashboard">
    <div class="tabs">
        <div class="tab-header">
            <div class="active" class="sec"><img src="img/Profile.png" alt=""></div>
            <div class="sec"><img src="img/Location.png" alt=""></div>
            <div class="sec"><img src="img/Ticket.png" alt=""></div>
            <div class="sec"><img src="img/Rating.png" alt=""></div>
            <div class="sec"><img src="img/icons8-timetable-50 2.png" alt=""></div>
            <div class="sec"><img src="img/Bus Icon.png" alt=""></div>
        </div>
        <div class="tab-body">
            <div class="active">
                <div class="wrapper">
                    <div class="profile_pic">Profile Pic</div>
                    <div class="editing">Editing</div>
                    <div class="options">Others</div>
                </div>
            </div>
            <div>
                
            </div>
            <div id="tab3">
                
                <div id="overlay"></div>
                <?php 
                    require('fare_table.php');
                ?>
                
            </div>
            <div id="tab4"> 
                <h1>Rating</h1>
                <p>4Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis obcaecati iure recusandae neque dolore odio. Libero delectus natus quod quam enim perspiciatis. Vitae laboriosam, corporis ipsum enim ab sunt totam.</p>
            </div>    
            <div id="tab5"> 
                <h1>Schedule</h1>
                <p>4Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis obcaecati iure recusandae neque dolore odio. Libero delectus natus quod quam enim perspiciatis. Vitae laboriosam, corporis ipsum enim ab sunt totam.</p>
            </div>    
            <div id="tab5"> 
                <h1>Bus List</h1>
                <p>4Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis obcaecati iure recusandae neque dolore odio. Libero delectus natus quod quam enim perspiciatis. Vitae laboriosam, corporis ipsum enim ab sunt totam.</p>
            </div>    
        </div>
    </div>
</div>
<script>
    let tabs = document.querySelector(".tabs");
    let tabHeader = document.querySelector(".tab-header");
    let tabBody = document.querySelector(".tab-body");
    let tabHeaders = tabHeader.querySelectorAll("div");

    for(let i=0; i<tabHeaders.length; i++){
        tabHeaders[i].addEventListener("click", function(){

        tabHeader.querySelector(".active").classList.remove("active");
            tabHeaders[i].classList.add("active");
            tabBody.style.marginTop = `-${i*100}vh`; 
        })
    }

    document.getElementById("addForm").style.display = "none";
    document.getElementById("t-header").style.display = "none";

const btn1 = document.querySelector('.back');
    function Change(){
        tabBody.style.marginTop = "-200vh";

    }

    function openForm() {
        document.getElementById("tab3").style.backgroundColor = "red"
        document.getElementById('myForm').style.display = "block";  

      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }

</script>

