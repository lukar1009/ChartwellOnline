<?php 
require "db.php";

$query = "select comments.id, lessons.lesson_year, lessons.lesson_name, comments.author_name, comments.date, comments.comment_content from comments join lessons on comments.lesson_id = lessons.id";
$result = mysqli_query($connection, $query);
if(!$result){
    die("QUERY FAILED: ". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result)){
    $comment_id = $row['id'];
    $year = $row['lesson_year'];
    $lesson_name = $row['lesson_name'];
    $author = $row['author_name'];
    $date = $row['date'];
    $comment_content = $row['comment_content'];


    echo "<tr>";
    echo    "<td>$year</td>";
    echo    "<td>$lesson_name</td>";
    echo    "<td>$author</td>";
    echo    "<td>$date</td>";
    echo    "<td>$comment_content</td>";
    echo    "<td><button class='btn btn-danger' onclick='deleteComment($comment_id);'>Delete</button></td>";
    echo "</tr>";
}


?>