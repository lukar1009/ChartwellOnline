<?php 
require "db.php";
session_start();
if(isset($_POST["submit"])){

    $lesson_name = $_POST['lesson_name'];
    $lesson_desc = $_POST['lesson_desc'];
    $lesson_year = $_POST['lesson_year'];
    $lesson_subject = $_POST['lesson_subject'];

    $lesson_name = mysqli_real_escape_string($connection, $lesson_name);
    $lesson_desc = mysqli_real_escape_string($connection, $lesson_desc);
    $lesson_year = mysqli_real_escape_string($connection, $lesson_year);
    $lesson_subject = mysqli_real_escape_string($connection, $lesson_subject);
    
    //output variable
    $output = "";

    //upload video
    $video_name = $_FILES["video"]["name"];
    $videohelper = explode(".", $video_name);
    $extension = end($videohelper);
    $name = $_SESSION['username'] . "-" . $video_name . "." . $extension;
    $location = "../year_pages/upload/" . $name;
    move_uploaded_file($_FILES["video"]["tmp_name"], $location);

    //upload attachment
    $att_name = $_FILES["attachment"]["name"];
    $helper = explode(".", $att_name);

    $att_extension = end($helper);
    $new_att_name = $_SESSION['username'] . "-" . $att_name . "." . $att_extension;
    $att_location = "../year_pages/upload/" . $new_att_name;
    move_uploaded_file($_FILES["attachment"]["tmp_name"], $att_location);

    //database entry
    $query = "insert into lessons values (NULL, '$lesson_subject', '$lesson_year', '$lesson_name', '$lesson_desc', '$name', '$new_att_name')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERYnew_lesson FAILED: " . mysqli_error($connection));
    }

    $output = "Successfully added lesson!";
    echo $output;

}

?>