<?php require "./includes/header.php"; ?>

<?php require "./includes/navigation.php"; ?>

<div id="page-wrapper" class="scene_element scene_element--fadeinright">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Students list</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row " id="main">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="students_table">
                    <?php 
                    
                    // $query = "select * from users where user_role = 'student'";
                    // $select_students_query = mysqli_query($connection, $query);
                    // if(!$select_students_query){
                    //     die("QUERY2 failed: ". mysqli_error($connection));
                    // }
                    // while($row = mysqli_fetch_assoc($select_students_query)){
                    //     $user_firstname = $row['user_firstname'];
                    //     $user_lastname = $row['user_lastname'];
                    //     $user_email = $row['user_email'];
                    //     $username = $row['username'];
                        
                    //     echo "<tr>";
                    //     echo    "<td>$user_firstname</td>";
                    //     echo    "<td>$user_lastname</td>";
                    //     echo    "<td>$user_email</td>";
                    //     echo    "<td>$username</td>";
                    //     echo    "<td><a href='#'>Edit</a></td>";
                    //     echo    "<td><a href='#'>Delete</a></td>";
                    //     echo "</tr>";
                    // }
                    
                    ?>

                </tbody>
            </table>
        </div>
        <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Teachers List</h1>
            </div>
        </div>
        <div class="row" id="main">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="teachers_table">
                <?php 
                    
                    // $query = "select * from users where user_role = 'teacher'";
                    // $select_students_query = mysqli_query($connection, $query);
                    // if(!$select_students_query){
                    //     die("QUERY1 failed: ". mysqli_error($connection));
                    // }
                    // while($row = mysqli_fetch_assoc($select_students_query)){
                    //     $user_id = $row['user_id'];
                    //     $user_firstname = $row['user_firstname'];
                    //     $user_lastname = $row['user_lastname'];
                    //     $user_email = $row['user_email'];
                    //     $username = $row['username'];
                        
                    //     $inner_query = "select subject_name from subjects inner join teacher_subject on subjects.id = teacher_subject.subject where teacher_subject.user_id = $user_id";
                    //     $subject_query = mysqli_query($connection, $inner_query);
                    //     if(!$subject_query){
                    //         die("QUERY3 failed: ". mysqli_error($connection));
                    //     }
                    //     $inner_row = mysqli_fetch_assoc($subject_query);
                    //     $teacher_subject = $inner_row['subject_name'];

                    //     echo "<tr>";
                    //     echo    "<td>$user_firstname</td>";
                    //     echo    "<td>$user_lastname</td>";
                    //     echo    "<td>$user_email</td>";
                    //     echo    "<td>$username</td>";
                    //     echo    "<td>$teacher_subject</td>";
                    //     echo    "<td><a href='#'>Edit</a></td>";
                    //     echo    "<td><a href='#'>Delete</a></td>";
                    //     echo "</tr>";
                    // }
                    
                    ?>
                </tbody>
            </table>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>