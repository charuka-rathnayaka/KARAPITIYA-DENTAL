<?php
include_once('database_server.php');
include_once("config.php");
include('dataLayer.php');
class Appointment
{
	private $state;
	public function __construct()
	{
		$this->state = new CreateState();
	}
	public function setState(AppState $state)
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
	public function activeAppointment()
	{
		$this->state->active($this);
	}
	public function lateAppointment()
	{
		$this->state->late($this);
	}
	public function arrivalConfirmedAppointment()
	{
		$this->state->arrivalConfirmed($this);
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
abstract class AppState
{
	abstract function create(Appointment $appointment);
	abstract function pending(Appointment $appointment, $date, $choice);
	abstract function confirm(Appointment $appointment);
	abstract function active(Appointment $appointment);
	abstract function late(Appointment $appointment);
	abstract function arrivalConfirmed(Appointment $appointment);
	abstract function delete(Appointment $appointment);
	abstract function close(Appointment $appointment);
}
class CreateState extends AppState
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
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class PendingState extends AppState
{
	function create(Appointment $appointment)
	{
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
	}
	function close(Appointment $appointment)
	{
	}
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class ConfirmedState extends AppState
{
	function create(Appointment $appointment)
	{
	}
	function pending(Appointment $appointment, $date, $choice)
	{
	}
	function confirm(Appointment $appointment)
	{
		$appointment->setState(new ActiveState());
		DataLayer::getInstance()->insertData();
	}
	function delete(Appointment $appointment)
	{
	}
	function close(Appointment $appointment)
	{
		echo "Appointment closed";
	}
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class ClosedState extends AppState
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
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class DeleteState extends AppState
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
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class ActiveState extends AppState
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
		/*DataLayer::getInstance()->deleteData();*/
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function active(Appointment $appointment)
	{
		DataLayer::getInstance()->activeApp();
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class LateState extends AppState
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
		/*DataLayer::getInstance()->deleteData();*/
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
		DataLayer::getInstance()->lateAppointment();
	}
	function arrivalConfirmed(Appointment $appointment)
	{
	}
}
class ArrivalConfirmedState extends AppState
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
		/*DataLayer::getInstance()->deleteData();*/
	}
	function close(Appointment $appointment)
	{
		/*echo "Appointment closed";*/
	}
	function active(Appointment $appointment)
	{
	}
	function late(Appointment $appointment)
	{
	}
	function arrivalConfirmed(Appointment $appointment)
	{
		DataLayer::getInstance()->arrivalApproved();
	}
}
