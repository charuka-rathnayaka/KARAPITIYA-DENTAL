<?php
 session_start();
 
 
 include("dental_visit_reminder.php");
 include("email_factory.php");
 include("UserManagementStrategy.php");

 
 $errors=array();


 if (isset($_POST['Next'])){
     //register form 1
     
     if(empty($_POST["Firstname"])){
        array_push($errors,"Firstname is required");
    }
    if(empty($_POST['Lastname'])){
        array_push($errors,"Lastname is required");
    }
    if(empty($_POST['Email'])){
        array_push($errors,"Email is required");
    }
    if(empty($_POST['Birthday'])){
        array_push($errors,"Birthday is required");
    }if(empty($_POST['Gender'])){
        array_push($errors,"gender is required");
    }
    if(count($errors)==0){
        //$Firstname=$_POST["Firstname"];
        $_SESSION["Firstname"]=$_POST["Firstname"];
        $_SESSION["Lastname"]=$_POST['Lastname'];    
        $_SESSION["Email"]=$_POST['Email'];    
        $_SESSION["birthday"]=$_POST['Birthday'];    
        $_SESSION["gender"]=$_POST['Gender'];    
        header('location: registration2.php');
    }
       
 }

 if (isset($_POST['register'])){
    if(empty($_POST["username"])){
        array_push($errors,"username is required");}
    if(empty($_POST["password1"])){
        array_push($errors,"Password is required");
    }if(empty($_POST["password2"])){
        array_push($errors,"Password confirmation is required");
    }
    if($_POST["password1"]!=$_POST["password2"]){
        array_push($errors,"Passwords does not match");
    }
    
    $user_managee=new UserManagement();
    $user_managee->SetCheckUsernamerStrategy(new CheckPatientUsernameStrategy());
    $user_managee->SetRegisterStrategy(new RegisterPatientStrategy());
    $check_username=$user_managee->checkusername($_POST["username"]);
    if($check_username==true){
        array_push($errors,"Username is already used. Please use another Username.");
    }
    
    if(count($errors)==0){
        $array_data=array($_SESSION["Firstname"],$_SESSION["Lastname"],$_SESSION["Email"],$_SESSION["birthday"],$_SESSION["gender"],$_POST["username"],$_POST["password1"]);
        $user=$user_managee->register($array_data);
        if (get_class($user)=="Patient"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']=""; 
            $_SESSION['username']=$user->get_username();
            $email_fac=new RegisterFactory();
            $email=$email_fac->operate($_SESSION["Email"],$_SESSION["Firstname"]);
            $email_app=new EmailSender($email);
            $email_app->send_email();
            header('location: index.php');
        }
        else{
            array_push($errors,"Error occured");

        }

        }
    }

if(isset($_POST['login'])){
    if (empty($_POST["username"])){
        array_push($errors,"Please enter Username");
    }
    if (empty($_POST["password"])){
        array_push($errors,"Please enter password");
    }
    if(count($errors) == 0 ){
       
        $user_managee=new UserManagement();
        $user=$user_managee->login_user($_POST["username"],$_POST["password"]);
        if(is_null($user)){
                array_push($errors,"Unknown error");}
        else{
        if (get_class($user)=="Admin"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']=""; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Staff"){
            $_SESSION["user_type"]=get_class($user);
            $tody=date("Y-m-d");
            $reminder = Reminder::getInstance();
            $reminder->send_reminders($tody);
            $reminder->setdate($tody);
            $_SESSION['success']=""; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Patient"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']=""; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Doctor"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']=""; 
            $_SESSION['username']=$user->get_username();
            //$_SESSION["user"]=$user;
            header('location: index.php');
        }
        else{
            array_push($errors,"Username and Password are incorrect");
        }}
        


}
}

