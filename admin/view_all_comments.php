<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    

    <div id="page-wrapper" class="scene_element scene_element--fadeinright">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Comments Panel</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row " id="main">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Year</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Comment Content</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="comments_table">
                    <!-- comments go here -->
                </tbody>
            </table>
        </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>