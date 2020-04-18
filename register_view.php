<?php require "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Chartwell] Online Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" href="./css/loginstyle.css">
</head>
<body>

<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
        <div class="modal-content">
            <div class="col-12 user-img">
                <a href="https://chartwell.edu.rs/">
                    <img src="images/chartwell.png" alt="">
                </a>
            </div>
            <div class="col-12 form-input">
                <form action="./includes/register.php" method="post">
                   
                    <div class="form-group">
                        <input id="firstname" name="user_firstname" type="text" class="form-control" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <input id="lastname" name="user_lastname" type="text" class="form-control" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <input id="email" name="user_email" type="text" class="form-control" placeholder="mail@example.com">
                    </div>
                    <div class="formselect">
                        <select name="user_role" id="user_role">
                            <option value="error">Select Role:</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>    
                        <!-- <input id="role" name="user_role" type="text" class="form-control" placeholder="Role"> -->
                    </div>
                    <div class="form-group">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input id="password" name="user_password" type="text" class="form-control" placeholder="Password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-success">Register!</button>
                </form>
            </div>
            <div class="col-12 websitelink">
                <a href="home_page.php">Go back to Online Classroom.</a>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>
</body>
</html>