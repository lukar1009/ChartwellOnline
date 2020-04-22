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
                <form id="edit_user_form" action="javascript: editProfile(<?php echo $user_id; ?>, '<?php echo $password; ?>')" method="post">
                   
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