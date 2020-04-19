<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    

    <div id="page-wrapper" class="scene_element scene_element--fadeinup">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Lessons Panel</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row " id="main">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Lesson Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "select * from lessons";
                    $select_lessons_query = mysqli_query($connection, $query);
                    if(!$select_lessons_query){
                        die("QUERY1 failed: ". mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($select_lessons_query)){
                        $lesson_id = $row['id'];
                        $lesson_name = $row['lesson_name'];
                        $lesson_desc = $row['lesson_desc'];
                        
                        $inner_query = "select * from subjects where id = $lesson_id";
                        $select_subject = mysqli_query($connection, $inner_query);
                        if(!$select_subject){
                            die("QUERY2 failed: ". mysqli_error($connection));
                        }
                        $inner_row = mysqli_fetch_assoc($select_subject);
                        $subject_name = $inner_row['subject_name'];

                        echo "<tr>";
                        echo    "<td>$subject_name</td>";
                        echo    "<td>$lesson_name</td>";
                        echo    "<td>$lesson_desc</td>";
                        echo    "<td><a href='#'>Edit</a></td>";
                        echo    "<td><a href='#'>Delete</a></td>";
                        echo "</tr>";
                    }
                    
                    ?>

                </tbody>
            </table>
        </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>