<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');

if (!isset($_SESSION['userName'])) {
    header('Location: login.php');
}

if (isset($_POST['postId'])) {
    deletePost($_POST['postId']);
    header('Location: postview.php');
} else {
    echo '<script>alert("No post ID provided");</script>';
    header('Location: postview.php');
}

?>
