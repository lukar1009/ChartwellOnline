<?php 

require "db.php";

$output = "";
if(isset($_POST['comment_id'])){
    
    $comment_id = mysqli_real_escape_string($connection, $_POST['comment_id']);
    
    $query = "delete from comments where id = '$comment_id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ".mysqli_error($connection));
    }

    $output = "Successfully deleted comment!";
    
}else{
    $output = "Error!";
}

die($output);


?>