<?php
session_start();
require_once('db_connect.php');
require_once('Includes/Functions/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $university = $_POST['university'];
    $faculty = $_POST['faculty'];

    signup($userName, $email, $password, $phone, $university, $faculty);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghada Ahmed</title>
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
        form input, form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 7px;
            transition: border-color 0.3s ease, padding 0.3s ease;
        }
        form input:focus, form select:focus {
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
        form input[type="submit"]:hover {
            background-color: rgb(0, 216, 209);
        }
        
    </style>

</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="userName">Name</label>
        <input type="text" name="userName" placeholder="Enter your name" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="abc@example.com" required>
        <label for="phone">Phone</label>
        <input type="tel" name="phone" placeholder="Enter your phone number" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <label for="university">University</label>
        <select name="university" id="university" required>
            <option value="">select university</option>
            <option value="Banha">Banha</option>
            <option value="Alexandria">Alexandria</option>
            <option value="Cairo">Cairo</option>
        </select>
        <label for="faculty">Faculty</label>
        <select name="faculty" id="faculty" required>
            <option value="">select faculty</option>
        </select>
        <input type="submit" value="Sign UP">
    </form>
 
    <script>
        /* THis when Select Faculty from Unversities as ARRAY*/
        document.addEventListener('DOMContentLoaded', function() {
            const universitySelect = document.getElementById('university');
            const facultySelect = document.getElementById('faculty');

            const universities = {
                Banha: [
                    { name: 'Engineering', value: 'engineering' },
                    { name: 'Computers and Artificial Intelligence', value: 'computers_and_ai' },
                    { name: 'Law', value: 'law' },
                    { name: 'Medicine', value: 'medicine' }
                ],
                Alexandria: [
                    { name: 'Science', value: 'science' },
                    { name: 'Agriculture', value: 'agriculture' }
                ],
                Cairo: [
                    { name: 'Commerce', value: 'commerce' },
                    { name: 'Education', value: 'education' }
                ]
            };

            universitySelect.addEventListener('change', function() {
                const selectedUniversity = universitySelect.value;
                facultySelect.innerHTML = '<option value="">select faculty</option>';

                if (selectedUniversity && universities[selectedUniversity]) {
                    universities[selectedUniversity].forEach(function(faculty) {
                        const option = document.createElement('option');
                        option.value = faculty.value;
                        option.textContent = faculty.name;
                        facultySelect.appendChild(option);
                    });
                }
            });
        });
    </script>
</body>
</html>