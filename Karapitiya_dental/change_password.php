<?php include('config.php');
//require_once('patient_profile.php');
if (empty($_SESSION['username']) ) {
    header("location:login.php");
}
if (empty($_SESSION['password_confirmation']) ) {
    header("location:my_profile.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_my_profile.css>
   
</head>

<body>
    <div class="header">
        <h2>DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>

    </div>
    <div class="navbar">
        <a href="index.php">Home</a>
        <div id="part1">
            <div class="dropdown">
                <button class="dropbtn">Treatments
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
                <button class="dropbtn">Appointments
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="add_new_appointment.php">Make new Appointment</a>
                    <a href="view_my_appointment.php">View My Appointments</a> </div>
            </div>
        </div>
        <div id="part3">
            <a href="my_profile.php">My Profile</a>
        </div>
        <div id="part4">
            <a href="about_us.php">About</a>
            <a href="contact_us.php">Contact</a>
        </div>
    </div>

    <?php include('user_type_menu.php');
    ?>

    <div class="log">
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

                <p> <a href="index.php?logout='1' " style="color:red;">Logout</a></p>
            </div>



        <?php endif ?>
        <?php
        if (!isset($_SESSION['username'])) : ?>
            <div class="welcome">

                <p> <a href='login.php' style="color:blue;">Login</a></p>
            </div>
        <?php endif ?>
    </div>
    <div class="content">
        <div class="topic">
            <h1>Change password</h1>

        </div><div class="input-data">
        <form method="POST" action="change_password.php">
            <?php include("errors.php");
             ?>            
            
            <label>Username:</label>
            <label id="Username"><?php echo $_SESSION["username"] ?></label>

        </div>
            <div class="input-data">
                <label>New Password</label>
                <input type="password" name="password1">
            </div>
            <div class="input-data">
                <label>Confirm New Password</label>
                <input type="password" name="password2">
            </div>
            
            <div class="input-data">
                <button type="submit" name="change_password" class="btn">Change Password</button>
            </div>
            </div>


            </form>
        
    </body>
</html>
