<?php
include('today_appointments.php');
$database = mysqli_connect('localhost', 'root', '', 'den');

$username = $_POST['username'];
$date = $_POST['date'];
$ID = $_POST['ID'];
$appointmentnumber = $_POST['appointmentnumber'];
$treatment = $_POST['treatment'];
$treatmentDetails = $_POST['treatmentDetails'];
$ss = "SELECT * FROM pastappoitment WHERE `date`='$date' && `username` = '$username' AND `treatmentdetsils`='treatmentDetails'";
$re = mysqli_query($database, $ss);
if (mysqli_num_rows($re) <= 0) {
    $sql = "INSERT INTO pastappoitment (username,date,ID,Appointmentnumber,category,treatmentdetsils) VALUES ('$username','$date','$ID','$appointmentnumber','$treatment','$treatmentDetails');";
    mysqli_query($database, $sql);
    $sql2 = "DELETE FROM booking WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
    mysqli_query($database, $sql2);
}
