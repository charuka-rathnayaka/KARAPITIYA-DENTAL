<?php
include_once("database_server.php");

/* This code part implements the chain of responsinility design pattern*/

interface HandlerInterface
{
 
    /** set the next handler */
    public function set_successor(HandlerInterface $successor);
 
    /** run this handler's code */
    public function handle_request_imp(Request $request);
 
    /** run the next handler  */
    public function handle_request(Request $request);
}

abstract class Handler implements HandlerInterface{
    protected $m_successor;
    function set_successor(HandlerInterface $successor){
        $this->m_successor = $successor;
    }
   
    abstract function handle_request_imp(Request $request);

    function handle_request(Request $request){
        
        if ($this->m_successor) {
            // go to next one:
            return $this->m_successor->handle_request_imp($request);
        }
        
    }
}

class Request{
    private $username;
    private $password;
    private $datab;
    function __construct($username,$password){
        $this->username=$username;
        $this->password=$password;
        $db_connect=new Db_Connection();
        $this->datab=$db_connect->connect();
    }
    function get_username(){
        return $this->username;
    }
    function get_password(){
        return $this->password;
    }
    function get_database(){
        return $this->datab;
    }
}

class AdminHandler extends Handler{
    function handle_request_imp(Request $request){
        $username=$request->get_username();
        $password=$request->get_password();
        $sql_query7="SELECT * FROM `staff_accounts` WHERE `Username`='$username' AND `password`='$password'";
        $result_staff=mysqli_query($request->get_database(),$sql_query7);
        if((mysqli_num_rows($result_staff)>0) && ($username=="admin")){
            $row = $result_staff->fetch_assoc();
            $admin=new Admin($username,$row["Password"]);
            return $admin;
        }
        else{
            return $this->handle_request($request);
        }
    }
}
class StaffHandler extends Handler{
    function handle_request_imp(Request $request){
        $username=$request->get_username();
        $password=$request->get_password();
        $sql_query7="SELECT * FROM `staff_accounts` WHERE `Username`='$username' AND `password`='$password'";
        $result_staff=mysqli_query($request->get_database(),$sql_query7);
        if((mysqli_num_rows($result_staff)>0) && ($username=="staff")){
            $row = $result_staff->fetch_assoc();
            $staff=new Staff($username,$row["Password"]);
            return $staff;
        }
        else{
            return $this->handle_request($request);
        }
    }
}
class DoctorHandler extends Handler{
    function handle_request_imp(Request $request){
        $username=$request->get_username();
        $password=$request->get_password();
        $sql_query3="SELECT * FROM `doctor_accounts` WHERE `Username`='$username' AND `password`='$password'";
        $result_doctor=mysqli_query($request->get_database(),$sql_query3);
        /*$admin=new Admin($username,"Password");
        return $admin;*/
        if(mysqli_num_rows($result_doctor)>0){
            $row = $result_doctor->fetch_assoc();
            $doctor=new Doctor($row["Reg_Num"],$row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$row["Qualifications"],$username,$password);
            return $doctor;
        }
        else{
            return $this->handle_request($request);
        }
    }
}

class PatientHandler extends Handler{
    function handle_request_imp($request){
        $username=$request->get_username();
        $password=$request->get_password();
        $sql_query2="SELECT * FROM `patient_accounts` WHERE `Username`='$username' AND `password`='$password'";
        $result_patient=mysqli_query($request->get_database(),$sql_query2);
        if(mysqli_num_rows($result_patient)>0){
            $row = $result_patient->fetch_assoc();
            $patient=new Patient($row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$username,$password);

            return $patient;
           
        }       
        else{
            return $this->handle_request($request);
        }
    }
}



?>

