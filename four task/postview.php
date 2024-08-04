<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');

if (!isset($_SESSION['userName'])) {
    header('Location: login.php');
}

$userName = $_SESSION['userName'];
$studentId = get_student_id($userName);
$posts = view_posts($studentId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
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
        .action-links form {
            display: inline;
        }
        .action-links button {
            border: 1px solid white;
            padding: 10px;
            background-color: rgb(0, 206, 209);
            color: black;
            font-weight: bold;
            border-radius: 5%;
            text-decoration: none;
            margin: 5px;
            cursor: pointer;
        }
        .action-links button:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <h1><?php echo ($userName); ?>'s Current Posts</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php 
            foreach ($posts as $post) {
                echo '<tr>';
                echo '<td>' .($post['id']) . '</td>';
                echo '<td>' . ($post['content']) . '</td>';
                echo '<td class="action-links">';
                echo '<form action="deletePost.php" method="post" style="display:inline;">
                        <input type="hidden" name="postId" value="' .($post['id']) . '">
                        <button type="submit">Delete</button>
                      </form>';
                echo '<form action="updatePost.php" method="post" style="display:inline;">
                        <input type="hidden" name="postId" value="' .($post['id']) . '">
                        <button type="submit">Update</button>
                        <input type="text" name="updateContent" placeholder="update content of post" required>
                      </form>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>
