<?php include("dbOperations/config.php");
if ($_SESSION["username"] != "admin") {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> User registration form </title>
    <link rel="stylesheet" type="text/css" href="stylesheet_form.css">
</head>

<body>
    <div class="header">
        <h1>Register</h1>

    </div>
    <form method="POST" action="add_doctor.php">
        <?php include("errors.php");
        ?>
        <div class="input-group">
            <label>Registration number</label>
            <input type="text" name="Reg_Num" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Firstname</label>
            <input type="text" name="Firstname" value="<?php ?>">
        </div>
        <div class="input-group">
            <label>Lastname</label>
            <input type="text" name="Lastname" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="Email" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Birthday:</label>
            <input type="date" name="Birthday">
        </div>
        <br>
        <div class="input-data">
            <input type="radio" name="Gender" value="male">
            <label>Male</label><br>
            <input type="radio" name="Gender" value="female">
            <label>Female</label><br>
        </div>
        <div class="input-group">
            <label>Qualifications</label>
            <input type="text" name="Qualifications" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password2">
        </div>
        <div class="input-group">
            <button type="submit" name="add_doctor" class="btn">ADD DOCTOR</button>
        </div>
        <br>




    </form>

</body>

</html>