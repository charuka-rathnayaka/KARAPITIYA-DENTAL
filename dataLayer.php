<?php
include_once ('database_server.php');
class DataLayer{
	public static function getInstance(){
		return new DataLayer();
	}
	function getAppointmentLimit($day,$choice){
		$database = new Db_Connection();
		$db = $database->connect();
		$array = array();
		$date= date("d-m-Y",strtotime($day));
		$query1="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='8.00-9.00a.m'";
		$query2="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='9.00-10.00a.m'";
		$query3="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='10.00-11.00a.m'";
		$query4="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='11.00-12.00a.m'";
		$query5="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='12.00-1.00a.m'";
		$query6="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='1.00-2.00a.m'";
		$query7="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='2.00-3.00a.m'";
		$query8="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='3.00-4.00a.m'";
		if (mysqli_num_rows(mysqli_query($db,$query1)) > 4) {
		  $name_error1 = "Sorry1...";
		  array_push($array,$name_error1);
		}
		if (mysqli_num_rows(mysqli_query($db,$query2)) > 4) {
		  $name_error2 = "Sorry2...";
		  array_push($array,$name_error2);
		}
		if (mysqli_num_rows(mysqli_query($db,$query3)) > 4) {
		  $name_error3 = "Sorry3...";
		  array_push($array,$name_error3);
		}
		if (mysqli_num_rows(mysqli_query($db,$query4)) > 4) {
		  $name_error4 = "Sorry4...";
		  array_push($array,$name_error5);
		}
		if (mysqli_num_rows(mysqli_query($db,$query5)) > 4) {
		  $name_error5 = "Sorry5...";
		  array_push($array,$name_error6);
		}
		if (mysqli_num_rows(mysqli_query($db,$query6)) > 4) {
		  $name_error6 = "Sorry6...";
		  return $name_error6;
		}
		if (mysqli_num_rows(mysqli_query($db,$query7)) > 4) {
		  $name_error7 = "Sorry7...";
		  array_push($array,$name_error7);
		}
		if (mysqli_num_rows(mysqli_query($db,$query8)) > 4) {
		  $name_error8 = "Sorry8...";
		  array_push($array,$name_error8);
		}
		return $array;
	}
	function insertData(){
		$database= new Db_Connection();
		$connection = $database->connect();
		$patient_name=$_POST['id'];
		$usrnm=$_SESSION["username"];
		$select=$_POST['choice'];
		$day=$_POST['date'];
		$date=date("d-m-Y",strtotime($day));
		$time=$_POST['time'];
		$number=$_POST['number'];
		$query="Insert into booking(Appointmentnumber,patient_name,category,date,time,username) values('$number','$patient_name','$select','$date','$time','$usrnm')";
		$querynew="UPDATE `patient_dental_visit_status` SET `Status` = 'not_notified' WHERE `patient_dental_visit_status`.`Username` = '$usrnm'";
		mysqli_query($connection,$query);
		mysqli_query($connection,$querynew);
		mysqli_close($connection);
	}
	function deleteData(){
		$database = new Db_Connection();
		$db = $database->connect();
		$user= $_POST['user'];
		$name= $_POST['name'];
		$date= $_POST['date'];
		$category=$_POST['treatment'];
		$number=$_POST['app_num']; 
		$query="delete from booking where Appointmentnumber='$number' and username='$user' and category='$category' and date='$date' and patient_name='$name'";
		mysqli_query($db,$query);
		mysqli_close($db);
	}
	function select($date,$sel,$var){
		$database = new Db_Connection();
		$db = $database->connect();
		$query="SELECT * FROM booking WHERE date='$date' && category='$sel' && time='$var'";
		$result=mysqli_num_rows(mysqli_query($db,$query));
		return $result;
	}
	function select_view($name){
		$database = new Db_Connection();
		$db = $database->connect();
		$sql = "SELECT * FROM booking WHERE `username`='$name'";
        $results = mysqli_query($db, $sql);
		return $results;
	}
	function doctor_date($date){
		$database = new Db_Connection();
		$db = $database->connect();
		$sql = "SELECT * FROM booking WHERE `date`='$date'";
        $results = mysqli_query($db, $sql);
		return $results;
	}
}



 ?>
