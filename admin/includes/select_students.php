<?php 

require "db.php";

$query = "select * from users where user_role = 'student'";
$select_students_query = mysqli_query($connection, $query);
if(!$select_students_query){
    die("QUERY2 failed: ". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_students_query)){
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $username = $row['username'];
    
    echo "<tr>";
    echo    "<td>$user_firstname</td>";
    echo    "<td>$user_lastname</td>";
    echo    "<td>$user_email</td>";
    echo    "<td>$username</td>";
    echo    "<td><a href='#'>Edit</a></td>";
    echo    "<td><a href='#'>Delete</a></td>";
    echo "</tr>";
}


?>