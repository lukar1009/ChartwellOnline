<?php 
require "db.php";
if(isset($_POST['lesson_id'])){
    $lesson_id = mysqli_real_escape_string($connection, $_POST['lesson_id']);
    $query = "select * from comments where lesson_id = '$lesson_id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ". mysqli_error($connection));
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $author_name = $row['author_name'];
            $date = $row['date'];
            $comment_content = $row['comment_content'];


            echo "<div class='panel p-2 mb-3 bg-light rounded'>";
            echo  "<div class='panel-body'>";
            echo     "<h4 class='panel-heading'>$author_name";
            echo      "   <small>$date</small>";
            echo     "</h4>";
            echo     $comment_content;
            echo "</div>";
            echo "</div>";
        }
    }
}

?>