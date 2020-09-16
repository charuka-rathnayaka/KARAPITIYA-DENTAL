<?php include("dbOperations/config.php");
if (isset($_SESSION["user_type"])) {
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../Karapitiya_dental/css/stylesheet_home.css">
    <script src="menu_file.js"></script>
</head>

<body>
    <div class="topHead">
            <div class="header">
                <img src="icons/Dental Unit Logo.svg" class="mainLogo">
            </div>
            <div class="cont" id="logInBox">
                <?php if(isset($_SESSION["success"])):?>
                    <div class="success">
                        <h3>
                            <?php
                            
                            echo $_SESSION["success"];
                        //echo $_SESSION["user_type"];
                            unset($_SESSION["success"]);
                            ?>
                        </h3>
                    </div>
                    <?php endif ?>
                <?php 
                    if (isset($_SESSION['username'])):
                    
                    ?>
                    <div class="welcome">
                        <p>WELCOME <strong> <?php echo $_SESSION['username']; ?></strong></p>
                        <div class="log"> <a href='index.php?logout='1' ' > <img src="icons/Logout_black.svg" class="navBarIcons"> Logout</a></div>
                    </div>
                
                    <?php endif ?>
                    <?php 
                    if(!isset($_SESSION['username'])): ?>
                    <div class="welcome">
                        <div class="log"> <a href='login.php' > <img src="icons/Login_black.svg" class="navBarIcons"> Login</a></div>
                    </div>
                    <?php endif ?>
                    
                </div>
            </div>
        <div class="navbar">
            <a href="index.php"> <img src="icons/Home.svg" class="navBarIcons"> Home</a>
            <div id="part1">
                <div class="dropdown">
                    <button class="dropbtn"> <img src="icons/Treat.svg" class="navBarIcons"> Treatments
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="basic_treatments.php">Basic Treatments</a>
                        <a href="advance_treatments.php">Advance Treatments</a>  
                    </div> 
                </div>
            </div>
            <div id="part2">
                <div class="dropdown">
                    <button class="dropbtn"> <img src="icons/Appoint.svg" class="navBarIcons"> Appointments
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="add_new_appointment.php">Make new Appointment</a>
                        <a href="view_my_appointment.php">View My Appointments</a>   
                    </div>
                </div>
            </div>
            <div id="doctorPerspective">
                <a href="today_appointments.php"> <img src="icons/Appoint.svg" class="navBarIcons"> View Appointments </a>
                <a href="profile_doctor.php"> <img src="icons/Doctor Profile.svg" class="navBarIcons"> My Profile </a>
                <a href="personal_blog.php"> <img src="icons/Blog.svg" class="navBarIcons"> Blog </a>
            </div>
            <div id="adminPerspective">
                <a href="add_doctor.php"> <img src="icons/Add Doctor.svg" class="navBarIcons"> Add Doctor </a>
            </div>
            <div id="staffPerspective">
                <a href="add_new_appointment.php"> <img src="icons/Add Appointments.svg" class="navBarIcons"> Add Appointments </a>
                <a href="viewAppointment.php"> <img src="icons/Appoint.svg" class="navBarIcons"> View Appointments </a>
            </div>
            <div id="part3">
                <a href="my_profile.php"> <img src="icons/Profile.svg" class="navBarIcons"> My Profile</a>
            </div>
            <div id="part4">
                <a href="about_us.php"> <img src="icons/About.svg" class="navBarIcons"> About</a>
                <a href="contact_us.php"> <img src="icons/Contact.svg" class="navBarIcons"> Contact</a>
            </div>
        </div>
            
           <?php include('user_type_menu.php');
           ?> 


    <div class="homePageContent">

        <div id="slider">
            <figure>
                <img src="images/img1.jpg" class="sliderImg">
                <img src="images/img2.jpg" class="sliderImg">
                <img src="images/img3.jpg" class="sliderImg">
                <img src="images/img4.jpg" class="sliderImg">
                <img src="images/img5.jpg" class="sliderImg">
            </figure>
        </div>
        <div id="news">
            <img src="images/side.svg" class="sideBackground">
            <div id="sides1">
                <a href="basic_treatments.php" class="sideBtns" id="sideBtn1" onmouseover="showDetail1(this)" onmouseout="hideDetail1(this)"> <img src="icons/sideBtn1.svg"></a>
                <img src="icons/sideDetail1.svg" id="sideDetail1" onmouseover="showDetail1()" onmouseout="hideDetail1()">
                <p id="p1">Quick Treatments</p>
            </div>
            <div id="sides2">
                <a href="view_my_appointment.php" class="sideBtns" id="sideBtn2" onmouseover="showDetail2(this)" onmouseout="hideDetail2(this)"><img src="icons/sideBtn2.svg"></a>
                <img src="icons/sideDetail2.svg" id="sideDetail2" onmouseover="showDetail2()" onmouseout="hideDetail2()">
                <p id="p2">View Appointments</p>
            </div>
            <div id="sides3">
                <a href="contact_us.php" class="sideBtns" id="sideBtn3" onmouseover="showDetail3(this)" onmouseout="hideDetail3(this)"><img src="icons/sideBtn3.svg"></a>
                <img src="icons/sideDetail3.svg" id="sideDetail3" onmouseover="showDetail3()" onmouseout="hideDetail3()">
                <p id="p3">Contact Us</p>
            </div>
            <script>
                    var d1= document.getElementById("sideDetail1");
                    var d2= document.getElementById("sideDetail2");
                    var d3= document.getElementById("sideDetail3");
                    var p1= document.getElementById("p1");
                    var p2= document.getElementById("p2");
                    var p3= document.getElementById("p3");
                    function showDetail1(b1){
                        d1.style.display = "block";
                        p1.style.display = "block";
                    }
                    function showDetail2(){
                        d2.style.display = "block";
                        p2.style.display = "block";
                    }
                    function showDetail3(){
                        d3.style.display = "block";
                        p3.style.display = "block";
                    }
                    function hideDetail1(){
                        d1.style.display = "none";
                        p1.style.display = "none";
                    }
                    function hideDetail2(){
                        d2.style.display = "none";
                        p2.style.display = "none";
                    }
                    function hideDetail3(){
                        d3.style.display = "none";
                        p3.style.display = "none";
                    }
                </script>
        </div>
    </div>

</body>

</html>
