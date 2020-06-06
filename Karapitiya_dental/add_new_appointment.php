<?php include('config.php');

if (empty($_SESSION['user_type'])) {
    header("location:login.php");
}
include('user_type_menu.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add New Appointment</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
    <script src="jquery.min.js">
        function setTime() {
            document.getElementById("timebtn").style.backgroundcolor = "red";
        }
    </script>
    <style>
        .bottom {
            background: white;
            height: 150px;
            width: 500px;
            position: absolute;
            left: 500px;
            top: 450px;
        }

        .aaa {
            background: white;
            height: 100px;
            width: 300px;
            position: absolute;
            left: 650px;
            top: 605px;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$(function(){
    $("#datepicker").datepicker({
	minDate: 0,
	maxDate: +7
		});
	});
	</script>
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
    <div class="sub_header">
        <h2>ADD APPOINTMENT</h2>
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
    <form action="" method="post">
        <table align="center" cellpadding="5" cellspacing="10">
            <tr>
                <td>Patient Name<input type="text" name="id" id="id1" value="" /></td>
            </tr>
            <tr>
                <td>Category<select name="choice" id="select1">
                        <option value="NurveFilling">Nurve Filling</option>
                        <option value="Implants">Implants</option>
                        <option value="Orthodontics">Orthodontics</option>
                    </select></td>
            </tr>
            <tr>
                <td>Date:<input type="text" id="datepicker"></td>
            </tr>
            <tr>
                <td><input type="button" name="check" id="check1" value="Check" /></td>
            </tr>
        </table>
        <div class="bottom"></div>
        <div class="aaa"></div>
        <div class="bbb"></div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            $('input[id="check1"]').click(function() {
                var ischeck = $(this).val();
                var choice = $('#select1').val();
                var date = $('#datepicker').val();
                $.ajax({
                    url: "check.php",
                    method: "POST",
                    data: {
                        check: ischeck,
                        choice: choice,
                        date: date
                    },
                    success: function(data) {
                        $('.bottom').html(data);
                    }
                });
            });
		});

</script>
</body>

</html>