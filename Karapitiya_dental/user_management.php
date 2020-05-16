<?php
include_once("database_server.php");
include_once("users.php");
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
            $sql_query7="SELECT * FROM `staff_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_staff=mysqli_query($this->database,$sql_query7);
            if((mysqli_num_rows($result_staff)>0) && ($username=="admin")){
                $row = $result_staff->fetch_assoc();
                $admin=new Admin($username,$row["Password"]);
                return $admin;
                
            }
            elseif((mysqli_num_rows($result_staff)>0) && ($username=="staff")){
                $row = $result_staff->fetch_assoc();
                $staff=new Staff($username,$row["Password"]);
                return $staff;
            }
            else{
           
            $sql_query3="SELECT * FROM `doctor_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_doctor=mysqli_query($this->database,$sql_query3);
            $sql_query2="SELECT * FROM `patient_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_patient=mysqli_query($this->database,$sql_query2);
            if(mysqli_num_rows($result_doctor)>0){
                $row = $result_doctor->fetch_assoc();
                $doctor=new Doctor($row["Reg_Num"],$row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$row["Qualifications"],$username,$password);
                return $doctor;
            }
            else if(mysqli_num_rows($result_patient)>0){
                $row = $result_patient->fetch_assoc();
                $patient=new Patient($row["Firstname"],$row["Lastname"],$row["Email"],$row["Birthday"],$row["Gender"],$username,$password);

                return $patient;
               
            }       
        
    }
}
function register_patient($Firstname,$Lastname,$Email,$Birthday,$Gender,$Username,$pass){
    $password=md5($pass);
    $sql_query1="INSERT INTO `patient_accounts` ( `Firstname`, `Lastname`, `Email`, `Birthday`, `Gender`, `Username`, `Password`) VALUES ('$Firstname', '$Lastname', '$Email', '$Birthday', '$Gender', '$Username','$password')";
    mysqli_query($this->database,$sql_query1);
    $patient=new Patient($Firstname,$Lastname,$Email,$Birthday,$Gender,$Username,$password);
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