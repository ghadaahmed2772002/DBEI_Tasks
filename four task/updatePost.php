<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');

if (!isset($_SESSION['userName'])) {
    header('Location: login.php');
}

if (isset($_POST['postId']) && isset($_POST['updateContent'])) {
    $postID=$_POST['postId'];
    $updateContent= $_POST['updateContent'];
    updatePost($postID,$updateContent);
}

?>
