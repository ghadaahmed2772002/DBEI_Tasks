<?php
session_start();
require_once('Includes/Functions/functions.php');
logout();
echo '<script>alert ("you log out sucessfully");</script>';
header('refresh:3, url=login.php');
?>
