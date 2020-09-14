<?php include("dbOperations/config.php");


if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_view_appointment.css>
    <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
    <script src="jquery.min.js"></script>
    <script src="autofill.js"></script>
</head>

<body>
    <div class="topHead">
        <div class="header">
            <img src="icons/Dental Unit Logo.svg" class="mainLogo">
        </div>
        <div class="content" id="logInBox">
            <?php if (isset($_SESSION["success"])) : ?>
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
            if (isset($_SESSION['username'])) :

            ?>
                <div class="welcome">
                    <p>WELCOME <strong> <?php echo $_SESSION['username']; ?></strong></p>
                    <div class="log"> <a href='index.php?logout=' 1' ' > <img src="icons/Logout_black.svg" class="navBarIcons"> Logout</a></div>
                    </div>
                
                    <?php endif ?>
                    <?php
                    if (!isset($_SESSION['username'])) : ?>
                    <div class="welcome">
                        <div class="log"> <a href=' login.php'> <img src="icons/Login_black.svg" class="navBarIcons"> Login</a></div>
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
            <a href="today_appointments.php"> <img src="icons/About.svg" class="navBarIcons"> View Appointments </a>
            <a href="profile_doctor.php"> <img src="icons/Profile.svg" class="navBarIcons"> My Profile </a>
            <a href="personal_blog.php"> <img src="icons/About.svg" class="navBarIcons"> Blog </a>
        </div>
        <div id="adminPerspective">
            <a href="add_doctor.php"> <img src="icons/About.svg" class="navBarIcons"> Add Doctor </a>
        </div>
        <div id="staffPerspective">
            <a href="add_new_appointment.php"> <img src="icons/About.svg" class="navBarIcons"> Add Appointments </a>
            <a href="viewAppointment.php"> <img src="icons/Profile.svg" class="navBarIcons"> View Appointments </a>
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
    <h2>APPOINTMENTS - TODAY</h2>
    <div>
        <input type="text" name="username" id="username" class="form-control" />
        <div class="tbl" id="usernameList"></div>
    </div>
    <div>

        <table class="tbl">
            <thead>
                <tr>
                    <th>User name</th>
                    <th>Date</th>
                    <th>Appointment Number</th>
                    <th>Traetment</th>
                </tr>
            </thead>
            <div id="tabledata">
                <?php include('dbOperations/todayAppData.php');
                ?>
            </div>
        </table>
    </div>
    <div id="appointmentdata">

    </div>


</body>

</html>