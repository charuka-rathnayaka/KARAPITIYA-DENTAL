<?php
include('appointment.php'); 
if(isset($_POST['subs'])){
	$app= new Appointment();
	$app->setState(new ConfirmedState());
	$app->confirmeAppointment();
}
?>
	