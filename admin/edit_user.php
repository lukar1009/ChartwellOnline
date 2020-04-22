<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    
<?php 

if(isset($_GET['user'])){
    $user_id = mysqli_real_escape_string($connection, $_GET['user']);
    $query = "select * from users where user_id = $user_id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED: ".mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $password = $row['user_password'];
    $firstname = $row['user_firstname'];
    $lastname = $row['user_lastname'];
    $email = $row['user_email'];
    $user_role = $row['user_role'];
    $teacher_subject_id = "";
    if($user_role == "teacher"){
        $query = "select subject from teacher_subject where user_id = $user_id";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("QUERY FAILED: ".mysqli_error($connection));
        }
    
        $row = mysqli_fetch_assoc($result);
        $teacher_subject_id = $row['subject'];
    }

}

?>


    <div id="page-wrapper" class="scene_element scene_element--fadeinup">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Edit user:</h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="edit_user_form_message" role="alert">

            </div>

            <div class="col-12 form-input">
                <form id="edit_user_form" action="javascript: editUser(<?php echo $user_id; ?>, '<?php echo $password; ?>', '<?php echo $user_role; ?>', '<?php echo $teacher_subject_id; ?>')" method="post">
                   
                    <div class="form-group">
                        <h4 class="text-info">Firstname</h4>
                        <input id="firstname" name="user_firstname" type="text" class="form-control" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="form-group">
                        <h4 class="text-info">Lastname</h4>
                        <input id="lastname" name="user_lastname" type="text" class="form-control" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="form-group">
                        <h4 class="text-info">Email</h4>
                        <input id="email" name="user_email" type="text" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <h4 class="text-info">User's Role</h4>
                        <h5 class="text-danger">If you don't select the role, it will stay the same.</h5>
                        <select name="user_role" id="user_role">
                            <option value="error">Select Role:</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>    
                        <!-- <input id="role" name="user_role" type="text" class="form-control" placeholder="Role"> -->
                    </div>
                    <div class="teacher-div form-group ml-1">
                        <h4 class="text-info">Teacher's subject</h4>
                        <h5 class="text-danger">In case the user's role is "Teacher", if you don't select the subject, it will stay the same.</h5>
                        <select name="teacher-subject" id="teacher-subject">
                            <option value="error">Select Subject:</option>
                            <?php 
                            
                            $query = "select * from subjects";
                            $select_subject_query = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_subject_query)){
                                $subject_id = $row['id'];
                                $subject_name = $row['subject_name'];
                                echo "<option value=$subject_id>$subject_name</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <h4 class="text-info">Username</h4>
                        <input id="username" name="username" type="text" class="form-control" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <h4 class="text-info">Password</h4>
                        <input id="password" name="user_password" type="password" class="form-control" value="<?php echo $password; ?>">
                    </div>
                    <button id="submit" name="submit" type="submit" class="btn btn-danger">Update user!</button>
                </form>
            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>