<?php include('config.php');

if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_view_appointment.css>
    <script src="jquery.min.js"></script>
    <script src="autofill.js"></script>
</head>

    <body>
    <div class="header">
            <h2>DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>
            
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
                <a href="view_my_appointment.php">View My Appointments</a>   </div>
            </div>
            </div>
            <div id="part3">
            <a href="my_profile.php"> <img src="icons/Profile.svg" class="navBarIcons"> My Profile</a>
</div>
            <div id="part4">
            <a href="about_us.php"> <img src="icons/About.svg" class="navBarIcons"> About</a>
            <a href="contact_us.php"> <img src="icons/Contact.svg" class="navBarIcons"> Contact</a>
</div>
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
        include('user_type_menu.php');
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
    <h2>APPOINTMENTS - TODAY</h2>
    <div>
        <input type="text" name="username" id="username" class="form-control" />
        <div class="tbl" id="usernameList"></div>
    </div>
    <div>
        <form class="tbl" method="POST" id="appointmentdata" action="saveappointment.php">

        </form>

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
                <?php
                $database = mysqli_connect('localhost', 'root', '', 'dentalkarapitiya');
                $date = date("d-m-Y");
                $ss = "SELECT * FROM todayappointment WHERE `date`='$date'";
                $re = mysqli_query($database, $ss);
                $data = array();
                if (mysqli_num_rows($re) > 0) {
                    while ($rows = mysqli_fetch_assoc($re)) {
                        echo "<tr id=" . $rows["Appointmentnumber"] . "><td>" . $rows["username"] . "</td><td>" . $rows["patient_name"] . "</td><td>" . $rows["date"] . "</td><td>" . $rows["Appointmentnumber"] . "</td><td>" . $rows["category"] . "</td></tr>";
                    }
                }


                ?>
            </table>
        </div>

</body>

</html>
