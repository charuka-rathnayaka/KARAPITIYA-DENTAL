<?php
include_once ('database_server.php');
include('config.php');
class Appointment{
	private $state;
	public function __construct(){
		$this->state=new CreateState();
	}
	public function setState(State $state){
		$this->state= $state;
	}
	public function createAppointment(){
		return $this->state->create($this);
	}
	public function pendingAppointment($date,$choice){
		return $this->state->pending($this,$date,$choice);
	}
	public function confirmeAppointment(){
		$this->state->confirm($this);
	}
	public function deleteAppointment(){
		$this->state= new DeleteState();
		$this->state->delete($this);
	}
	public function closeAppointment(){
		$this->state= new ClosedState();
		$this->state->close($this);
	}
	
}
abstract class State{
	abstract function create(Appointment $appointment);
	abstract function pending(Appointment $appointment,$date,$choice);
	abstract function confirm(Appointment $appointment);
	abstract function delete(Appointment $appointment);
	abstract function close(Appointment $appointment);
}
class CreateState extends State{
	function create(Appointment $appointment){
		$array= array();
		$date= $_POST['date'];
		$choice=$_POST['choice'];
		array_push($array,$date);
		array_push($array,$choice);
		$appointment->setState(new PendingState());
		return $array;
	}
	function pending(Appointment $appointment,$date,$choice){
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment){
	}
	function delete(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
}
class PendingState extends State{
	function create(Appointment $appointment){
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment,$date,$choice){
		$appointment->setState(new ClosedState());
		$database= new Db_Connection();
		$db = $database->connect();
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
	  return $name_error1;
	}
	if (mysqli_num_rows(mysqli_query($db,$query2)) > 4) {
  	  $name_error2 = "Sorry2...";
	  return $name_error2;
	}
	if (mysqli_num_rows(mysqli_query($db,$query3)) > 4) {
  	  $name_error3 = "Sorry3...";
	  return $name_error3;
	}
	if (mysqli_num_rows(mysqli_query($db,$query4)) > 4) {
  	  $name_error4 = "Sorry4...";
	  return $name_error4;
	}
	if (mysqli_num_rows(mysqli_query($db,$query5)) > 4) {
  	  $name_error5 = "Sorry5...";
	  return $name_error5;
	}
	if (mysqli_num_rows(mysqli_query($db,$query6)) > 4) {
  	  $name_error6 = "Sorry6...";
	  return $name_error6;
	}
	if (mysqli_num_rows(mysqli_query($db,$query7)) > 4) {
  	  $name_error7 = "Sorry7...";
	  return $name_error7;
	}
	if (mysqli_num_rows(mysqli_query($db,$query8)) > 4) {
  	  $name_error8 = "Sorry8...";
	  return $name_error8;
	}
	}
	function confirm(Appointment $appointment){
	}
	function delete(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
}
class ConfirmedState extends State{
	function create(Appointment $appointment){
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment,$date,$choice){
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment){
		$appointment->setState(new ClosedState());
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
	function delete(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment){
		echo "Appointment closed";
	}
}
class ClosedState extends State{
	function create(Appointment $appointment){
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment,$date,$choice){
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment){
	}
	function delete(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment){
		echo "Appointment closed";
	}
}
class DeleteState extends State{
	function create(Appointment $appointment){
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment,$date,$choice){
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment){
	}
	function delete(Appointment $appointment){
		$database= new Db_Connection();
		$connection= $database->connect();
		$username= $_SESSION['username'];
		$date= $_POST['date'];
		$category=$_POST['treatment'];
		$number=$_POST['app_num']; 
		$query="delete from booking where username='$username' and date='$date' and category='$category' and Appointmentnumber='$number'";
		mysqli_query($connection,$query);
		mysqli_close($connection);
	}
	function close(Appointment $appointment){
		/*echo "Appointment closed";*/
	}
}
?>
