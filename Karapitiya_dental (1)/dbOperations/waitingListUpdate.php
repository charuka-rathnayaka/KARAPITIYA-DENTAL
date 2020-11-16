<?php
include_once("memento.php");

include_once('database_server.php');
$database = new Db_Connection();
$db = $database->connect();
$username = $_POST['username'];
$patient_name = $_POST['patient_name'];
$appointment_ID = $_POST['appointment_ID'];
$date = $_POST['date'];
$appointmentnumber = $_POST['appointmentnumber'];
$category = $_POST['category'];
$ss = "SELECT * FROM pastappoitment WHERE `date`='$date' && `username` = '$username' AND `appointmentnumber`='$appointmentnumber'";
$re = mysqli_query($db, $ss);
$table = $_POST['table'];
$check = isset($_POST['check']);
$ori = new Originato();
$cre = new Caretaker($ori);

if ($check) {



    $sql = "INSERT INTO todayappointment (username,date,Appointmentnumber,category,appointment_ID,patient_name) VALUES ('$username','$date','$appointmentnumber','$category ','$appointment_ID','$patient_name');";
    mysqli_query($db, $sql);
    if ($table == "booking") {
        $cre->backup($appointment_ID, "booking", "todayappointment");
        $sql2 = "DELETE FROM booking WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
        mysqli_query($db, $sql2);
    } else if ($table == 'waitinglist') {
        $cre->backup($appointment_ID, "waitinglist", "todayappointment");
        $sql2 = "DELETE FROM waitinglist WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
        mysqli_query($db, $sql2);
    }
} else {
    if ($table == "booking") {


        $cre->backup($appointment_ID, 'booking', 'waitinglist');
        $sql = "INSERT INTO waitinglist (username,date,Appointmentnumber,category,appointment_ID,patient_name) VALUES ('$username','$date','$appointmentnumber','$category ','$appointment_ID','$patient_name');";
        mysqli_query($db, $sql);
        $sql2 = "DELETE FROM booking WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
        mysqli_query($db, $sql2);
    } else if ($table == 'waitinglist') {

        $cre->backup($appointment_ID, 'waitinglist', 'booking');

        $sql = "INSERT INTO booking (username,date,Appointmentnumber,category,appointment_ID,patient_name) VALUES ('$username','$date','$appointmentnumber','$category ','$appointment_ID','$patient_name');";
        mysqli_query($db, $sql);
        $sql2 = "DELETE FROM waitinglist WHERE `username`='$username' AND `date`='$date' AND `Appointmentnumber`='$appointmentnumber'";
        mysqli_query($db, $sql2);
    }
}




    // header('Location:viewAppointment.php');
