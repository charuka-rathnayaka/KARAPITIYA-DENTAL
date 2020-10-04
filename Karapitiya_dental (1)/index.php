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


    <div class="homePageContent1">

        <div id="slider">
            <figure>
                <img src="images/img1.jpg" class="sliderImg">
                <img src="images/img2.jpg" class="sliderImg">
                <img src="images/img3.jpg" class="sliderImg">
                <img src="images/img4.jpg" class="sliderImg">
                <img src="images/img5.jpg" class="sliderImg">
            </figure>
        </div>
        <div class="iframeVid">
        <iframe width="560" height="360" src="https://www.youtube.com/embed/BapR9J86ZZw" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div id="vidLabel">
                <p>"Teeth are alive, and given the proper environment, they can regenerate; this is why internal factors that nourish the teeth are so important.." </p>
                <div id="quote_name">
                <p>~ Nadine Artemis</p>
                </div>
               
            </div>
            
        </div>
    </div>
    <div class="homePageContent2">
        <div class="shortcuts">
            <a href="basic_treatments.php">
                <img src="icons/sideBtn1.svg" class="shortcutIcons">
                <h2>Quick Treatments</h2>
            </a>
            <a href="view_my_appointment.php">
                <img src="icons/sideBtn2.svg" class="shortcutIcons">
                <h2>View Appointments</h2>
            </a>
            <a href="contact_us.php">
                <img src="icons/sideBtn3.svg" class="shortcutIcons">
                <h2>Contact Us</h2>
            </a>
        </div>
               
    </div>

</body>

</html>
