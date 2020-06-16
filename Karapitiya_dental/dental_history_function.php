<?php
include("database_server.php");

function call_table(){
    $db_connect=new Db_Connection();
        $connect=$db_connect->connect();
            if (!$connect) {
                die(mysql_error());
            }
            $user="charuka";
            $query0="SELECT * FROM `pastappointment` WHERE `username`='$user'";
            $results = mysqli_query($connect,$query0);
            $row = mysqli_fetch_assoc($results);
            $count=mysqli_num_rows($results);
            while( $count>0) {
                $count-=1;
            ?>
                <tr>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo "First name"?></td>
                    <td><?php echo $row['treatmentdetsils']?></td>
               </tr>
            <?php
            $row = mysqli_fetch_assoc($results);
            }}

?>
