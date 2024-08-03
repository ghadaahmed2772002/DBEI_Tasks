<?php
session_start();
require_once('Includes/Functions/db_connect.php');
require_once('Includes/Functions/functions.php');
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>hello This main Page ,
        <?php 
           echo $_SESSION['email'];
        ?>
    </h1>
    <a href="logout.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">Log Out</a>
    <a href="adminpage.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">Admin Page</a>    
</body>
</html>