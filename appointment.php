<?php
include_once('database_server.php');
include('config.php');
include('dataLayer.php');
class Appointment
{
	private $state;
	public function __construct()
	{
		$this->state = new CreateState();
	}
	public function setState(State $state)
	{
		$this->state = $state;
	}
	public function createAppointment()
	{
		return $this->state->create($this);
	}
	public function pendingAppointment($date, $choice)
	{
		return $this->state->pending($this, $date, $choice);
	}
	public function confirmeAppointment()
	{
		$this->state->confirm($this);
	}
	public function deleteAppointment()
	{
		$this->state = new DeleteState();
		$this->state->delete($this);
	}
	public function closeAppointment()
	{
		$this->state = new ClosedState();
		$this->state->close($this);
	}
}
class State
{
	function create(Appointment $appointment)
	{
	}
	function pending(Appointment $appointment, $date, $choice)
	{
	}
	function confirm(Appointment $appointment)
	{
	}
	function delete(Appointment $appointment)
	{
	}
	function close(Appointment $appointment)
	{
	}
}
class CreateState extends State
{
	function create(Appointment $appointment)
	{
		$array = array();
		$day = $_POST['date'];
		$date = date("d-m-Y", strtotime($day));
		$choice = $_POST['choice'];
		array_push($array, $date);
		array_push($array, $choice);
		$appointment->setState(new PendingState());
		return $array;
	}
	function pending(Appointment $appointment, $date, $choice)
	{
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment)
	{
	}
	function delete(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
}
class PendingState extends State
{
	function create(Appointment $appointment)
	{
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment, $date, $choice)
	{
		$appointment->setState(new ClosedState());
		return DataLayer::getInstance()->getAppointmentLimit($date, $choice);
	}
	function confirm(Appointment $appointment)
	{
	}
	function delete(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
}
class ConfirmedState extends State
{
	function create(Appointment $appointment)
	{
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment, $date, $choice)
	{
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment)
	{
		$appointment->setState(new ClosedState());
		DataLayer::getInstance()->insertData();
	}
	function delete(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment)
	{
		echo "Appointment closed";
	}
}
class ClosedState extends State
{
	function create(Appointment $appointment)
	{
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment, $date, $choice)
	{
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment)
	{
	}
	function delete(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function close(Appointment $appointment)
	{
		echo "Appointment closed";
	}
}
class DeleteState extends State
{
	function create(Appointment $appointment)
	{
		/*echo "Appointment created";
		$appointment->setState(new PendingState());*/
	}
	function pending(Appointment $appointment, $date, $choice)
	{
		/*echo "Pending Appointment";
		$appointment->setState(new ClosedState());*/
	}
	function confirm(Appointment $appointment)
	{
	}
	function delete(Appointment $appointment)
	{
		DataLayer::getInstance()->deleteData();
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
}
