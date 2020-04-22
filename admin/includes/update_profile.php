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
        $password = $old_password;
    }else{
        $password = crypt($password, $salt);
    }
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    //update users
    $query = "update users set username = '$username', user_password = '$password', user_firstname = '$firstname', user_lastname = '$lastname', user_email = '$email' where user_id = $user_id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY1 FAILED: ".mysqli_error($connection));
    }
    $output = "Successfully updated profile!";
    echo $output;
}


?>