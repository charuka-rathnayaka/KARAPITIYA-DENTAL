<?php

function call_table(string $user)
{
    echo "<h2>Dental History</h2>
<table>

    <thead>
        <tr>
            <th>Username</th>
            <th> Date </th>
            <th>Category</th>
            <th>Treatment Details</th>
        </tr>
    </thead>
    <tbody>
        <?php
        calltable();
        ?>
    </tbody>
</table>";
    $db_connect = new Db_Connection();
    $connect = $db_connect->connect();
    if (!$connect) {
        die(mysql_error());
    }
    // $user = $_SESSION['username'];
    $query0 = "SELECT * FROM `pastappointment` WHERE `username`='$user'";
    $results = mysqli_query($connect, $query0);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    while ($count > 0) {
        $count -= 1;
?>
        <tr>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo  $row['category'] ?></td>
            <td><?php echo $row['treatmentdetsils'] ?></td>
        </tr>
<?php
        $row = mysqli_fetch_assoc($results);
    }
}
?>