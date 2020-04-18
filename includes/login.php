<?php 
require "db.php";
ob_start();
session_start();

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if(!empty($username) && !empty($password)){
        $query = "select * from users where username = '$username'";
        $select_user_query = mysqli_query($connection, $query);
        if(!$select_user_query){
            die("QUERY FAILED " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_user_query)){
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
        }

        //dekripcija password-a iz baze
        //prima uneti password u polje, i password iz baze i dekriptuje
        $password = crypt($password, $db_user_password);

        if($username == $db_username && $password == $db_user_password){

            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            header("Location: ../home_page.php");
        }else{
            header("Location: ../index.php?wrong=1");
        }
    }else{
        //nije uneto neko od polja
        header("Location: ../index.php?empty=1");
    }
}

?>