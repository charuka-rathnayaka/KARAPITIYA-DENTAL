include_once('database_server.php');



    
function send_reminder_mail($to_email,$firstname){
    $subject = "Dental Visit Reminder";
    $body ="Hi $firstname,"."\n\n"."         Hope you are in good health. Our records show that it has been three months from your last visit to the dental clinic. So we hope it is time for you to have a dental checkup. Plese follow our website to add a dental appointment so you can experience our service efficiently. Looking forward to meet you!"."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
    $headers = "From: KARAPITIYA DENTAL";
    
    mail($to_email, $subject, $body, $headers);
    
    }
    
    

// General singleton class.
class Reminder{
    // Hold the class instance.
    private static $instance = null;
    protected $date;
    
    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct($date)
    {
        $this->date=$date;
   
    }
   public function setdate($newdate){
    $this->date=$newdate;
   }
    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance($day)
    {
      if (self::$instance == null)
      {
        self::$instance = new Reminder($day);
      }
   
      return self::$instance;
    }
    function send_reminders($today_date){
        $timestamp1 = strtotime($this->date);
        $timestamp2 = strtotime($today_date);
        if($timestamp1 != $timestamp2){
        $db_connect=new Db_Connection();
        $database=$db_connect->connect();
        $sql_query88="SELECT * FROM `patient_dental_visit_status`";
        $result=mysqli_query($database,$sql_query88);
        $tod=date("Y-m-d");
        $today=date_create($tod);
        while($row=$result->fetch_assoc()){
            $last_visit=date_create($row["Last_appointment"]);
            $diff=date_diff($last_visit,$today);
            $differ=$diff->format("%R%a");
            $day_dif = (int) $differ;
            /*if (($row["Status"]=="not_notified") && ($day_dif>90)){*/
                if (($row["Status"]=="not_notified")){
                send_reminder_mail($row["Email"],$row["Firstname"]);
                $username=$row["Username"];
                $sql_query77="UPDATE `patient_dental_visit_status` SET `Status` = 'notified' WHERE `patient_dental_visit_status`.`Username` = '$username'";
                $update=mysqli_query($database,$sql_query77);
            }
        }}
        else{}
        }
        function send_reminder_mail($to_email,$firstname){
            $subject = "Dental Visit Reminder";
            $body ="Hi $firstname,"."\n\n"."         Hope you are in good health. Our records show that it has been three months from your last visit to the dental clinic. So we hope it is time for you to have a dental checkup. Plese follow our website to add a dental appointment so you can experience our service efficiently. Looking forward to meet you!"."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
            $headers = "From: KARAPITIYA DENTAL";
            
            mail($to_email, $subject, $body, $headers);
            
            }
  }


?>

