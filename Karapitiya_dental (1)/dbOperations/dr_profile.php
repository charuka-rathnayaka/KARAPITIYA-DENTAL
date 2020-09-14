<?php
include_once("database_server.php");
include('config.php');
$db_connect=new Db_Connection();
$database=$db_connect->connect();
$username=$_SESSION["username"];
$sql_query11="SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
$result=mysqli_query($database,$sql_query11);
$row = mysqli_fetch_assoc($result);

$doctor=new Doctor($row["Reg_Num"],$row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$row["Qualifications"],$row["Username"],$row["Password"]);
$myjson = json_encode($doctor);
echo $myjson;

?>
