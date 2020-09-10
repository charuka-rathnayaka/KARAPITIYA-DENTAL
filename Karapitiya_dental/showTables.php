<table class="tbl">
    <thead>
        <tr>
            <th>User name</th>
            <th>Name</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Appointment Number</th>
            <th>Traetment</th>
        </tr>
    </thead>
    <?php
    include_once('database_server.php');
    $database = new Db_Connection();
    $db = $database->connect();

    $date = date("d-m-Y");
    $ss = "SELECT * FROM booking WHERE `date`='$date'";
    $re = mysqli_query($db, $ss);
    $data = array();
    if (mysqli_num_rows($re) > 0) {
        while ($rows = mysqli_fetch_assoc($re)) {
            echo "<form class='tbl' method='POST' id='appointmentdata'  ><input type='hidden' name='table' value='booking'><tr><td>" . $rows["username"] . "<input type='hidden' name='username' value='" . $rows["username"] . "'></td><td>" . $rows["patient_name"] . "<input type='hidden' name='patient_name' value='" . $rows["patient_name"] . "'></td><td>" . $rows["appointment_ID"] . "<input type='hidden' name='appointment_ID' value='" . $rows["appointment_ID"] . "'></td><td>" . $rows["date"] . "<input type='hidden' name='date' value='" . $rows["date"] . "'></td><td >" . $rows["Appointmentnumber"] . "<input type='hidden' name='appointmentnumber' value='" . $rows["Appointmentnumber"] . "'></td><td >" . $rows["category"] . "<input type='hidden' name='category' value='" . $rows["category"] . "'></td> <td><input name='check' type='checkbox'></td><td><input type='submit' name='submit'></td></tr></form>";
        }
    }


    ?>
</table>
</div>

<div>
    <h2>WAITING LIST</h2>
    <table class="tbl">
        <thead>
            <tr>
                <th>User name</th>
                <th>Name</th>
                <th>Patient ID</th>
                <th>Date</th>
                <th>Appointment Number</th>
                <th>Traetment</th>

            </tr>
        </thead>
        <?php


        $date = date("d-m-Y");
        $ss = "SELECT * FROM waitinglist WHERE `date`='$date'";
        $re = mysqli_query($db, $ss);
        $data = array();
        if (mysqli_num_rows($re) > 0) {
            while ($rows = mysqli_fetch_assoc($re)) {
                echo "<form class='tbl' method='POST' id='appointmentdata' ><input type='hidden' name='table' value='waitinglist'><tr><td>" . $rows["username"] . "<input type='hidden' name='username' value='" . $rows["username"] . "'></td><td>" . $rows["patient_name"] . "<input type='hidden' name='patient_name' value='" . $rows["patient_name"] . "'></td><td>" . $rows["appointment_ID"] . "<input type='hidden' name='appointment_ID' value='" . $rows["appointment_ID"] . "'></td><td>" . $rows["date"] . "<input type='hidden' name='date' value='" . $rows["date"] . "'></td><td >" . $rows["Appointmentnumber"] . "<input type='hidden' name='appointmentnumber' value='" . $rows["Appointmentnumber"] . "'></td><td >" . $rows["category"] . "<input type='hidden' name='category' value='" . $rows["category"] . "'></td><td><input name='check' type='checkbox'></td> <td><input type='submit' name='submit'></td></tr></form>";
            }
        }


        ?>
    </table>