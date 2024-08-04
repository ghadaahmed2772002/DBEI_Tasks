<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');
if(isset($_SESSION['userName']))
{
header('Location=login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
   $content=$_POST['content'];
   $userName=$_SESSION['userName'];
   $studentId=get_student_id($userName);
   add_post($content,$studentId);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <style>
        body {
            background-color: #eee;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            color: rgb(0, 206, 209);
            font-family: Arial, sans-serif;
        }
        form {
            background-color: #fff;
            padding: 50px;
            font-size: 20px;
            border-radius: 8px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        form:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 7px;
            transition: border-color 0.3s ease, padding 0.3s ease;
        }
        form input:focus, form textarea:focus {
            border-color: rgb(0, 206, 209);
            outline: none;
        }
        form input::placeholder, form textarea::placeholder {
            transition: color 0.3s ease;
        }
        form input:focus::placeholder, form textarea:focus::placeholder {
            color: transparent;
        }
        form input[type="submit"] {
            background-color: rgb(0, 206, 209);
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 7px;
            transition: background-color 0.3s ease;
        }
        form input[type="submit"]:hover {
            background-color: rgb(0, 216, 209);
        }
    </style>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="content">Content</label>
        <input for="text" value="<?php echo $_SESSION['userName']?>">
        <textarea name="content" placeholder="Write your post here" required></textarea>
        <input type="submit" value="Add Post">
    </form>
</body>
</html>
