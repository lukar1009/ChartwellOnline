<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
require "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Chartwell] Online Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" href="./css/newlesson.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    <script src="./js/script.js"></script>
</head>
<body>

<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
        <div class="modal-content scene_element scene_element--fadein">
            <div class="col-12 user-img">
                <a href="https://chartwell.edu.rs/">
                    <img src="images/chartwell.png" alt="">
                </a>
            </div>
            <?php 
            
            if(isset($_GET['success'])){
                ?>

                <div class="alert alert-success" role="alert">
                    Successfully registered user!
                </div>

                <?php
            }
            if(isset($_GET['empty'])){
                ?>

                <div class="alert alert-danger" role="alert">
                    Wrong input data, please try again.
                </div>

                <?php
            }
            
            ?>

            <div class="add_lesson_form_message" role="alert">

            </div>

            <div class="col-12 form-input">
                <form id="lesson_form" action="javascript: addLesson()" method="post">
                   
                    <div class="form-group">
                        <input required id="lesson_name" name="lesson_name" type="text" class="form-control" placeholder="Lesson Title">
                    </div>
                    <div class="form-group">
                        <textarea required class="form-control" name="lesson_desc" id="lesson_desc" cols="30" rows="7" placeholder="Lesson Description"></textarea>
                    </div>
                    <div class="formselect">
                        <select required name="lesson_year" id="lesson_year">
                            <option value='error'>Select Subject:</option>
                            <option value='7'>Year 7</option>";
                            <option value='8'>Year 8</option>
                            <option value='9'>Year 9</option>
                            <option value='10'>Year 10</option>
                            <option value='11'>Year 11</option>
                            <option value='12'>Year 12</option>
                            <option value='13'>Year 13</option>
                        </select>    
                        <!-- <input id="role" name="user_role" type="text" class="form-control" placeholder="Role"> -->
                    </div>
                    <div class="teacher-div formselect">
                        <select required name="lesson_subject" id="lesson_subject">
                            <?php 
                            
                            if($_SESSION['user_role'] === "admin"){
                                echo "<option value='error'>Select Subject:</option>";
                                $query = "select * from subjects";
                                $select_subject_query = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($select_subject_query)){
                                    $subject_id = $row['id'];
                                    $subject_name = $row['subject_name'];
                                    echo "<option value=$subject_id>$subject_name</option>";
                                }
                            }else{
                                $teacher_id = $_SESSION['user_id'];
                                $query = "select * from subjects join teacher_subject on subjects.id = teacher_subject.subject where user_id = $teacher_id";
                                $select_subject_for_teacher_query = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($select_subject_for_teacher_query);
                                $subject_id = $row['id'];
                                $subject_name = $row['subject_name'];
                                echo "<option value=$subject_id>$subject_name</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="teacher-div formselect">
                        <input required class="" id="video" type="file" name="video"><br>
                    </div>
                    <div class="teacher-div formselect">
                        <input required class="" id="attachment" type="file" name="attachment"><br>
                    </div>
                    <button id="submit" name="submit" type="submit" class="btn btn-success">Submit!</button>
                </form>
            </div>
            <div class="col-12 websitelink">
                <a href="home_page.php">Go back to Online Classroom.</a>
            </div>
            <?php 
            
            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === "admin"){
                ?>
            <div class="col-12 websitelink">
                <a href="./admin/index.php">Go back to Admin Panel.</a>
            </div>
                <?php
            }
            
            ?>
        </div>
    </div>
</div>


</body>
</html>