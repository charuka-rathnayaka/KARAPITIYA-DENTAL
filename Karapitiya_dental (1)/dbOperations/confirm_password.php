<?php include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Paasword Confirmation </title>
        <link rel="stylesheet" type="text/css" href="../../Karapitiya_dental/css/stylesheet_form.css">
    </head>
    <body>
        <div class="header">
            <h1>Confirm Current Password</h1>

        </div>
        <form method="POST" action="confirm_password.php">
            <?php include("errors.php");
             ?>            
            <div class="input-group">
            <label>Username:</label>
            <label id="Username"><?php echo $_SESSION["username"] ?></label>

            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password1">
            </div>
            
            <div class="input-group">
                <button type="submit" name="confirm_password" class="btn">Confrim Password</button>
            </div>
            


            </form>
        
    </body>
</html>
