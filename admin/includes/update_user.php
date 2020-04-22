<?php 

require "db.php";
if(isset($_POST['submit'])){
    $output = "";
    $old_password = $_POST['old_password'];
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);


    $salt = '$2y$10$iusesomecrazystrings22';
    if($old_password == crypt($password, $salt)){
        //enkripcija password-a ako je doslo do promene tj ako nije isti kao stari
        $password = crypt($password, $salt);
    }else{
        $password = $old_password;
    }
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $user_role = mysqli_real_escape_string($connection, $_POST['user_role']);
    $teacher_subject_id = mysqli_real_escape_string($connection, $_POST['teacher_subject']);

    //update users
    $query = "update users set username = '$username', user_password = '$password', user_firstname = '$firstname', user_lastname = '$lastname', user_email = '$email', user_role = '$user_role' where user_id = $user_id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY1 FAILED: ".mysqli_error($connection));
    }
    $output = "Successfully updated user!";
    if($teacher_subject_id != "error"){
        $deletequery = "delete from teacher_subject where user_id = $user_id";
        $result = mysqli_query($connection, $deletequery);
        if(!$result){
            die("QUERY2 FAILED: ". mysqli_error($connection));
        }

        $insertquery = "insert into teacher_subject (user_id, subject) values ('$user_id', '$teacher_subject_id')";
        $insertresult = mysqli_query($connection, $insertquery);
        if(!$insertresult){
            die("QUERY3 FAILED: ". mysqli_error($connection));
        }
    }
    echo $output;
}


?>