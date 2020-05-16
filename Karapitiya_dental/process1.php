<?php 
$username="root";
$password="";
$database="dentalkarapitiya";
$category='select';
$connection= mysqli_connect("localhost",$username,$password,$database)or die("Unable to select database");
if(isset($_POST['subs'])){
	$id=$_POST['id'];
	$select=$_POST['choice'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$number=$_POST['number'];
	$query="insert into booking(Appointmentnumber,username,category,date,time) values('$number','$id','$select','$date','$time')";
	mysqli_query($connection,$query);
	mysqli_close($connection);
}
?>
	