<?php 
require "db.php";
session_start();


if(isset($_POST['submit'])){
    $lesson_id = $_POST['lesson_id'];
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

    $lesson_video = "";
    $lesson_att = "";

    if(isset($_FILES['new_video'])){
        //upload video
        $video_name = $_FILES["new_video"]["name"];
        $videohelper = explode(".", $video_name);
        $extension = end($videohelper);
        $name = $_SESSION['username'] . "-" . $video_name . "." . $extension;
        $location = "../../year_pages/upload/" . $name;
        move_uploaded_file($_FILES["new_video"]["tmp_name"], $location);
        $lesson_video = $name;
    }
    
    if(isset($_POST['video_exists'])){
        $lesson_video = $_POST['video_exists'];
    }

    if(isset($_FILES['new_attachment'])){
        //upload attachment
        $att_name = $_FILES["new_attachment"]["name"];
        $helper = explode(".", $att_name);

        $att_extension = end($helper);
        $new_att_name = $_SESSION['username'] . "-" . $att_name . "." . $att_extension;
        $att_location = "../../year_pages/upload/" . $new_att_name;
        move_uploaded_file($_FILES["new_attachment"]["tmp_name"], $att_location);
        $lesson_att = $new_att_name;
    }
    
    if(isset($_POST['attachment_exists'])){
        $lesson_att = $_POST['attachment_exists'];
    }

    //database entry
    $query = "update lessons set subject_id = '$lesson_subject', lesson_year = '$lesson_year', lesson_name = '$lesson_name', lesson_desc = '$lesson_desc', lesson_video = '$lesson_video', lesson_file = '$lesson_att' where id='$lesson_id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY in update_lesson.php file FAILED: " . mysqli_error($connection));
    }

    $output = "Successfully updated lesson!";
    echo $output;
}

?>