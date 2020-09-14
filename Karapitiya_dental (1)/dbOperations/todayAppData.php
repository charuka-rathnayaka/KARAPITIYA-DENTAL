<?php
include_once('database_server.php');

$database = new Db_Connection();
$db = $database->connect();

$date = date("d-m-Y");
$ss = "SELECT * FROM todayappointment WHERE `date`='$date'";
$re = mysqli_query($db, $ss);
$data = array();
if (mysqli_num_rows($re) > 0) {

  while ($rows = mysqli_fetch_assoc($re)) {

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
}
