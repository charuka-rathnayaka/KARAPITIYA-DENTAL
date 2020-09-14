<?php include("dbOperations/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Basic Treatments</title>
    <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
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

    <div class="treatmentsContainer">
        <ul>
            <li>
                <button class="bts" id="t1" onclick="showDetail1()">
                    <img src="Treatment Details/Basic/Root canal treatment.svg" class="bTreatmentImg">
                    <h2>Root canal treatment</h2>
                </button>

            </li>
            <li>
                <button class="bts" id="t2" onclick="showDetail2()">
                    <img src="Treatment Details/Basic/Scale and Polish.svg" class="bTreatmentImg">
                    <h2>Scale and polish</h2>
                </button>

            </li>
            <li>
                <button class="bts" id="t3" onclick="showDetail3()">
                    <img src="Treatment Details/Basic/Tooth removal.svg" class="bTreatmentImg">
                    <h2>Tooth removal</h2>
                </button>

            </li>
            <li>
                <button class="bts" id="t4" onclick="showDetail4()">
                    <img src="Treatment Details/Basic/Teeth Whitening.svg" class="bTreatmentImg">
                    <h2>Teeth whitening</h2>
                </button>

            </li>
        </ul>
        <div id="bt1" class="details">
            <p>Root canal treatment (also called endodontics) tackles infection at the centre of a tooth (the root canal system).
                When the blood or nerve supply of the tooth has become infected, the infection will spread and the tooth may need
                to be taken out if root canal treatment isn't carried out. During treatment, all the infection is removed from
                inside the root canal system. The root canal is filled and the tooth is sealed with a filling or crown to stop
                it becoming infected again. Root canal treatment usually requires 2 or 3 visits to your dentist.</p>
        </div>
        <div id="bt2" class="details">
            <p>A scale and polish is a quick cleaning of the teeth carried out by a dentist. Usually using something called an
                Ultrasonic, the dentist will clean around the gum line on the back and front of your teeth to remove any plaque and tartar.
                This treatment usually lasts a few minutes. The treatment is finished by a quick polish of the teeth. </p>
        </div>
        <div id="bt3" class="details">
            <p>The wisdom teeth grow at the back of your gums and are the last teeth to come through, usually in your late teens or
                early twenties.Most people have 4 wisdom teeth, 1 in each corner. Wisdom teeth can sometimes emerge at an angle or
                get stuck and only emerge partially. Wisdom teeth that grow through in this way are known as impacted. Impacted wisdom
                teeth can be removed on the NHS. Your dentist may perform the procedure, or may refer you to a dentist with a special
                interest or a hospital's oral and maxillofacial unit. You'll usually have to pay a charge for wisdom tooth removal.
                If you're referred to a hospital for NHS treatment, you won't have to pay a charge. Your dentist can also refer you for
                private wisdom teeth treatment if you wish.</p>
        </div>
        <div id="bt4" class="details">
            <p>Teeth whitening involves bleaching your teeth to make them a lighter colour.Teeth whitening can't make your
                teeth brilliant white, but it can lighten the existing colour by several shades. Standard teeth whitening
                involves several visits to the dentist, plus sessions at home wearing a mouthguard containing bleaching gel.
                The whole process takes a couple of months. A newer procedure called laser whitening or power whitening is
                done at the dentist's surgery and takes about an hour. Teeth whitening is cosmetic and therefore generally
                only available privately. It's occasionally available on the NHS if you have a clinical need – for example,
                to whiten a tooth that's gone black because the nerve has died.</p>
        </div>

        <script>
            var x1 = document.getElementById("bt1");
            var x2 = document.getElementById("bt2");
            var x3 = document.getElementById("bt3");
            var x4 = document.getElementById("bt4");
            var y1 = document.getElementById("t1");
            var y2 = document.getElementById("t2");
            var y3 = document.getElementById("t3");
            var y4 = document.getElementById("t4");

            function hideAll() {
                x1.style.display = "none"
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                t1.style.backgroundColor = "rgb(128, 128, 128)";
                t2.style.backgroundColor = "rgb(128, 128, 128)";
                t3.style.backgroundColor = "rgb(128, 128, 128)";
                t4.style.backgroundColor = "rgb(128, 128, 128)";
            }

            function showDetail1() {
                hideAll();
                x1.style.display = "block";
                t1.style.backgroundColor = "black";
            }

            function showDetail2() {
                hideAll();
                x2.style.display = "block";
                t2.style.backgroundColor = "black";
            }

            function showDetail3() {
                hideAll();
                x3.style.display = "block";
                t3.style.backgroundColor = "black";
            }

            function showDetail4() {
                hideAll();
                x4.style.display = "block";
                t4.style.backgroundColor = "black";
            }
        </script>
    </div>
    </div>
</body>

</html>