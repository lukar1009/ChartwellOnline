<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    

    <div id="page-wrapper" class="scene_element scene_element--fadeinup">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Need Help? Contact Support!</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="modal-dialog text-center ">
                <div class="col-sm-9 main-section">
                        <h1>E-mail: lukaradovanovic1311@gmail.com</h1>
                        <h1>Phone: +381 63 7531 200</h1>
                        <h1>Location: Belgrade, Serbia</h1>
                    <div class="modal-content scene_element scene_element--fadein">
                        <?php 

                        if(isset($_GET['success'])){
                            ?>

                            <div class="alert alert-success" role="alert">
                                Mail sent!
                            </div>

                            <?php
                        }

                        if(isset($_GET['error'])){
                            ?>

                            <div class="alert alert-danger" role="alert">
                                Server down, please call support on the number above.
                            </div>

                            <?php
                        }

                        if(isset($_GET['empty'])){
                            ?>

                            <div class="alert alert-danger" role="alert">
                                No field must be empty, please try again.
                            </div>

                            <?php
                        }
                        
                        ?>

                        <div class="col-12 form-input">
                            <form action="./phpmail/index.php" method="post">
                                <div class="form-group">
                                    <input id="fullname" name="fullname" type="text" class="form-control" placeholder="Enter Your Name:">
                                </div>
                                <div class="form-group">
                                    <input id="mail" name="mail" type="text" class="form-control" placeholder="Enter Your E-Mail:">
                                </div>
                                <div class="form-group">
                                    <input id="subject" name="subject" type="text" class="form-control" placeholder="Enter Subject:">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="mail_content" id="mail_content" cols="30" rows="10" placeholder="Enter your message:"></textarea>
                                </div>
                                <button name="submit" type="submit" class="btn btn-success">Contact me!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>