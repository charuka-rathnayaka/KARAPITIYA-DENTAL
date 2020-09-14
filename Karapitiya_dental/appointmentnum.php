<?php
include_once('database_server.php');

$database = new Db_Connection();
$db = $database->connect();

$date = date("d-m-Y");
$username = $_POST["postusername"];


$ss = "SELECT * FROM todayappointment WHERE `date`='$date' AND `username` = '$username'";
$re = mysqli_query($db, $ss);
echo "  <form  method='POST' id='appointmentdata' action='saveappointment.php'>";


if (mysqli_num_rows($re) > 0) {
    while ($row = mysqli_fetch_assoc($re)) {
        echo "<tr><th>Date</th><td><input type='text' name='date'value='" . $row['date'] . "'></td></tr>";
        echo "<tr><th>Username</th><td><input type='text' name='username' value='" . $row['username'] . "'></td></tr>";
        echo "<tr><th>Id number</th><td><input type='text' name = 'ID' value='" . $row['appointment_ID'] . "'></td></tr>";
        echo "<tr><th>Appointment Number</th><td><input type='text'name ='appointmentnumber' value='" . $row['Appointmentnumber'] . "'></td></tr>";
        echo "<tr><th>Treatment</th><td><input type='text' name='treatment' value='" . $row['category'] . "'></td></tr>";
        echo "<tr><th>Traetment Details</th><td><input type='text' name='treatmentDetails'></td></tr>";
        echo "<tr><th></th><td><input type='submit' name='submit'></td></tr>";
    }
    echo "</form>";
    echo "<h2>Dental History</h2>
<table class='tbl'>

    <thead>
        <tr>
            <th>Username</th>
            <th> Date </th>
            <th>Category</th>
            <th>Treatment Details</th>
        </tr>
    </thead>
    <tbody>
        
    ";
    $query0 = "SELECT * FROM `pastappointment` WHERE `username`='$username' ";
    $result = mysqli_query($db, $query0);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
        <tr>
            <td>" . $row['username'] . " </td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['category'] . "</td>
            <td>" . $row['treatmentdetsils'] . "</td>
        </tr>";
        }
    }
    echo "</tbody>
</table>";
} else {
    echo "NO APPOINTMENT TODAY";
}
