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
        <a href="index_doctor.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Appointments
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="today_appointments.php">Today Appointments</a>
                <a href="past_appointments.php">Past Appointments</a>
            </div>
        </div>
        <a href="profile_doctor.php">My Profile</a>
        <a href="personal_blog.php">Blog</a>
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
                $database = mysqli_connect('localhost', 'root', '', 'den');

                $date = date("Y/m/d");
                $ss = "SELECT * FROM booking WHERE `date`='$date'";
                $re = mysqli_query($database, $ss);
                $data = array();
                if (mysqli_num_rows($re) > 0) {
                    while ($rows = mysqli_fetch_assoc($re)) {
                        echo "<tr><td>" . $rows["username"] . "</td><td>" . $rows["date"] . "</td><td>" . $rows["Appointmentnumber"] . "</td><td>" . $rows["category"] . "</td></tr>";
                    }
                }


                ?>
            </table>
        </div>

</body>

</html>