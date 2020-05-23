<?php
 session_start();
 
 include("user_management.php");

 
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
    $user_manage=new Manage_user();
    $user_manage->check_patient_username($_POST["username"]);
    if(count($errors)==0){
        $user=$user_manage->register_patient($_SESSION["Firstname"],$_SESSION["Lastname"],$_SESSION["Email"],$_SESSION["birthday"],$_SESSION["gender"],$_POST["username"],$_POST["password1"]);
        if (get_class($user)=="Patient"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']="Now you are logged in patient "; 
            $_SESSION['username']=$user->get_username();
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
        $user_manage=new Manage_user();
        $user=$user_manage->login_user($_POST["username"],$_POST["password"]);
        if (get_class($user)=="Admin"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']="Now you are logged in admin"; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Staff"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']="Now you are logged in staff"; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Patient"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']="Now you are logged in patient"; 
            $_SESSION['username']=$user->get_username();
            header('location: index.php');
        }
        else if (get_class($user)=="Doctor"){
            $_SESSION["user_type"]=get_class($user);
            $_SESSION['success']="Now you are logged in dr"; 
            $_SESSION['username']=$user->get_username();
            //$_SESSION["user"]=$user;
            header('location: index.php');
        }
        else{
            array_push($errors,"Username and Password are incorrect");
        }
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
    $user_manage=new Manage_user();
    $user_manage->check_doctor_username($_POST["username"]);
    if(count($errors)==0){
        $password=md5($_POST["password1"]);
        
        $user=$user_manage->register_doctor($_POST["Reg_Num"],$_POST["Firstname"],$_POST["Lastname"],$_POST['Email'],$_POST['Birthday'],$_POST['Gender'],$_POST['Qualifications'],$_POST["username"],$password);
        header("location:index_admin.php");
    }
      
}

if (isset($_GET['logout'])){
        session_destroy();
        
        header('location: index.php');
}






?>
