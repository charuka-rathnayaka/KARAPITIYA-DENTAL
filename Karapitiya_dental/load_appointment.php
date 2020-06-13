<?php
$database = mysqli_connect('localhost', 'root', '', 'dentalkarapitiya');
$date = date("d-m-Y");
$ss = "SELECT * FROM todayappointment WHERE `date`='$date'";
$re = mysqli_query($database, $ss);
$data = array();

if (mysqli_num_rows($re) > 0) {
    while ($row = mysqli_fetch_assoc($re)) {
        array_push($data, $row['Appointmentnumber']);
    }
    echo min($data);
}
