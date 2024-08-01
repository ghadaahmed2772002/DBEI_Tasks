
<?php
// function print_array($arr) 
// {
//     $val=0;
//     foreach ($arr as $val)
//     {
//         echo "[ ".$val ." ]";
//     }
// }

//session 1............................................................................
// function check_array_method ($x,$arr){

//     switch ($x)
//     {
//         case 's':
//             sort($arr);
//             break;
//         case 'a':
//             asort($arr);
//             break;
//         case 'k':
//             echo "this for sort with key" ."<br>";
//             ksort ($arr);
//             break;
//         case 'r':
//             rsort($arr);
//             break;
       
//     }
//    return $arr;     
// }

// $x=isset($x);   
// echo $x;
// echo "this the actual array :";
// print_array($arr);
// echo "<br>";
// function check_array ($arr,$x) {
//     if (isset($x))
//     {
//         if(in_array($x,$arr))
//         {
//             echo "sucess found at ".array_search($x,$arr);
//         }
//         else {
//             array_unshift($arr,$x);
//             print_array($arr);
//         }
//     }else {
//         echo "enter value to search in array";
//     }

// }
// check_array($arr,$x);


//session 2
// echo implode(" - ",$colleges) . "<br>";
 
// print_r(explode("-",$my_name));
 
// print_r(str_split($my_name,1)); # return as an array
 
// echo chunk_split($my_name,5); # return as a string
 
// $my_name = str_replace(["mohamed","elsayed"],["Ibrahim","asdasdsad"],$my_name)."<br>";
 
// echo str_repeat($my_name,5);
 
// echo str_shuffle($my_name);
 
// echo strlen($my_name);
 
// echo addslashes($my_name1);
 
// echo strtolower($my_name);
 
// echo strtoupper($my_name);
 
// echo lcfirst($my_name);
 
// echo ucfirst($my_name);
 
// echo ucwords($my_name);
 
// echo trim($my_name); #delete left and right spaces around the text
 
// echo ltrim($my_name); #delete left spaces
 
// echo rtrim($my_name); #delete right spaces
 
// echo str_word_count($my_name);
 
// echo strpos($my_name,"mohamed")
 
// echo stripos($my_name,"Mohamed")
 
// echo strrpos($my_name,"mohamed")
 
// echo strripos($my_name,"mohamed")
 
// echo strcmp($my_name1,$my_name);
 
// echo substr($my_name,4,7); start from index 4 and cut 7 chars
//task 1
// $x=8;
// $str="hello ghada";
// $wanted_word="ghada";
// $new_word ="ola";

// function find_word($wanted_word,$new_word,$str) {
//       if (strpos($str, $wanted_word))
//       {
//            return str_replace($wanted_word,$new_word,$str);
//       }
//       else 
//       {
//            return "not found";
//       }

    
// }
// $x=find_word($wanted_word,$new_word,$str);
// echo $x;

//task 2 


// $choice = 2;
// $arr = ["ghada","menna","engy","ahmed","mohanned","anas","anton","saad","amr"];

// function string_conversion($arr, $choice)
// {
//             if (!empty($arr))
//             {
//                 $str = implode(" ", $arr);
//                 switch ($choice) {
//                     case 1:
//                         $str = strtolower($str);
//                         break;
//                     case 2:
//                         $str = strtoupper($str);
//                         break;
//                     case 3:
//                         $str = lcfirst($str);
//                         break;
//                     case 4:
//                         $str = ucfirst($str);
//                         break;
//                     case 5:
//                         $str = ucwords($str);
//                         break;
//             }
//             return $str;
// }
// else 
// {
//     return "array is empty";
// }

// }

// $str = string_conversion($arr, $choice);
// echo $str;


// task ............................................................................
$userName = null;
$email = null;
$phone = null;
$password = null;
$university=null;
$faculty=null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = trim($_POST['userName']);
    $userName = addslashes($userName);

    $email = trim($_POST['email']);
    $email = addslashes($email);
    
    $phone = trim($_POST['phone']);
    $phone = addslashes($phone);

    $password = trim($_POST['password']);
    $password = addslashes($password);

    $university = trim($_POST['university']);
    $university = addslashes($university);

    $faculty = trim($_POST['faculty']);
    $faculty = addslashes($faculty);

    //cookies set for 24 * 30 *30 *actualtime
    setcookie('userName',$userName,time()+24*30*30,'/');
    setcookie('email',$email,time()+24*30*30,'/');
    setcookie('phone',$phone,time()+24*30*30,'/');
    setcookie('password',$password,time()+24*30*30,'/');   // phone and password sensitive data 
    setcookie('university',$university,time()+24*30*30,'/');
    setcookie('faculty',$faculty,time()+24*30*30,'/');
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
            <option value="">Select a university</option>
            <option value="Banha">Banha</option>
            <option value="Alexandria">Alexandria</option>
            <option value="Cairo">Cairo</option>
        </select>
        <label for="faculty">Faculty</label>
        <select name="faculty" id="faculty" required>
            <option value="">Select a faculty</option>
        </select>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($userName) && isset($password) && isset($email) && isset($phone) && isset($university) && isset($faculty)) {
        echo "<table>";
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Password</th>';
        echo '<th>Email</th>';
        echo '<th>Phone</th>';
        echo '<th>University</th>';
        echo '<th>Faculty</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $userName. '</td>';
        echo '<td>' . $password . '</td>';
        echo '<td>' . $email . '</td>';
        echo '<td>' . $phone. '</td>';
        echo '<td>' . $university . '</td>';
        echo '<td>' . $faculty. '</td>';
        echo '</tr>';
        echo '</table>';
    }
    ?>
    <script>
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
                facultySelect.innerHTML = '<option value="">Select a faculty</option>';

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

