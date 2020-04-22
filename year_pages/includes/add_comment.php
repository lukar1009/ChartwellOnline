<?php 
session_start();
require "db.php";
if(isset($_POST['submit'])){
    $comment_content = mysqli_real_escape_string($connection, $_POST['comment_content']);
    $lesson_id = mysqli_real_escape_string($connection, $_POST['lesson_id']);
    $author_name = $_SESSION['firstname']." ".$_SESSION['lastname'];

    $query = "insert into comments values (NULL, '$lesson_id', '$author_name', now(), '$comment_content')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ".mysqli_error($connection));
    }
    echo "Comment added, thank you! Your teacher will respond ASAP.";
}



?>