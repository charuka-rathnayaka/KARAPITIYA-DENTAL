<?php include('config.php');
//require_once('patient_profile.php');
if (empty($_SESSION['username']) ) {
    header("location:login.php");
}
if (empty($_SESSION['password_confirmation']) ) {
    header("location:my_profile.php");
} ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Paasword Confirmation </title>
        <link rel="stylesheet" type="text/css" href="stylesheet_form.css">
    </head>
    <body>
    <div class="content">
        <div class="header">
            <h1>Change password</h1>

        </div><div class="input-data">
        <form method="POST" action="change_password.php">
            <?php include("errors.php");
             ?>            
             <div class="input-group">
            <label>Username: <?php echo $_SESSION["username"] ?></label>
            

        </div>
            <div class="input-group">
                <label>New Password</label>
                <input type="password" name="password1">
            </div>
            <div class="input-group">
                <label>Confirm New Password</label>
                <input type="password" name="password2">
            </div>
            
            <div class="input-group">
                <button type="submit" name="change_password" class="btn">Change Password</button>
            </div>
            </div>


            </form>
        
    </body>
</html>

