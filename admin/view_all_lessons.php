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
                    <th scope="col">Year</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Lesson Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "select subjects.subject_name, lessons.lesson_year, lessons.lesson_name, lessons.lesson_desc from lessons join subjects on lessons.subject_id = subjects.id";
                    $select_lessons_query = mysqli_query($connection, $query);
                    if(!$select_lessons_query){
                        die("QUERY1 failed: ". mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($select_lessons_query)){
                        $subject_name = $row['subject_name'];
                        $lesson_year = $row['lesson_year'];
                        $lesson_name = $row['lesson_name'];
                        $lesson_desc = $row['lesson_desc'];

                        echo "<tr>";
                        echo    "<td>$subject_name</td>";
                        echo    "<td>$lesson_year</td>";
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