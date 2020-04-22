<?php 

require "db.php";

$query = "select * from users where user_role = 'student'";
$select_students_query = mysqli_query($connection, $query);
if(!$select_students_query){
    die("QUERY2 failed: ". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_students_query)){
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $username = $row['username'];
    
    echo "<tr>";
    echo    "<td>$user_firstname</td>";
    echo    "<td>$user_lastname</td>";
    echo    "<td>$user_email</td>";
    echo    "<td>$username</td>";
    echo    "<td><a class='btn btn-danger' href='./edit_user.php?user=$user_id'>Edit</a></td>";
    echo    "<td><button class='btn btn-danger' onclick='deleteUser($user_id);'>Delete</button></td>";
    echo "</tr>";
}


?>