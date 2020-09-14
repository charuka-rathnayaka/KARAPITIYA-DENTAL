<?php
/*$servername = "localhost";
$usrname = "root";
$pswrd = "";
$dbname = "dental_karapitiya";
$database=mysqli_connect($servername,$usrname,$pswrd,$dbname);
*/
class Db_Connection{
    protected $db_conn;
    public $servername = "localhost";
    public $usrname = "root";
    public $pswrd = "";
    public $dbname = "dentalkarapitiya";

    function connect(){
        try{
            $this->db_conn=mysqli_connect($this->servername,$this->usrname,$this->pswrd,$this->dbname);
            return $this->db_conn;
        }
        catch(Exception $e){
            return $e->getMessage();

        }

    }
}


?>