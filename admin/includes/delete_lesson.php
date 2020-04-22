<?php 

require "db.php";

$output = "";
if(isset($_POST['lesson_id'])){
    
    $lesson_id = mysqli_real_escape_string($connection, $_POST['lesson_id']);
    
    $query = "delete from lessons where id = '$lesson_id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ".mysqli_error($connection));
    }

    $output = "Successfully deleted lesson!";
    
}else{
    $output = "Error!";
}

die($output);


?>