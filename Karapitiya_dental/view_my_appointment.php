<?php include('config.php');
require_once('dataLayer.php');

if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>View My Appointments</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_view_appointment.css>
    <script src="jquery.min.js"></script>
    <script src="curr_appointment.js"></script>
</head>

<body>
    <div class="header">
        <h2>DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>

    </div>

    <div class="navbar">
        <a href="index.php"> <img src="icons/Home.svg" class="navBarIcons"> Home</a>

        <div class="dropdown">
            <button class="dropbtn"> <img src="icons/Treat.svg" class="navBarIcons"> Treatments
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="basic_treatments.php">Basic Treatments</a>
                <a href="advance_treatments.php">Advance Treatments</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn"> <img src="icons/Appoint.svg" class="navBarIcons"> Appointments
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="add_new_appointment.php">Make new Appointment</a>
                <a href="view_my_appointment.php">View My Appointments</a>
            </div>
        </div>
        <a href="my_profile.php"> <img src="icons/Profile.svg" class="navBarIcons"> My Profile</a>
        <a href="about_us.php"> <img src="icons/About.svg" class="navBarIcons"> About</a>
        <a href="contact_us.php"> <img src="icons/Contact.svg" class="navBarIcons"> Contact</a>
    </div>
    <div class="sub_header">
        <h2>View My Appointments</h2>
    </div>
    <div class="content">
        <?php if (isset($_SESSION["success"])) : ?>
            <div class="success">
                <h3>
                    <?php
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php
        if (isset($_SESSION['username'])) :
        ?>
            <div class="welcome">
                <p>WELCOME <strong> <?php echo $_SESSION['username']; ?></strong>

                </p>
                <p> <a href='index.php?logout=' 1' ' style="color:red;">Logout</a></p>
                </div>
               
                <?php endif ?>
                <?php
                if (!isset($_SESSION['username'])) : ?>
                <div class="welcome">
                    
                <p> <a href=' login.php' style="color:blue;">Login</a></p>
            </div>
        <?php endif ?>
    </div>
    <div>
        <h1 class="head">My Appointments</h1>
        <table class="tbl" id="tbl">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Appointment Number</th>
                    <th>Traetment</th>
                    <th></th>
                </tr>
            </thead>
            <div>
                <?php
                include('myAppointment.php')
                ?>
            </div>

    </div>
    <div class="appoinment">
        <div class="head"><span id="status"></span></div>
    </div>
    <div id="appstatus">

    </div>
</body>

</html>