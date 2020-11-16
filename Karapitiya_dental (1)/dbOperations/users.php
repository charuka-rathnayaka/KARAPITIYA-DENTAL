<?php
class Patient implements JsonSerializable
{
    protected string $Firstname;
    protected $Lastname;
    protected $Email;
    protected $Birthday;
    protected $Gender;
    protected string $Username;
    protected $Password;

    function __construct($firstname, $lastname, $email, $birthday, $gender, $username, $password)
    {
        $this->Firstname = $firstname;
        $this->Lastname = $lastname;
        $this->Email = $email;
        $this->Birthday = $birthday;
        $this->Gender = $gender;
        $this->Username = $username;
        $this->Passsword = $password;
    }
    function get_username()
    {
        return $this->Username;
    }
    function get_Firstname()
    {
        return $this->Firstname;
    }
    function get_Lastname()
    {
        return $this->Lastname;
    }
    function get_Email()
    {
        return $this->Email;
    }
    function get_Birthday()
    {
        return $this->Birthday;
    }
    function get_Gender()
    {
        return $this->Gender;
    }
    public function jsonSerialize()
    {
        return
            [
                'Firstname'   => $this->get_Firstname(),
                'Lastname' => $this->get_Lastname(),
                'Email'   => $this->get_Email(),
                'Birthday'   => $this->get_Birthday(),
                'Gender'   => $this->get_Gender(),
                'Username'   => $this->get_username()
            ];
    }
}

class Dental_Staff
{
    protected string $Username;
    protected string $Password;
    function __construct($username, $password)
    {
        $this->Username = $username;
        $this->Passsword = $password;
    }
    function get_username()
    {
        return $this->Username;
    }
}

class Doctor extends Dental_staff implements JsonSerializable
{
    protected String $Reg_num;
    protected string $Firstname;
    protected string $Lastname;
    protected string $Email;
    protected string $Birthday;
    protected string $Gender;
    protected string $Qualifications;
    function __construct($reg_num, $firstname, $lastname, $email, $birthday, $gender, $qualifications, $username, $password)
    {
        $this->Reg_num = $reg_num;
        $this->Firstname = $firstname;
        $this->Lastname = $lastname;
        $this->Email = $email;
        $this->Birthday = $birthday;
        $this->Gender = $gender;
        $this->Qualifications = $qualifications;
        $this->Username = $username;
        $this->Passsword = $password;
    }
    public static function getInstance()
    {
        include_once("database_server.php");
        include_once('config.php');
        $db_connect = new Db_Connection();
        $database = $db_connect->connect();
        $username = $_SESSION["username"];
        $sql_query11 = "SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
        $result = mysqli_query($database, $sql_query11);
        $row = mysqli_fetch_assoc($result);

        $doctor = new Doctor($row["Reg_Num"], $row["Firstname"], $row["Lastname"], $row["Email"], $row["Birthday"], $row["Gender"], $row["Qualifications"], $row["Username"], $row["Password"]);
        return $doctor;
    }
    function get_username()
    {
        return $this->Username;
    }
    function get_Firstname()
    {
        return $this->Firstname;
    }
    function get_Lastname()
    {
        return $this->Lastname;
    }
    function get_Email()
    {
        return $this->Email;
    }
    function get_Birthday()
    {
        return $this->Birthday;
    }
    function get_Gender()
    {
        return $this->Gender;
    }
    function get_Reg_num()
    {
        return $this->Reg_num;
    }
    function get_Qualifications()
    {
        return $this->Qualifications;
    }
    public function jsonSerialize()
    {
        return
            [
                'Reg_num'   => $this->get_Reg_num(),
                'Firstname'   => $this->get_Firstname(),
                'Lastname' => $this->get_Lastname(),
                'Email'   => $this->get_Email(),
                'Birthday'   => $this->get_Birthday(),
                'Gender'   => $this->get_Gender(),
                'Username'   => $this->get_username(),
                'Qualifications'   => $this->get_Qualifications()
            ];
    }
    public function getTodayAppointment()
    {
        include('dbOperations/todayAppData.php');
    }
}
class Admin extends Dental_staff
{
}

class Staff extends Dental_staff
{
    public static function getInstance()
    {
        include_once("database_server.php");
        include_once('config.php');
        $db_connect = new Db_Connection();
        $database = $db_connect->connect();
        $username = $_SESSION["username"];
        $sql_query11 = "SELECT * FROM `staff_accounts` WHERE `Username`='$username'";
        $result = mysqli_query($database, $sql_query11);
        $row = mysqli_fetch_assoc($result);

        $staff = new Staff($row["Username"], $row["Password"]);
        return $staff;
    }
    public function showTable()
    {
        include('showTables.php');
    }
    public function waitingListUpdate()
    {
        include('dbOperations/waitingListUpdate.php');
    }
}
