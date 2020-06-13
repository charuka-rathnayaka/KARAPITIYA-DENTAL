<?php
include('today_appointments.php');
$database = mysqli_connect('localhost', 'root', '', 'dentalkarapitiya');

$username = $_POST['username'];
$date = $_POST['date'];
$ID = $_POST['ID'];
$appointmentnumber = $_POST['appointmentnumber'];
$treatment = $_POST['treatment'];
$treatmentDetails = $_POST['treatmentDetails'];

$sql = "INSERT INTO pastappoitment (username,date,ID,Appointmentnumber,category,treatmentdetsils) VALUES ('$username','$date','$ID','$appointmentnumber','$treatment','$treatmentDetails');";
mysqli_query($database, $sql);
$sql2 = "DELETE FROM todayappointment WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
mysqli_query($database, $sql2);

header('Location:today_appointments.php');
