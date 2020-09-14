<?php include("dbOperations/dental_history_function.php"); ?>
<?php include("dbOperations/config.php");
//require_once('patient_profile.php');
if (empty($_SESSION['username'])) {
    header("location:login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Dental History</title>
    <link rel="stylesheet" type="text/css" href="../Karapitiya_dental/css/stylesheet_dental_history.css">
</head>

<body>
    <h2>Dental History</h2>
    <table>

        <thead>
            <tr>
                <th>Username</th>
                <th> Date </th>
                <th>Category</th>
                <th>Treatment Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            calltable();
            ?>
        </tbody>
    </table>
</body>

</html>