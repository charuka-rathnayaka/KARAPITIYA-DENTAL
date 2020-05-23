<?php
include('database_server.php');
$db_connect=new Db_Connection();
$database=$db_connect->connect();
$sql_query88="SELECT * FROM `patient_dental_visit_status`";
$result=mysqli_query($database,$sql_query88);
$tod=date("Y-m-d");
$today=date_create($tod);
while($row=$result->fetch_assoc()){
    $last_visit=date_create($row["Last_appointment"]);
    $diff=date_diff($last_visit,$today);
    $differ=$diff->format("%R%a");
    $day_dif = (int) $differ;
    if (($row["Status"]=="not_notified") && ($day_dif>90)){
        send_reminder_mail($row["Email"],$row["Firstname"]);
        $username=$row["Username"];
        $sql_query77="UPDATE `patient_dental_visit_status` SET `Status` = 'notified' WHERE `patient_dental_visit_status`.`Username` = '$username'";
        $update=mysqli_query($database,$sql_query77);
    }
    
}


    
function send_reminder_mail($to_email,$firstname){
    $subject = "Dental Visit Reminder";
    $body ="Hi $firstname,"."\n\n"."         Hope you are in good health. Our records show that it has been three months from your last visit to the dental clinic. So we hope it is time for you to have a dental checkup. Plese follow our website to add a dental appointment so you can experience our service efficiently. Looking forward to meet you!"."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
    $headers = "From: KARAPITIYA DENTAL";
    
    mail($to_email, $subject, $body, $headers);
    
    }
    
    




?>
