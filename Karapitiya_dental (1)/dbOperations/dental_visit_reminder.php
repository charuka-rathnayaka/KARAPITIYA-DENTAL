<?php
include_once('database_server.php');
//include('email_factory.php');



    
function send_reminder_mail($to_email,$firstname){
    
    $email_fac=new ReminderFactory();
    $email=$email_fac->operate($to_email,$firstname);
    $email_app=new EmailSender($email);
    $email_app->send_email();
    
    }
    
    

// General singleton class.
class Reminder{
    // Hold the class instance.
    private static $instance = null;
    protected static $date="2020-04-05";
    
    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct()
    {
       
   
    }
   public function setdate($newdate){
    $this->date=$newdate;
   }
   public function get_date(){
    return $this->date;
   }
    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
      if (self::$instance == null)
      {
        self::$instance = new Reminder();
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
