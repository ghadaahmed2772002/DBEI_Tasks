<?php

/* this insert in DB........................................*/ 

function signup($userName, $email, $password, $phone, $university, $faculty){
    global $con;
    $stmt=$con->prepare('INSERT INTO students (name, email, password, phone, university, faculty) VALUES (:userName, :email, :password, :phone, :university, :faculty)');
    $stmt->execute(
        array(
           ':userName' =>$userName,
            ':email'=>$email,
            ':password'=>md5($password),
            ':phone'=>$phone,
            ':university'=>$university,
            ':faculty'=>$faculty
        )
    );
    echo '<script>alert("Success add to student")</script>';
    header('refresh:3,url=login.php');
}

/* this select in DB........................................*/ 

function login($userName,$email,$password){
    global $con;
    $stmt=$con->prepare('SELECT * FROM  students where name=? and email=? and  password=? ');
    $stmt->execute(
        array(
           $userName,
            $email,
            md5($password),
        )
    );
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();
    if($count>0)
    {
        $_SESSION['email']=$row['email'];
        $_SESSION['userName']=$row['name'];
        echo '<script>alert("loggin sucess");</script>';
        header('Location: home.php'); 
    }else{
        echo '<script>alert("False email or password");</script>';
        header('refresh:3, url=login.php');

    } 
}

/* this get all student  in DB........................................*/ 

function get_all_students_data() {
    global $con;
    $stmt = $con->prepare('SELECT * FROM students');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/* this get student ID in DB........................................*/ 

function get_student_id($userName){
    global $con;
    $stmt=$con->prepare('SELECT id FROM  students where name=:userName');
    $stmt->execute(
        array(
           'userName'=>$userName,
        )
    );
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $studentId=$row['id'];
    return $studentId;

}
/* this insert post in DB........................................*/ 

function add_post($content,$studentId){
    global $con;
    $stmt=$con->prepare('INSERT INTO posts (student_id,content) VALUES (:student_id,:content)');
    $stmt->execute(
        array(
           ':student_id' =>$studentId,
            ':content'=>$content,
        )
    );
    echo '<script>alert("Success add to posts")</script>';
    header('Location:home.php');
}

/* this select post from DB........................................*/ 

function view_posts($studentId){
    global $con;
    $stmt=$con->prepare('SELECT * FROM  posts WHERE student_id = :student_id');
    $stmt->execute(array(':student_id' =>$studentId));
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
} 

/* this delete post from  DB........................................*/ 

function deletePost($postId){
    global $con;
    $stmt=$con->prepare('DELETE FROM posts WHERE id=:postId ');
    $stmt->execute(
        array(
           ':postId' =>$postId,
        )
    );
    echo '<script>alert("Success delete to posts")</script>';
    header('Location: viewPosts.php');

}

/* this update in DB........................................*/ 

function updatePost($postID, $updateContent) {
    global $con;
        $stmt = $con->prepare('UPDATE posts SET content = :updateContent WHERE id = :postID');
        $stmt->execute(array(':postID' => $postID,':updateContent' => $updateContent));
        echo '<script>alert("Successfully updated the post.");</script>';
        header('Location: postview.php');
}

?>