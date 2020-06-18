<?php include('config.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basic Treatments</title>
        <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
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
            
           <?php include('user_type_menu.php');
           ?> 
            <div class="sub_header">
            <h2>Basic Treatments</h2>
            </div>
            <div class="content">
            <?php if(isset($_SESSION["success"])):?>
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
                if (isset($_SESSION['username'])):
                ?>
                <div class="welcome">
                    <p>WELCOME <strong> <?php echo $_SESSION['username']; ?></strong>
                    
                </p>
                <p> <a href='index.php?logout='1' ' style="color:red;">Logout</a></p>
                </div>
               
                <?php endif ?>
                <?php 
                if(!isset($_SESSION['username'])): ?>
                <div class="welcome">
                    
                <p> <a href='login.php' style="color:blue;">Login</a></p>
                </div>
                <?php endif ?>
            </div>
            <div class="treatmentsContainer"> 
                <p> Given below are the basic treatments we provide: </p>
                <ul>
                    <l>
                        <h2>Root canal treatment</h2>
                        <p>Root canal treatment (also called endodontics) tackles infection at the centre of a tooth (the root canal system). 
                            When the blood or nerve supply of the tooth has become infected, the infection will spread and the tooth may need 
                            to be taken out if root canal treatment isn't carried out. During treatment, all the infection is removed from 
                            inside the root canal system. The root canal is filled and the tooth is sealed with a filling or crown to stop 
                            it becoming infected again. Root canal treatment usually requires 2 or 3 visits to your dentist.</p>
                    </l>
                    <l>
                        <h2>Scale and polish</h2>
                        <p>This is when your teeth are professionally cleaned by the hygienist. It involves carefully removing the deposits
                             that build up on the teeth (tartar).</p>
                    </l>
                    <l>
                        <h2>Tooth removal</h2>
                        <p>The wisdom teeth grow at the back of your gums and are the last teeth to come through, usually in your late teens or 
                            early twenties.Most people have 4 wisdom teeth, 1 in each corner. Wisdom teeth can sometimes emerge at an angle or
                             get stuck and only emerge partially. Wisdom teeth that grow through in this way are known as impacted. Impacted wisdom 
                             teeth can be removed on the NHS. Your dentist may perform the procedure, or may refer you to a dentist with a special 
                             interest or a hospital's oral and maxillofacial unit. You'll usually have to pay a charge for wisdom tooth removal. 
                             If you're referred to a hospital for NHS treatment, you won't have to pay a charge. Your dentist can also refer you for 
                             private wisdom teeth treatment if you wish.</p>
                    </l>
                    <l>
                        <h2>Teeth whitening</h2>
                        <p>Teeth whitening involves bleaching your teeth to make them a lighter colour.Teeth whitening can't make your 
                            teeth brilliant white, but it can lighten the existing colour by several shades. Standard teeth whitening 
                            involves several visits to the dentist, plus sessions at home wearing a mouthguard containing bleaching gel. 
                            The whole process takes a couple of months. A newer procedure called laser whitening or power whitening is 
                            done at the dentist's surgery and takes about an hour. Teeth whitening is cosmetic and therefore generally 
                            only available privately. It's occasionally available on the NHS if you have a clinical need – for example, 
                            to whiten a tooth that's gone black because the nerve has died.</p>
                    </l>
                </ul>
            </div>
    </body>
</html>
