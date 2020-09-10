<?php
include_once('database_server.php');
$database = new Db_Connection();
$db = $database->connect();

$date = date("d-m-Y");
$ss = "SELECT * FROM todayappointment WHERE `date`='$date'";
$re = mysqli_query($db, $ss);
$data = array();

if (mysqli_num_rows($re) > 0) {
    while ($row = mysqli_fetch_assoc($re)) {
        array_push($data, $row['Appointmentnumber']);
    }
    echo min($data);
}
