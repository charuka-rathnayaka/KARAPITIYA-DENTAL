<?php
include_once("database_server.php");
include('users.php'); 
include('config.php'); 
$db_connect=new Db_Connection();
$database=$db_connect->connect();
$username=$_SESSION["username"];
$sql_query10="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
$result=mysqli_query($database,$sql_query10);
$row = mysqli_fetch_assoc($result);

$patient=new Patient($row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$row["Username"],$row["Password"]);
$myjson = json_encode($patient); 

   
echo $myjson;
?>
