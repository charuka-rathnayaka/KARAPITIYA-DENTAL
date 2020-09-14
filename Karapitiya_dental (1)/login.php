<?php include("dbOperations/config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title> User Login form </title>
    <link rel="stylesheet" type="text/css" href="stylesheet_form.css">

</head>

<body>
    <div class="header">
        <h1>Login</h1>

    </div>
    <form method="POST" action="login.php">
        <?php include("errors.php");
        ?>
        <div class=input-group>
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class=input-group>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class=input-group>
            <button type="submit" name="login" class="btn">Login</button>
        </div>

        <p>
            Not a member? <a href="registration1.php">Create new Account</a>
        </p>


    </form>

</body>

</html>