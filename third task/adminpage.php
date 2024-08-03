<?php
session_start();
require_once('Includes/Functions/db_connect.php');
require_once('Includes/Functions/functions.php');


if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@gmail.com') {
    header('Location: login.php');
}
$students = get_all_students_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
        table {
            width: 90%;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: rgb(0, 206, 209);
            color: white;
            font-weight: bold;
        }
        td {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>University</th>
            <th>Faculty</th>
        </tr>
        <?php 
            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' .($student['id']) . '</td>';
                echo '<td>' . ($student['name']) . '</td>';
                echo '<td>' . ($student['email']) . '</td>';
                echo '<td>' . ($student['phone']) . '</td>';
                echo '<td>' . ($student['university']) . '</td>';
                echo '<td>' . ($student['faculty']) . '</td>';
                echo '</tr>';
            }
        ?>

    </table>
</body>
</html>
