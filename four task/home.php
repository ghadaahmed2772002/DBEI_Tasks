<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');
if(isset($_SESSION['userName']))
{
header('Location=login.php');
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
           echo $_SESSION['userName'];
        ?>
    </h1>
    <a href="logout.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">Log Out</a>
    <a href="adminpage.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">Admin Page</a>
    <a href="postview.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">POSTS</a>   
    <a href="addpost.php" style="border:1px solid white; color:white; padding:20px; background-color:black; font-weight:bold; border: raduis 5%; ">ADD POST</a> 
</body>
</html>