<?php
include_once('database_server.php');



class Originato
{

    private $state;
    private $idnum;
    public function __construct()
    {
    }



    public function save(int $id, string $preTable, string $curTable)
    {
        $database = new Db_Connection();
        $db = $database->connect();
        if ($preTable == 'waitinglist' and $curTable == 'booking') {

            $ss = "INSERT INTO memento (appointment_ID,preTable,curTable) VALUES ($id,'waitinglist','booking')";

            mysqli_query($db, $ss);
        } else if ($curTable == 'waitinglist' and $preTable == 'booking') {
            $ss = "INSERT INTO memento (appointment_ID,preTable,curTable) VALUES ($id,'booking','waitinglist')";

            mysqli_query($db, $ss);
        } else {
            $ss = "INSERT INTO memento (appointment_ID,preTable,curTable) VALUES ($id,'booking','todayappointment')";

            mysqli_query($db, $ss);
        }




        $ss = "SELECT * FROM memento ";
        $re = mysqli_query($db, $ss);
        if (mysqli_num_rows($re) > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                $this->idnum = $row["ID"];
            }
        }
        print_r($this->idnum);
        $this->state = new State($id, $preTable, $curTable, $this->idnum);
        return new Memento($this->state);
    }

    /**
     * Restores the Originator's state from a memento object.
     */
    public function restore(Memento $memento): void
    {
        $this->state = $memento->getState();
        $this->change($this->state);
    }
    public function change(State $state)
    {

        $database = new Db_Connection();
        $db = $database->connect();
        $idnum = strval($state->getId());
        $ss = "DELETE FROM memento WHERE `ID`=$idnum ; ";
        mysqli_query($db, $ss);
        $appointId = strval($state->getAppointmentId());

        $table = $state->getCurTable();
        $ss1 = "SELECT * FROM $table WHERE `appointment_ID`=$appointId ";
        $re = mysqli_query($db, $ss1);
        if (mysqli_num_rows($re) > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                $username = $row["username"];
                $date = $row["date"];
                $appointmentnumber = $row["Appointmentnumber"];
                $category = $row["category"];
                $appointment_ID = $row["appointment_ID"];
                $patient_name = $row["patient_name"];
            }
        }




        $preT = $state->getpreTable();
        $curT = $state->getCurTable();
        $sql = "INSERT INTO $preT (username,date,Appointmentnumber,category,appointment_ID,patient_name) VALUES ('$username','$date','$appointmentnumber','$category ','$appointment_ID','$patient_name');";
        mysqli_query($db, $sql);
        $sql2 = "DELETE FROM $curT WHERE `appointment_ID`='$appointment_ID'";
        mysqli_query($db, $sql2);
    }
}

/**
 * The Memento interface provides a way to retrieve the memento's metadata, such
 * as creation date or name. However, it doesn't expose the Originator's state.
 */




/**
 * The Concrete Memento contains the infrastructure for storing the Originator's
 * state.
 */
class  Memento
{
    private $state;



    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * The Originator uses this method when restoring its state.
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * The rest of the methods are used by the Caretaker to display metadata.
     */
    public function getName(): string
    {
        return  $this->state->getAppointmentId();
    }
}

/**
 * The Caretaker doesn't depend on the Concrete Memento class. Therefore, it
 * doesn't have access to the originator's state, stored inside the memento. It
 * works with all mementos via the base Memento interface.
 */
class Caretaker
{

    private $mementos = array();


    private $originator;

    public function __construct(Originato $originator)
    {
        $database = new Db_Connection();
        $db = $database->connect();
        $ss = "SELECT  * FROM memento ORDER BY ID ASC ";
        $re = mysqli_query($db, $ss);
        if (mysqli_num_rows($re) > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                $appointId = $row["appointment_ID"];
                $preTable = $row["preTable"];
                $curTable = $row["curTable"];
                $id = $row["ID"];
                $st = new State($appointId, $preTable, $curTable, $id);
                $memn = new Memento($st);
                array_push($this->mementos, $memn);
            }
        }
        $this->originator = $originator;
    }

    public function backup(int $id, string $preTable, string $curTable): void
    {

        array_push($this->mementos, $this->originator->save($id, $preTable, $curTable));;
    }

    public function undo(): void
    {

        if (!count($this->mementos)) {
            return;
        }
        $memento = array_pop($this->mementos);


        try {
            $this->originator->restore($memento);
        } catch (\Exception $e) {
            $this->undo();
        }
    }

    public function showHistory(): void
    {

        foreach ($this->mementos as $memento) {
            echo $memento->getName() . "\n";
        }
    }
}
class State
{
    private $appointId;
    private $preTable;
    private $curTable;
    private $Idnum;
    /*$database = new Db_Connection();
        $db = $database->connect();
        $ss = "SELECT TOP 1 * FROM Table ORDER BY ID DESC ";
        $re = mysqli_query($db, $ss);
        if (mysqli_num_rows($re) > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                $this->appointId = $row["appointment_ID"];
                $this->preTable = $row["preTable"];
                $this->curTable = $row["curTable"];
            }
        }*/

    public function __construct(int $id, string $preTable, string $curTable, int $idnum)
    {
        $this->appointId = $id;
        $this->preTable = $preTable;
        $this->curTable = $curTable;
        $this->Idnum = $idnum;
    }
    public function getAppointmentId()
    {
        return $this->appointId;
    }
    public function getPreTable()
    {
        return $this->preTable;
    }
    public function getCurTable()
    {
        return $this->curTable;
    }
    public function getId()
    {

        return $this->Idnum;
    }
}
