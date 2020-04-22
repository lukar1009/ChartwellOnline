<?php
require "db.php";

$query = "select * from users where user_role = 'teacher'";
$select_students_query = mysqli_query($connection, $query);
if(!$select_students_query){
    die("QUERY1 failed: ". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_students_query)){
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $username = $row['username'];
    
    $inner_query = "select subject_name from subjects inner join teacher_subject on subjects.id = teacher_subject.subject where teacher_subject.user_id = $user_id";
    $subject_query = mysqli_query($connection, $inner_query);
    if(!$subject_query){
        die("QUERY3 failed: ". mysqli_error($connection));
    }
    $inner_row = mysqli_fetch_assoc($subject_query);
    $teacher_subject = $inner_row['subject_name'];

    echo "<tr>";
    echo    "<td>$user_firstname</td>";
    echo    "<td>$user_lastname</td>";
    echo    "<td>$user_email</td>";
    echo    "<td>$username</td>";
    echo    "<td>$teacher_subject</td>";
    echo    "<td><button class='btn btn-danger' onclick=''>Edit</button></td>";
    echo    "<td><buttton class='btn btn-danger' onclick='deleteUser($user_id);'>Delete</button></td>";
    echo "</tr>";
}

?>