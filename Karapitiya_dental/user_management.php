<?php
//include_once("database_server.php");
include("users.php");
include("user_handler.php");
class Manage_user{
   
    public $database;
    public $errors=array();
    public $user_type='not_logged';
    function __construct(){
    $db_connect=new Db_Connection();
    $this->database=$db_connect->connect();
}

function login_user($username,$pass){
            $password=md5($pass);
            $request=new Request($username,$password,$this->database);
            $admin_handler=new AdminHandler();
            $staff_handler=new StaffHandler();
            $doctor_handler=new DoctorHandler();
            $patient_handler=new PatientHandler();
            $admin_handler->set_successor($staff_handler);
            $staff_handler->set_successor($doctor_handler);
            $doctor_handler->set_successor($patient_handler);
            $user=$admin_handler->handle_request_imp($request);
            return $user;

         
}
function register_patient($Firstname,$Lastname,$Email,$Birthday,$Gender,$Username,$pass){
    $password=md5($pass);
    $stmt = ($this->database)->prepare("INSERT INTO `patient_accounts` ( `Firstname`, `Lastname`, `Email`,`Birthday`, `Gender`, `Username`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $Firstname, $Lastname, $Email,$Birthday, $Gender, $Username,$password);
    $patient=new Patient($Firstname,$Lastname,$Email,$Birthday,$Gender,$Username,$password);
    $stmt->execute();

    $stmt1 = ($this->database)->prepare("INSERT INTO `patient_dental_visit_status` ( `Username`,`Firstname`, `Status`,`Email`) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("ssss", $Username, $Firstname,$status, $Email);
    $status="No Appointment";
    $stmt1->execute();

    return $patient;

}
function register_doctor($Reg_Num,$Firstname,$Lastname,$Email,$Birthday,$Gender,$Qualifications,$Username,$password){
    $sql_query1="INSERT INTO `doctor_accounts` ( `Reg_Num`,`Firstname`, `Lastname`, `Email`, `Gender`, `Birthday`, `Qualifications`, `Username`, `Password`) VALUES ('$Reg_Num','$Firstname', '$Lastname', '$Email', '$Gender', '$Birthday','$Qualifications', '$Username','$password')";
    mysqli_query($this->database,$sql_query1); 
    $doctor=new Doctor($Reg_Num,$Firstname,$Lastname,$Email,$Birthday,$Gender,$Qualifications,$Username,$password);  

    //$_SESSION['success']="Now doc added"; 
}
function check_patient_username($username){
    $sql_query0="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
    $checkusername=mysqli_query($this->database,$sql_query0);
    if(mysqli_num_rows($checkusername)>0){
        array_push($errors,"That Username already exists");
    
    }
}
function check_doctor_username($username){
    $sql_query6="SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
    $checkusername=mysqli_query($this->database,$sql_query6);
    if(mysqli_num_rows($checkusername)>0){
        array_push($errors,"That Username already exists");
    
    }
}
}

?>
