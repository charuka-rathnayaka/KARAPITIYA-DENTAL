<?php include('config.php');

if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add New Appointment</title>
    <link rel="stylesheet" type="text/css" href="stylesheet_view_appointment.css">
    <script src="jquery.min.js"></script>
    <script src="blogic.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
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
                    <a href="view_my_appointment.php">View My Appointments</a> </div>
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


    <form action="" method="post">
        <table align="center" cellpadding="5" cellspacing="10">
            <tr>
                <td>Patient Name</td>
                <td>
                    <div <?php if (isset($formerror)) : ?> class="form_error" <?php endif ?>>
                        <input type="text" name="id" id="id1" value="" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="choice" id="select1">
                        <option value="Orthodontics">Bridges</option>
                        <option value="Orthodontics">Crowns</option>
                        <option value="Orthodontics">Dental Implants</option>
                        <option value="Orthodontics">Orthodontics</option>
                        <option value="NurveFilling">Root canal treatment</option>
                        <option value="Implants">Scale and polish</option>
                        <option value="Orthodontics">Teeth whitening</option>
                        <option value="Orthodontics">Tooth removal</option>




                    </select></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="text" id="datepicker"></td>
                <td>
                    <p id="dd"></p>
                </td>
            </tr>
            <tr>
                <td><input type="button" name="check" id="check1" value="Check" onClick="send()" /></td>
            </tr>
        </table>
        <div class="bottom"></div>
        <div class="aaa"></div>
        <div class="bbb"></div>
    </form>
    </div>

</body>

</html>