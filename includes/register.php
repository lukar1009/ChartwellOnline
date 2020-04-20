<?php 
require "db.php";

if(isset($_POST['submit'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_password = $_POST['password'];
    $teacher_subject_id = $_POST['teacher-subject'];

    //response variable
    $output = "";

    //echo "<h1> TEST $teacher_subject_id</h1>";
    if(!empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_role) && $user_role !== "error" && !empty($username) && !empty($user_password)){
        if($user_role == "teacher" && $teacher_subject_id === "error"){
            //$message = "Fields must not be empty!";
            // header("Location: ../register_view.php?empty=1");
            $output = "Wrong input data, please try again.";            
        }else{

            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_role = mysqli_real_escape_string($connection, $user_role);
            $username = mysqli_real_escape_string($connection, $username);
            $user_password = mysqli_real_escape_string($connection, $user_password);
            
            $salt = '$2y$10$iusesomecrazystrings22';
            
            //enkripcija password-a
            $user_password = crypt($user_password, $salt);
            

            if($user_role == "teacher"){
                //first insert new teacher in users table
                $user_query = "insert into users (user_firstname, user_lastname, username, user_email, user_password, user_role) values ('$user_firstname', '$user_lastname', '$username', '$user_email', '$user_password', '$user_role')";
                $register_user_query = mysqli_query($connection, $user_query);
                if(!$register_user_query){
                    die("QUERY1 FAILED " .mysqli_error($connection));
                }
                
                //select id of that user
                //search by email because there is still no validation for username being unique
                $query = "select * from users where user_email = '$user_email'";
                $select_user_query = mysqli_query($connection, $query);
                if(!$select_user_query){
                    die("QUERY2 FAILED " .mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($select_user_query);
                $selected_user_id = $row['user_id'];

                //insert new teacher-subject relation in user_teaches_subject table
                $teacher_query = "insert into teacher_subject (user_id, subject) values ('$selected_user_id', '$teacher_subject_id')";
                $teacher_subject_query = mysqli_query($connection, $teacher_query);
                if(!$teacher_subject_query){
                    die("QUERY3 FAILED " .mysqli_error($connection));
                }
                
            }else{
                $query = "insert into users (user_firstname, user_lastname, username, user_email, user_password, user_role) values ('$user_firstname', '$user_lastname', '$username', '$user_email', '$user_password', '$user_role')";
                $register_user_query = mysqli_query($connection, $query);
                if(!$register_user_query){
                    die("QUERY FAILED " .mysqli_error($connection));
                }
            }
            
            //$message = "Your registration is submitted!";
            // header("Location: ../register_view.php?success=1");
            $output = "Successfully registered user!";
        }
    }else{
        //$message = "Fields must not be empty!";
        // header("Location: ../register_view.php?empty=1");
        $output = "Wrong input data, please try again.";
    }
}else{
    //da se ne javlja greska kada se ne klikne dugme submit!
    //$message = "";
    // header("Location: ../register_view.php?empty=1");
    $output = "Wrong input data, please try again.";
}
die($output);

?>