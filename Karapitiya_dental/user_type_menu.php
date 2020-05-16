<?php

if (isset($_SESSION["user_type"])){
    $user_type=$_SESSION["user_type"];
    if ($user_type=="Doctor"){
       echo '<script> 
       var link = document.createElement("a");
       var node = document.createTextNode("Blog");
       link.appendChild(node);
       link.href="personal_blog.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];      
       var elmnt = document.getElementById("part4");
       element.insertBefore(link,elmnt);</script>';

       echo '<script>
       var elmnt = document.getElementById("part2");
       var link = document.createElement("a");
       var node = document.createTextNode("View appointments");
       link.appendChild(node);
       link.href="today_appointments.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];  
        element.replaceChild(link,elmnt);
       </script>';

       echo '<script>
       var elmnt = document.getElementById("part3");
       var link = document.createElement("a");
       var node = document.createTextNode("My Profile");
       link.appendChild(node);
       link.href="profile_doctor.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];  
        element.replaceChild(link,elmnt);
       </script>';
    }
    if ($user_type=="Admin"){
        echo '<script>
        var elmnt = document.getElementById("part2");
        var x=document.getElementsByClassName("navbar");
        var element = x[0]; 
        element.removeChild(elmnt)
        </script>';
    
    echo '<script>
       var elmnt = document.getElementById("part3");
       var link = document.createElement("a");
       var node = document.createTextNode("Add Doctor");
       link.appendChild(node);
       link.href="add_doctor.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];  
        element.replaceChild(link,elmnt);
       </script>';
    }
    if($user_type=="Staff"){
        echo '<script>
       var elmnt = document.getElementById("part2");
       var link = document.createElement("a");
       var node = document.createTextNode("Add appointments");
       link.appendChild(node);
       link.href="add_new_appointment.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];  
        element.replaceChild(link,elmnt);
       </script>';

    
    echo '<script>
       var elmnt = document.getElementById("part3");
       var link = document.createElement("a");
       var node = document.createTextNode("View Appointments");
       link.appendChild(node);
       link.href="today_appointments.php"
       var x=document.getElementsByClassName("navbar");
       var element = x[0];  
        element.replaceChild(link,elmnt);
       </script>';
    }
    

}



?>