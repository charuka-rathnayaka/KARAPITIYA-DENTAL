<?php
include_once('database_server.php');

$database = new Db_Connection();
$db = $database->connect();

$date = date("d-m-Y");
$username = $_POST["postusername"];


$ss = "SELECT * FROM todayappointment WHERE `date`='$date' AND (`username` = '$username' OR `patient_name` = '$username' ) ";
$re = mysqli_query($db, $ss);




if (mysqli_num_rows($re) > 0) {
    if(mysqli_num_rows($re) > 1){
        echo' <table class="tbl">
        <thead>
            <tr>
                <th>User name</th>
                <th>Name</th>
                <th>Date</th>
                <th>Appointment Number</th>
                <th>Treatment</th>
            </tr>
        </thead>
        <div id="tabledata">';
       
            $date = date("d-m-Y");
$sss = "SELECT * FROM todayappointment WHERE `date`='$date' AND  (`username` = '$username' OR `patient_name` = '$username' ) ";
$resu = mysqli_query($db, $sss);
$data = array();
if (mysqli_num_rows($resu) > 0) {

  while ($rows = mysqli_fetch_assoc($resu)) {

    echo
      "
            <tr id=" . $rows["Appointmentnumber"] . "><td>" . $rows["username"] . "</td><td>" . $rows["patient_name"] . "</td><td>" . $rows["date"] . "</td><td>" . $rows["Appointmentnumber"] . "</td><td>" . $rows["category"] .
        "</td></tr>

         <script>
    document.getElementById(" . $rows["Appointmentnumber"] . ").onclick = function () {
  $('#appointmentdata').load('dbOperations/appointmentnum.php', {
    postusername:'" . $rows["username"] . "',
  });
};

</script>       
        ";
  }
  echo'</div>
  </table>';
}
  

    }
else{
    echo "  <form class='tbl'  method='POST' id='appointmentdata' action='dbOperations/saveappointment.php' >";

    while ($row = mysqli_fetch_assoc($re)) {
        echo " <div class=input-group>";
        echo "<tr><th>Date</th><td><input type='text' name='date'value='" . $row['date'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>patient_name</th><td><input type='text' name='patient_name' value='" . $row['patient_name'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>Username</th><td><input type='text' name='username' value='" . $row['username'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>Id number</th><td><input type='text' name = 'ID' value='" . $row['appointment_ID'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>Appointment Number</th><td><input type='text'name ='appointmentnumber' value='" . $row['Appointmentnumber'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>Treatment</th><td><input type='text' name='treatment' value='" . $row['category'] . "'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th>Traetment Details</th><td><input type='text' name='treatmentDetails'></td></tr>";
        echo "</div>";
        echo " <div class=input-group>";
        echo "<tr><th></th><td> <input type='submit' name='submit'></td></tr>";
        echo "</div>";
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
}
} else {
    echo "NO APPOINTMENT TODAY";
}
