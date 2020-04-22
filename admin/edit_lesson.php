<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    

    <div id="page-wrapper" class="scene_element scene_element--fadeinup">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Edit lesson here:</h1>
                    <h6>If you don't want to change anything, please go to previous page.</h4>
                </div>
                <div class="edit_lesson_form_message" role="alert">

                </div>

                <?php 
                
                if(isset($_GET['less'])){
                    $lesson_id = mysqli_real_escape_string($connection, $_GET['less']);
                    $query = "select * from lessons where id = '$lesson_id'";
                    $result = mysqli_query($connection, $query);
                    if(!$result){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($result);
                    $lesson_year = $row['lesson_year'];
                    $lesson_subject_id = $row['subject_id']; 
                    $lesson_name = $row['lesson_name'];
                    $lesson_desc = $row['lesson_desc'];
                    $lesson_video = $row['lesson_video'];
                    $lesson_file = $row['lesson_file'];
                }
                
                ?>

                <div class="col-12 form-input">
                    <form id="lesson_form" action="javascript: editLesson(<?php echo $lesson_id; ?>, <?php echo $lesson_subject_id; ?>, <?php echo $lesson_year; ?>, '<?php echo $lesson_video; ?>', '<?php echo $lesson_file; ?>')" method="post">
                    
                        <div class="form-group">
                            <input required id="lesson_name" name="lesson_name" type="text" class="form-control" value="<?php echo $lesson_name; ?>">
                        </div>
                        <div class="form-group">
                            <textarea required class="form-control" name="lesson_desc" id="lesson_desc" cols="30" rows="7"><?php echo $lesson_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <h5 class="text-danger">If you don't select the year, it will stay the same.</h5>
                            <select required name="lesson_year" id="lesson_year">
                                <option value='error'>Select Year:</option>
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
                        <div class="teacher-div form-group">
                            <h5 class="text-danger">If you don't select the subject, it will stay the same.</h5>
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
                                }

                                ?>

                            </select>
                        </div>
                        <div class="teacher-div form-group">
                            <h5 class="text-danger">If you don't want to change the video, do not choose any file.</h5>
                            <input class="" id="video" type="file" name="video"><br>
                        </div>
                        <div class="teacher-div form-group">
                            <h5 class="text-danger">If you don't want to change the attachment, do not choose any file.</h5>
                            <input class="" id="attachment" type="file" name="attachment"><br>
                        </div>
                        <button id="submit" name="submit" type="submit" class="btn btn-danger">Update lesson!</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>