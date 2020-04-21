<?php require "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Chartwell] Online Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" href="./css/login_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="./js/script.js"></script>
</head>
<body>

<div class="modal-dialog text-center ">
    <div class="col-sm-9 main-section">
        <div class="modal-content scene_element scene_element--fadein">
            <div class="col-12 user-img">
                <a href="https://chartwell.edu.rs/">
                    <img src="images/chartwell.png" alt="">
                </a>
            </div>
            <?php 
            
            if(isset($_GET['wrong'])){
                ?>

                <div class="alert alert-danger" role="alert">
                    Wrong username or password, please try again.
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
            <!-- <div class="login_form_message" role="alert">

            </div> -->

            <div class="col-12 form-input">
                <form id="login_form" action="includes/login.php" method="post">
                    <div class="form-group">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Enter Username:">
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password:">
                    </div>
                    <button name="submit" type="submit" class="btn btn-success">Login!</button>
                </form>
            </div>
            <div class="col-12 websitelink">
                <a href="https://chartwell.edu.rs/">Go back to Chartwell Website.</a>
            </div>
        </div>
    </div>
</div>




</body>
</html>