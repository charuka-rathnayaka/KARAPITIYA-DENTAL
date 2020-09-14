<?php include("dbOperations/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> User registration form </title>
    <link rel="stylesheet" type="text/css" href="../Karapitiya_dental/css/stylesheet_form.css">
    <script src="../Karapitiya_dental/js/validate_register.js"></script>
</head>

<body>
    <div class="header">
        <h1>Register</h1>

    </div>
    <form name="reg1" method="POST" action="registration1.php" onsubmit="return validate()">
        <?php include("errors.php");
        ?>

        <div class="input-group">
            <label>Firstname</label>
            <span id="error_firstname" style="color:red;"></span>
            <input type="text" name="Firstname" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Lastname</label>
            <span id="error_lastname" style="color:red;"></span>
            <input type="text" name="Lastname" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <span id="error_email" style="color:red;"></span>
            <input type="text" name="Email" value="<?php  ?>">
        </div>
        <div class="input-group">
            <label>Birthday:</label>
            <span id="error_birthday" style="color:red;"></span>
            <input type="date" name="Birthday">
        </div>

        <div class="input-data">
            <span id="error_gender" style="color:red;"></span>
            <br>
            <input type="radio" name="Gender" value="male">
            <label>Male</label><br>
            <input type="radio" name="Gender" value="female">
            <label>Female</label><br>
        </div>
        <br>
        <div class="input-group">
            <button type="submit" name="Next" class="btn">Next</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>


    </form>

</body>

</html>