<?php

if (isset($_SESSION["user_type"])) {
   $user_type = $_SESSION["user_type"];
   if ($user_type == "Doctor") {
      echo '<script> 
      document.getElementById("part2").style.display="none";
      document.getElementById("adminPerspective").style.display="none";
      document.getElementById("doctorPerspective").style.display="block";
      document.getElementById("staffPerspective").style.display="none";
      document.getElementById("part3").style.display="none";
      </script>';
   }
   else if ($user_type == "Admin") {
      echo '<script>
        document.getElementById("part2").style.display="none";
        document.getElementById("adminPerspective").style.display="block";
        document.getElementById("doctorPerspective").style.display="none";
        document.getElementById("staffPerspective").style.display="none";
        document.getElementById("part3").style.display="none";
        </script>';
   }
   else if ($user_type == "Staff") {
      echo '<script>
      document.getElementById("part2").style.display="none";
      document.getElementById("adminPerspective").style.display="none";
      document.getElementById("doctorPerspective").style.display="none";
      document.getElementById("staffPerspective").style.display="block";
      document.getElementById("part3").style.display="none";
       </script>';
   }
   else{
      echo '<script>
      document.getElementById("part2").style.display="block";
      document.getElementById("adminPerspective").style.display="none";
      document.getElementById("doctorPerspective").style.display="none";
      document.getElementById("staffPerspective").style.display="none";
      document.getElementById("part3").style.display="block";
       </script>';
   }
}
else{
   echo '<script>
   document.getElementById("part2").style.display="block";
   document.getElementById("adminPerspective").style.display="none";
   document.getElementById("doctorPerspective").style.display="none";
   document.getElementById("staffPerspective").style.display="none";
   document.getElementById("part3").style.display="block";
    </script>';
}
