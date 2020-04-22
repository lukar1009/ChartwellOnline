<?php 
require "db.php";

$output = "";
if(isset($_POST['user_id'])){
    
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    
    $query = "delete from users where user_id = '$user_id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ".mysqli_error($connection));
    }

    $output = "Successfully deleted user!";
    
}else{
    $output = "Error!";
}

die($output);


?>