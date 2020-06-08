<?php include('config.php');

if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_view_appointment.css>

    <script src="jquery.min.js">

    </script>
</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $database = mysqli_connect('localhost', 'root', '', 'dentalkarapitiya');
        $username = $_POST['username'];
        $date = $_POST['date'];
        $appointmentnumber = $_POST['appointmentnumber'];
        $category = $_POST['category'];
        $ss = "SELECT * FROM pastappoitment WHERE `date`='$date' && `username` = '$username' AND `appointmentnumber`='$appointmentnumber'";
        $re = mysqli_query($database, $ss);
        $table = $_POST['table'];
        if ($table == "booking") {
            if (mysqli_num_rows($re) <= 0) {
                $sql = "INSERT INTO waitinglist (username,date,Appointmentnumber,category) VALUES ('$username','$date','$appointmentnumber','$category ');";
                mysqli_query($database, $sql);
                $sql2 = "DELETE FROM booking WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
                mysqli_query($database, $sql2);
            }
        } else if ($table == "waitinglist") {
            if (mysqli_num_rows($re) <= 0) {
                $sql = "INSERT INTO booking (username,date,Appointmentnumber,category) VALUES ('$username','$date','$appointmentnumber','$category ');";
                mysqli_query($database, $sql);
                $sql2 = "DELETE FROM waitinglist WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
                mysqli_query($database, $sql2);
            }
        }
        header('Location:viewAppointment.php');
    }
    ?>

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


    <div id="tables">

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
            $ss = "SELECT * FROM booking WHERE `date`='$date'";
            $re = mysqli_query($database, $ss);
            $data = array();
            if (mysqli_num_rows($re) > 0) {
                while ($rows = mysqli_fetch_assoc($re)) {
                    echo "<form class='tbl' method='POST' id='appointmentdata'  ><input type='hidden' name='table' value='booking'><tr><td>" . $rows["username"] . "<input type='hidden' name='username' value='" . $rows["username"] . "'></td><td>" . $rows["date"] . "<input type='hidden' name='date' value='" . $rows["date"] . "'></td><td >" . $rows["Appointmentnumber"] . "<input type='hidden' name='appointmentnumber' value='" . $rows["Appointmentnumber"] . "'></td><td >" . $rows["category"] . "<input type='hidden' name='category' value='" . $rows["category"] . "'></td> <td><input type='submit' name='submit'></td></tr></form>";
                }
            }


            ?>
        </table>
    </div>

    <div>
        <h2>WAITING LIST</h2>
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
            $ss = "SELECT * FROM waitinglist WHERE `date`='$date'";
            $re = mysqli_query($database, $ss);
            $data = array();
            if (mysqli_num_rows($re) > 0) {
                while ($rows = mysqli_fetch_assoc($re)) {
                    echo "<form class='tbl' method='POST' id='appointmentdata' ><input type='hidden' name='table' value='waitinglist'><tr><td>" . $rows["username"] . "<input type='hidden' name='username' value='" . $rows["username"] . "'></td><td>" . $rows["date"] . "<input type='hidden' name='date' value='" . $rows["date"] . "'></td><td >" . $rows["Appointmentnumber"] . "<input type='hidden' name='appointmentnumber' value='" . $rows["Appointmentnumber"] . "'></td><td >" . $rows["category"] . "<input type='hidden' name='category' value='" . $rows["category"] . "'></td> <td><input type='submit' name='submit'></td></tr></form>";
                }
            }


            ?>
        </table>
    </div>

</body>

</html>