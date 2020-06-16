<?php
include_once("database_server.php");
include_once("users.php");
include("user_handler.php");
/**
 * The Context defines the interface of interest to clients.
 */
class UserManagement
{
    /**
     * The Context maintains a reference to one of the Strategy
     * objects. The Context does not know the concrete class of a strategy. It
     * should work with all strategies via the Strategy interface.
     */
    private $register_strategy;
    private $check_username_strategy;
    protected $database;


    /**
     * Usually, the Context accepts a strategy through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct()
    {
        $db_connect=new Db_Connection();
        $this->database=$db_connect->connect();
    
        //$this->register_strategy = $register_strategy;
        
    }
    function login_user($username,$pass){
        $password=md5($pass);
        $request=new Request($username,$password);
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
    function change_password($username,$password){
        $sql_query45="UPDATE `patient_accounts` SET `Password` = '$password' WHERE `Username` = '$username'";
        $result=mysqli_query($this->database,$sql_query45); 
        if($result){
            return true;
        }
        else{
            return false;
        }

    }
    function confirm_password($username,$password){
        $sql_query10="SELECT * FROM `patient_accounts` WHERE `Username`='$username' AND `Password`='$password'";
        $result=mysqli_query($this->database,$sql_query10);
        if(mysqli_num_rows($result)>0){
            return true;
        }
        else {
            return false;
        }

    }

    /**
     * Usually, the Context allows replacing a Strategy object at runtime.
     */
    public function SetRegisterStrategy(RegisterStrategy $register_strategy)
    {
        $this->register_strategy = $register_strategy;
    }

    public function SetCheckUsernamerStrategy(CheckUsernameStrategy $check_username_strategy)
    {
        $this->check_username_strategy = $check_username_strategy;
    }

    /**
     * The Context delegates some work to the Strategy object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function register(array $data)
    {
        // ...

        //echo "Context: Sorting data using the strategy (not sure how it'll do it)\n";
        $result = $this->register_strategy->register_($data);
        //echo implode(",", $result) . "\n";
        return $result;

        // ...
    }
    public function checkusername($username)
    {
        // ...

        //echo "Context: Sorting data using the strategy (not sure how it'll do it)\n";
        $result = $this->check_username_strategy->check_username($username);
        //echo implode(",", $result) . "\n";
        return $result;

        // ...
    }
}

/**
 * The Strategy interface declares operations common to all supported versions
 * of some algorithm.
 *
 * The Context uses this interface to call the algorithm defined by Concrete
 * Strategies.
 */
abstract class RegisterStrategy
{
    protected $database;

    public function __construct()
    {
            $db_connect=new Db_Connection();
            $this->database=$db_connect->connect();
    }
    public abstract function register_(array $data);
}



/**
 * Concrete Strategies implement the algorithm while following the base Strategy
 * interface. The interface makes them interchangeable in the Context.
 */
class RegisterPatientStrategy extends RegisterStrategy
{
    public function register_(array $data)
    {   $Firstname=$data[0];
        $Lastname=$data[1];
        $Email=$data[2];
        $Birthday=$data[3];
        $Gender=$data[4];
        $Username=$data[5];
        $pass=$data[6];
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
}

class RegisterDoctorStrategy extends RegisterStrategy
{
    public function register_(array $data)
    {
        $Reg_Num=$data[0];
        $Firstname=$data[1];
        $Lastname=$data[2];
        $Email=$data[3];
        $Birthday=$data[4];
        $Gender=$data[5];
        $Qualifications=$data[6];
        $Username=$data[7];
        $password=$data[8];
    $sql_query1="INSERT INTO `doctor_accounts` ( `Reg_Num`,`Firstname`, `Lastname`, `Email`, `Gender`, `Birthday`, `Qualifications`, `Username`, `Password`) VALUES ('$Reg_Num','$Firstname', '$Lastname', '$Email', '$Gender', '$Birthday','$Qualifications', '$Username','$password')";
    mysqli_query($this->database,$sql_query1); 
    $doctor=new Doctor($Reg_Num,$Firstname,$Lastname,$Email,$Birthday,$Gender,$Qualifications,$Username,$password);  
    }
}

abstract class CheckUsernameStrategy
{
    protected $database;
    protected bool $is_username_used=false;

    public function __construct()
    {
            $db_connect=new Db_Connection();
            $this->database=$db_connect->connect();
           
    }
    public function set_is_username_used($bool){
        $this->is_username_used=$bool;
    }
    public function get_is_username_used(){
        return $this->is_username_used;
    }

    public abstract function check_username($username);
}

class CheckPatientUsernameStrategy extends CheckUsernameStrategy
{
    public function check_username($username)
    {
    $sql_query0="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
    $checkusername=mysqli_query($this->database,$sql_query0);
    if(mysqli_num_rows($checkusername)>0){
        $this->set_is_username_used(true);
    }
    return $this->get_is_username_used();

    }}

class CheckDoctorUsernameStrategy extends CheckUsernameStrategy
    {
        public function check_username($username)
        {
            $sql_query6="SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
            $checkusername=mysqli_query($this->database,$sql_query6);
            if(mysqli_num_rows($checkusername)>0){
            $this->set_is_username_used(true);
        }
        return $this->get_is_username_used();
    
        }}



/**
 * The client code picks a concrete strategy and passes it to the context. The
 * client should be aware of the differences between strategies in order to make
 * the right choice.
 */
/*
$context = new Context(new ConcreteStrategyA);
echo "Client: Strategy is set to normal sorting.\n";
$context->doSomeBusinessLogic();

echo "\n";

echo "Client: Strategy is set to reverse sorting.\n";
$context->setStrategy(new ConcreteStrategyB);
$context->doSomeBusinessLogic();*/
?>
