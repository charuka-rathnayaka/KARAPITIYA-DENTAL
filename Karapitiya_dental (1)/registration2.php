<?php include("dbOperations/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> User registration form </title>
    <link rel="stylesheet" type="text/css" href="../Karapitiya_dental/css/stylesheet_form.css">
</head>

<body>
    <div class="header">
        <h1>Register</h1>

    </div>
    <form method="POST" action="registration2.php">
        <?php include("errors.php");
        ?>
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
            <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>


    </form>

</body>

</html>