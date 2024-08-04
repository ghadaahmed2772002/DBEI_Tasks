<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $userName = $_POST['userName'];   
    login($userName,$email,$password);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN </title>
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
            box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.1);
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
        form input{
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 7px;
            transition: border-color 0.3s ease, padding 0.3s ease;
        }
        form input:focus {
            border-color: rgb(0, 206, 209);
            outline: none;
        }
        form input::placeholder {
            transition: color 0.3s ease;
        }
        form input:focus::placeholder {
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
        form input[type="submit"]:hover, {
            background-color: rgb(0, 216, 209);
        }
        form a {
            /* display: inline-block; */
            text-align: center;
            text-decoration: none;
            width: auto;
            color: rgb(0, 206, 209);
            font-size: 15px;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="userName">Name</label>
        <input type="text" name="userName" placeholder="Enter your name" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="abc@example.com" required>      
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="submit" value="LOG IN">
        <a href="signup.php" style="text-decoration:none; width:100%">go back to sign up</a>
    </form>

</body>
</html>