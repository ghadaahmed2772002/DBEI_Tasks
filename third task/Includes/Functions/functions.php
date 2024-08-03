<?php
function logout(){
    session_unset();
    session_destroy();
   
}

function signup($userName,$email,$password,$phone,$university,$faculty)
{
    global $con;
    $stmt=$con->prepare('INSERT INTO students (name,email,password,phone,university,faculty)VALUES (:studentName,:studentEmail,:studentPassword,:studentPhone,:university,:faculty)');
    $stmt->execute(
        array(
           ':studentName' =>$userName,
            ':studentEmail'=>$email,
            ':studentPassword'=>md5($password),
            ':studentPhone'=>$phone,
            'university'=>$university,
            ':faculty'=>$faculty

        )
    );
    echo '<script>alert("Success add to student")</script>';
    header('refresh:3,url=login.php');
}

function login($email,$password){
    global $con;
    $stmt = $con->prepare('SELECT * FROM students where email = ? and password = ?');
    $stmt->execute(array($email, md5($password)));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($count>0)
    {
        $_SESSION['email']=$row['email'];
        header('Location: index.php'); 
    }else{
        echo '<script>alert("False email or password");</script>';
        header('refresh:3, url=login.php');

    }

}
function get_all_students_data() {
    global $con;
    $stmt = $con->prepare('SELECT * FROM students');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) === 0) {
        return 'No data available';
    } else {
        return $rows;
    }
}























?>