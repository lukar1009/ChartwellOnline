<?php 
require "db.php";

if(isset($_POST['submit'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    if(!empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_role) && $user_role !== "error" && !empty($username) && !empty($user_password)){
        $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
        $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_role = mysqli_real_escape_string($connection, $user_role);
        $username = mysqli_real_escape_string($connection, $username);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $salt = '$2y$10$iusesomecrazystrings22';

        //enkripcija password-a
        $user_password = crypt($user_password, $salt);

        $query = "insert into users (user_firstname, user_lastname, username, user_email, user_password, user_role) values ('$user_firstname', '$user_lastname', '$username', '$user_email', '$user_password', '$user_role')";
        $register_user_query = mysqli_query($connection, $query);
        if(!$register_user_query){
            die("QUERY FAILED " .mysqli_error($connection));
        }
        //$message = "Your registration is submitted!";
        header("Location: ../register_view.php?success=1");
    }else{
        //$message = "Fields must not be empty!";
        header("Location: ../register_view.php?empty=1");
    }
}else{
    //da se ne javlja greska kada se ne klikne dugme submit!
    //$message = "";
    header("Location: ../register_view.php?empty=1");
}


?>