if (isset($_POST['add_doctor'])){
    if(empty($_POST["Reg_Num"])){
        array_push($errors,"Registration number is required");
    }
    if(empty($_POST["Firstname"])){
        array_push($errors,"Firstname is required");
    }
    if(empty($_POST['Lastname'])){
        array_push($errors,"Lastname is required");
    }
    if(empty($_POST['Email'])){
        array_push($errors,"Email is required");
    }
    if(empty($_POST['Birthday'])){
        array_push($errors,"Birthday is required");
    }if(empty($_POST['Gender'])){
        array_push($errors,"gender is required");
    }
    if(empty($_POST["Qualifications"])){
        array_push($errors,"Qualifications are required");
    }
    if(empty($_POST["username"])){
        array_push($errors,"Username is required");
    }
    
    if(empty($_POST["password1"])){
        array_push($errors,"Password is required");
    }if(empty($_POST["password2"])){
        array_push($errors,"Password confirmation is required");
    }
    if($_POST["password1"]!=$_POST["password2"]){
        array_push($errors,"Passwords does not match");
    }
    $username=$_POST["username"];
    $user_managee=new UserManagement();
    $user_managee->SetRegisterStrategy(new RegisterDoctorStrategy());
    $user_managee->SetCheckUsernamerStrategy(new CheckDoctorUsernameStrategy());
    $check_username=$user_managee->checkusername($_POST["username"]);
    if($check_username==true){
        array_push($errors,"Username is already used. Please use another Username.");
    }
    if(count($errors)==0){
        $password=md5($_POST["password1"]);
        $array_data=array($_POST["Reg_Num"],$_POST["Firstname"],$_POST["Lastname"],$_POST['Email'],$_POST['Birthday'],$_POST['Gender'],$_POST['Qualifications'],$_POST["username"],$password);
        $user=$user_managee->register($array_data);
        header("location:index.php");
    }
      
}

if (isset($_GET['logout'])){
        session_destroy();
        header('location: index.php');
}



if(isset($_POST["change_password"])){
    if(empty($_POST["password1"])){
        array_push($errors,"Password is required");
    }if(empty($_POST["password2"])){
        array_push($errors,"Password confirmation is required");
    }

    if(count($errors)==0){
        $password=md5($_POST["password1"]);
        $username=$_SESSION["username"];
        $user_type=$_SESSION["user_type"];
        $user_managee=new UserManagement();
            if($user_type=="Patient"){
            $user_managee->SetChangePasswordStrategy(new ChangePatientPasswordStrategy());
            }
            else if ($user_type=="Doctor"){
                $user_managee->SetChangePasswordStrategy(new ChangeDoctorPasswordStrategy());
            }
            else{
                array_push($errors,"Unauthorized action - Password Cannot be changed ");
            }
        $res=$user_managee->change_password($username,$password);
        if($res==true){
            if($user_type=="Patient"){
        header("location:my_profile.php");}
            else{
                header("location:profile_doctor.php");} 
            }
        else{
            array_push($errors,"Error occured");
        }
    }}




if(isset($_POST["confirm_password"])){
    if(empty($_POST["password1"])){
        array_push($errors,"Please enter the password");
        
    }
    if(count($errors)==0){
        $password=md5($_POST["password1"]);
        $username=$_SESSION["username"];
            $user_type=$_SESSION["user_type"];
            $user_managee=new UserManagement();
            if($user_type=="Patient"){
            $user_managee->SetConfirmPasswordStrategy(new ConfirmPatientPasswordStrategy());
            }
            else if ($user_type=="Doctor"){
                $user_managee->SetConfirmPasswordStrategy(new ConfirmDoctorPasswordStrategy());
            }
            else{
                array_push($errors,"Alert : Unauthorized action");
            }
            
            $res=$user_managee->confirm_password($username,$password);
            if($res==true){
                $_SESSION["password_confirmation"]="True";
            header("location:change_password.php");
            
        }
            else{
                array_push($errors,"Password incorrect");
            }
        }
    }







?>

