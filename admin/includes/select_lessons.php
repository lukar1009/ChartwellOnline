<?php 
require "db.php";

$query = "select lessons.id, subjects.subject_name, lessons.lesson_year, lessons.lesson_name, lessons.lesson_desc from lessons join subjects on lessons.subject_id = subjects.id";
$select_lessons_query = mysqli_query($connection, $query);
if(!$select_lessons_query){
    die("QUERY1 failed: ". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_lessons_query)){
    $lesson_id = $row['id'];
    $subject_name = $row['subject_name'];
    $lesson_year = $row['lesson_year'];
    $lesson_name = $row['lesson_name'];
    $lesson_desc = $row['lesson_desc'];

    echo "<tr>";
    echo    "<td>$subject_name</td>";
    echo    "<td>$lesson_year</td>";
    echo    "<td>$lesson_name</td>";
    echo    "<td>$lesson_desc</td>";
    echo    "<td><button class='btn btn-danger' onclick=''>Edit</button></td>";
    echo    "<td><button class='btn btn-danger' onclick='deleteLesson($lesson_id);'>Delete</button></td>";
    echo "</tr>";
}



?>