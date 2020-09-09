<?php include('config.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Advance Treatments</title>
        <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
    </head>
    <body>
        <div class="header">
            <h2 class="header2">DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>
            
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
            
           <!--<?php include('user_type_menu.php');
           ?> 
            <div class="sub_header">
            <h2>Advance Treatments</h2></div>
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
            </div>-->
            <div class="treatmentsContainer">
                <ul>
                    <li>
                        <button class="bts" id="t1" onclick="showDetail1()" >
                            <img src="Treatment Details/Advanced/Dental implants.svg" class="bTreatmentImg">
                            <h2>Dental Implants</h2>
                        </button>
                        
                    </li>
                    <li>
                        <button class="bts" id="t2" onclick="showDetail2()" >
                            <img src="Treatment Details/Advanced/Orthodontics.svg" class="bTreatmentImg">
                            <h2>Orthodontics</h2>
                        </button>
                        
                    </li>
                    <li>
                        <button class="bts" id="t3" onclick="showDetail3()" >
                            <img src="Treatment Details/Advanced/Crowns.svg" class="bTreatmentImg">
                            <h2>Crowns</h2>
                        </button>
                        
                    </li>
                    <li>
                        <button class="bts" id="t4" onclick="showDetail4()" >
                            <img src="Treatment Details/Advanced/Bridges.svg" class="bTreatmentImg">
                            <h2>Bridges</h2>
                        </button>
                        
                    </li>
                </ul>
                <div id="bt1" class="details">
                    <p>Implants are a fixed alternative to removable dentures. They may be the only option if the loss of teeth has caused 
                        the mouth to shrink so it can no longer support dentures.  You can use implants to replace just a single tooth or 
                        several teeth.To fit an implant, titanium screws are drilled into the jaw bone to support a crown, bridge or 
                        denture.Replacement parts take time to prepare. This is to ensure that they fit your mouth and other teeth properly.
                         This means they may not be available on your first visit to the dentist.Implants are usually only available privately
                          and are expensive. They're sometimes available on the NHS for patients who can't wear dentures or whose face and 
                          teeth have been damaged, such as people who have had mouth cancer or an accident that's knocked a tooth out.</p>
                </div>
                <div id="bt2" class="details">
                    <p>Braces (orthodontic treatment) straighten or move teeth to improve the appearance of the teeth and how they work. 
                        Braces can be removable, so you can take them out and clean them, or fixed, so they're stuck to your teeth and you
                         can't take them out.They can be made of metal, plastic or ceramic. Invisible braces are made of a clear plastic. 
                         Braces are available on the NHS for children and, occasionally, for adults, depending on the clinical need.</p>
                </div>
                <div id="bt3" class="details">
                    <p>A crown is a type of cap that completely covers a real tooth. It's made from either metal,
                        or porcelain and metal, and is fixed in your mouth. Crowns can be fitted where a tooth has 
                        broken, decayed or been damaged, or just to make a tooth look better. To fit a crown, the old 
                        tooth will need to be drilled down so it's like a small peg the crown will be fixed on to. It can take 
                        some time for the lab to prepare a new crown, so you probably won't have the crown fitted on the same day.</p>
                </div>
                <div id="bt4" class="details">
                    <p>A bridge is a fixed replacement for a missing tooth or teeth. It's made by taking an impression of the 
                        surrounding teeth, which will eventually support the bridge. A bridge is usually created from precious metal 
                        and porcelain and will be fixed in your mouth (unlike dentures, which can be removed).</p>
                </div>

                <script>
                    var x1= document.getElementById("bt1");
                    var x2= document.getElementById("bt2");
                    var x3= document.getElementById("bt3");
                    var x4= document.getElementById("bt4");
                    var y1= document.getElementById("t1");
                    var y2= document.getElementById("t2");
                    var y3= document.getElementById("t3");
                    var y4= document.getElementById("t4");
                    function hideAll(){
                        x1.style.display = "none"
                        x2.style.display = "none";
                        x3.style.display = "none";
                        x4.style.display = "none";
                        t1.style.backgroundColor="rgb(128, 128, 128)";
                        t2.style.backgroundColor="rgb(128, 128, 128)";
                        t3.style.backgroundColor="rgb(128, 128, 128)";
                        t4.style.backgroundColor="rgb(128, 128, 128)";
                    }
                    function showDetail1(){
                        hideAll();
                        x1.style.display = "block";
                        t1.style.backgroundColor="black";
                    }
                    function showDetail2(){
                        hideAll();
                        x2.style.display = "block";
                        t2.style.backgroundColor="black";
                    }
                    function showDetail3(){
                        hideAll();
                        x3.style.display = "block";
                        t3.style.backgroundColor="black";
                    }
                    function showDetail4(){
                        hideAll();
                        x4.style.display = "block";
                        t4.style.backgroundColor="black";
                    }
                </script>
            </div>
            <!--<div class="treatmentsContainer"> 
                <p> Given below are the advanced treatments we provide: </p>
                <ul>
                    <l>
                        <h2>Nerve Filling</h2>
                        <p>Two of the most common procedures for tooth nerve pain are fillings and root canals. Fillings:
                             If you have tooth nerve pain caused by a simple cavity, a filling is the most common dental repair.
                              When you have a tooth filled, the dentist numbs the area, removes the decayed material, and replaces it with
                               a filling.</p>
                    </l>
                    <l>
                        <h2>Dental Implants</h2>
                        <p>Implants are a fixed alternative to removable dentures. They may be the only option if the loss of teeth has caused 
                            the mouth to shrink so it can no longer support dentures.  You can use implants to replace just a single tooth or 
                            several teeth.To fit an implant, titanium screws are drilled into the jaw bone to support a crown, bridge or 
                            denture.Replacement parts take time to prepare. This is to ensure that they fit your mouth and other teeth properly.
                             This means they may not be available on your first visit to the dentist.Implants are usually only available privately
                              and are expensive. They're sometimes available on the NHS for patients who can't wear dentures or whose face and 
                              teeth have been damaged, such as people who have had mouth cancer or an accident that's knocked a tooth out.</p>
                    </l>
                    <l>
                        <h2>Orthodontics</h2>
                        <p>Braces (orthodontic treatment) straighten or move teeth to improve the appearance of the teeth and how they work. 
                            Braces can be removable, so you can take them out and clean them, or fixed, so they're stuck to your teeth and you
                             can't take them out.They can be made of metal, plastic or ceramic. Invisible braces are made of a clear plastic. 
                             Braces are available on the NHS for children and, occasionally, for adults, depending on the clinical need.</p>
                    </l>
                    <l>
                        <h2>Crowns</h2>
                        <p>A crown is a type of cap that completely covers a real tooth. It's made from either metal,
                             or porcelain and metal, and is fixed in your mouth. Crowns can be fitted where a tooth has 
                             broken, decayed or been damaged, or just to make a tooth look better. To fit a crown, the old 
                             tooth will need to be drilled down so it's like a small peg the crown will be fixed on to. It can take 
                             some time for the lab to prepare a new crown, so you probably won't have the crown fitted on the same day.</p>
                    </l>
                    <l>
                        <h2>Bridges</h2>
                        <p>A bridge is a fixed replacement for a missing tooth or teeth. It's made by taking an impression of the 
                            surrounding teeth, which will eventually support the bridge. A bridge is usually created from precious metal 
                            and porcelain and will be fixed in your mouth (unlike dentures, which can be removed).</p>
                    </l>
                </ul>
            </div>-->
    </body>
</html>
