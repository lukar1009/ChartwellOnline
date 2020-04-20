<?php require "./includes/header.php"; ?>


<?php require "./includes/navigation.php"; ?>
    

    <div id="page-wrapper" class="scene_element scene_element--fadein">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row p-4">
                <div class="jumbotron">
                    <h1 class="display-4 p-4">Need help? Contact me!</h1>
                    <p class="lead p-4">If you need any source of support, you can send me an e-mail through a form below.</p>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                    <!-- NON-AJAX GETTING RESPONSE -->
                    <!-- <?php 

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
                            Server down, please call support on the support.
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
                    
                    ?> -->

                    <!-- DIV FOR AJAX RESPONSE -->
                    <div class="form_message" role="alert">
            
                    </div>

                    <div class="col-lg-6 p-5 form-input scene_element scene_element--fadein">
                        <form id="contact_form" action="javascript: sendmail();" method="post">
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
                                <textarea class="form-control" name="mail_content" id="mail_content" cols="30" rows="7" placeholder="Enter your message:"></textarea>
                            </div>
                            <button id="mail_submit" name="submit" type="submit" class="btn btn-danger">Contact me!</button>
                        </form>
                    </div>
                    <div class="col-lg-6 form-input scene_element scene_element--fadeinright">
                        <div class="jumbotron text-center">
                            <h3 class="display-4">Contact info:</h3>
                            <h4>Having trouble or not feeling secure with this form? See my contact info!</h4>
                            <hr>
                            <h5><i>E-mail: lukaradovanovic1311@gmail.com</i></h5>
                            <h5><i>Phone: +381 63 75 31 200</i></h5>
                            <h5><i>Belgrade, Serbia</i></h5>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



<?php require "./includes/footer.php"; ?>