<?php include("dbOperations/config.php");


if (empty($_SESSION['username']) || ($_SESSION['user_type'] != "Doctor")) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="../Karapitiya_dental/css/stylesheet_my_profile.css">
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

    <div class="content">
        <div class="topic">
            <h3>My Profile</h3>
        </div>
        <br>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Username</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id="Username"></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Registration No.</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id="Reg_num"></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Firstname</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id='Firstname'></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Lastname</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id="Lastname"></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Email</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id="Email"></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Birthday</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id="Birthday"></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Gender</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id='Gender'></label></div>
            </div>
            <div class="input-data">
                <div class="l1"><label class="fieldz">Quallifications</label></div>
                <div class="l2"><label class="dots">:</label></div>
                <div class="l3"><label class="data" id='Qualifications'>></label></div>
            </div>
            <br>
            <button id="myButton" class="float-left submit-button">Change Password</button>

            <script type="text/javascript">
                document.getElementById("myButton").onclick = function() {
                    location.href = "confirm_password.php";
                };
            </script>


        </div>
        <script>
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myObj = JSON.parse(this.responseText);
                    document.getElementById("Firstname").innerHTML = myObj.Firstname;
                    document.getElementById("Lastname").innerHTML = myObj.Lastname;
                    document.getElementById("Email").innerHTML = myObj.Email;
                    document.getElementById("Birthday").innerHTML = myObj.Birthday;
                    document.getElementById("Gender").innerHTML = myObj.Gender;
                    document.getElementById("Username").innerHTML = myObj.Username;
                    document.getElementById("Reg_num").innerHTML = myObj.Reg_num;
                    document.getElementById("Qualifications").innerHTML = myObj.Qualifications;
                }
            };
            xmlhttp.open("GET", "dbOperations/dr_profile.php", true);
            xmlhttp.send();
        </script>

</body>

</html>
