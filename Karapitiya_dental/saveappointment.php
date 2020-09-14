<?php
include('today_appointments.php');
include_once('database_server.php');
$database = new Db_Connection();
$db = $database->connect();

$username = $_POST['username'];
$date = $_POST['date'];
$ID = $_POST['ID'];
$appointmentnumber = $_POST['appointmentnumber'];
$treatment = $_POST['treatment'];
$treatmentDetails = $_POST['treatmentDetails'];

$sql = "INSERT INTO pastappointment (username,`date`,ID,appointmentnumber,category,treatmentdetsils) VALUES ('$username','$date','$ID','$appointmentnumber','$treatment','$treatmentDetails');";
mysqli_query($db, $sql);
$tod = date("Y-m-d");
$today = date_create($tod);
$sql_query71 = "UPDATE `patient_dental_visit_status` SET `Status` = 'not_notified', `Last_appointment` = '$tod' WHERE `patient_dental_visit_status`.`Username` = '$username'";
mysqli_query($db, $sql_query71);

$sql2 = "DELETE FROM todayappointment WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
mysqli_query($db, $sql2);

//header('Location:today_appointments.php');
