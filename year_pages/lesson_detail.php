
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
ob_start();

?>

<?php require "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Chartwell] Online Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/yearstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/lesson_detail.js"></script>
</head>
<body>
<?php require "includes/year_navigation.php"; ?>

<?php 


if(isset($_GET['less'])){
    $lesson_id = $_GET['less'];
}

$lesson_id = mysqli_real_escape_string($connection, $lesson_id);
$query = "select * from lessons where id=$lesson_id";
$select_lesson = mysqli_query($connection, $query);
if(!$select_lesson){
    die("QUERY FAILED: ".mysqli_error($connection));
}
$row = mysqli_fetch_assoc($select_lesson);
$lesson_video = $row['lesson_video'];
$lesson_name = $row['lesson_name'];
$lesson_desc = $row['lesson_desc'];
$lesson_file = $row['lesson_file'];



?>

<div class="container-fluid">
<div class="row scene_element scene_element--fadeinright">
    <p class="display-3 col-12 text-center text-white">Start learning!</p>
</div>
<div class="row"  id="main">
    <div class="col-lg-6 text-center pl-3 pr-3 pt-3 scene_element scene_element--fadein">
        <!-- <div class="col-lg-4 col-md-6 text-center mb-3"> -->
            <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
                <div class="panel-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls="true" class="embed-responsive-item" src="./upload/<?php echo $lesson_video; ?>" allowfullscreen></video>
                    </div>
                    <h4><?php echo $lesson_name; ?></h4>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <div class="col-lg-6 pt-3 scene_element scene_element--fadeinup">
        <!-- <h1 class="text-wrap text-center text-light font-weight-light font-italic">Welcome to Chartwell ONLINE CLASSROOM</h1> -->
        <!-- <h1 class="text-light display-4 text-center font-italic">Welcome to Chartwell ONLINE CLASSROOM</h1>
        <p class="mt-4 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas obcaecati, similique voluptatum quos, ratione laudantium optio dolor eveniet suscipit provident sit. Ea reiciendis tenetur enim omnis veniam totam amet excepturi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci perspiciatis nulla assumenda, at eum ipsam sit corporis vel fugit odio hic, sint doloribus cum! Modi cum nostrum nobis commodi aut?</p> -->
        <div class="jumbotron mb-0"style="height: auto;">
            <?php 
            
            if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                echo "<h1 class='display-4'>Hello, $firstname!</h1>";                
            }else{
                echo "<h1 class='display-4'>Hello there!</h1>";
            }
            
            ?>
            <p class="lead text-justify">Welcome to lesson "<?php echo $lesson_name; ?>". Here you can see all the details about this lesson, and even leave a comment if you want. </p>
            <hr class="my-4">
            <h3>Lesson description:</h3>
            <p class="text-justify"><?php echo $lesson_desc; ?></p>
            <hr class="my-4">
            <h3>Lesson attachment:</h3>
            <p class="text-justify">Right below this sentence you can find the attachment that your teacher probably mentioned that is included in this lesson.</p>
            <a class="btn btn-danger btn-lg" href="./upload/<?php echo $lesson_file; ?>" download>Download attachment!</a>
        </div>
    </div>
    <div class="col-lg-12 pl-3 pr-3 scene_element scene_element--fadeinright">
        <hr class="bg-white">
        <p class="display-4 col-12 text-center text-white">Comments Section</p>
        <p class="text-center text-white font-italic">This is where you can leave your comment. Please notice that this comment is used only for this lesson's Q&A so DON'T USE IT FOR ANYTHING ELSE!</p>
    </div>
    <!-- comments -->
    


    <!-- create comment section -->
    <?php 
                
    // if(isset($_POST['create_comment'])){
    //     $selected_post_id = $_GET['p_id'];
    //     $comment_author = $_POST['comment_author'];
    //     $comment_email = $_POST['comment_email'];
    //     $comment_content = $_POST['comment_content'];

    //     $query = "insert into comments(comment_post_id, comment_author, comment_email, 
    //     comment_content, comment_status, comment_date) values($selected_post_id, '$comment_author', 
    //     '$comment_email', '$comment_content', 'Unapproved', now())";
    //     $create_comment_query = mysqli_query($connection, $query);
    //     confirmQuery($create_comment_query);

    //     $query = "update posts set post_comment_count = post_comment_count + 1 
    //     where post_id = $selected_post_id ";
    //     $update_comment_count = mysqli_query($connection, $query);
    //     confirmQuery($update_comment_count);
    // }
    
    ?>

    <div id="comments" class="col-lg-6 pl-3 pr-3 scene_element scene_element--fadeinright">

        <h4 class="text-white">Previous comments:</h4>
                 <!-- Comment -->
        <div class="panel p-2 mb-3 bg-light rounded">
             <div class="panel-body">
                 <h4 class="panel-heading">Firstname Lastname<?php //echo $comment_author; ?>
                     <small>1.1.1970.<?php //echo $comment_date; ?></small>
                 </h4>
                 Comment content is placed here
                 <?php //echo $comment_content; ?>
             </div>
        </div>
                 <!-- Comment -->
        <div class="panel p-2 mb-3 bg-light rounded">
             <div class="panel-body">
                 <h4 class="panel-heading">Pera Peric<?php //echo $comment_author; ?>
                     <small>21.04.2020.<?php //echo $comment_date; ?></small>
                 </h4>
                 Comment content is placed here
                 <?php //echo $comment_content; ?>
             </div>
        </div>


    </div>
    <div class="col-lg-6 pl-3 pr-3 scene_element scene_element--fadeinright">
    <!-- Comments Form -->
    <div class="well">
        <h4 class="text-white">Leave a Comment:</h4>
        <form action="" method="post" role="form">
            <div class="form-group">
                <textarea name="comment_content" class="form-control" rows="3"></textarea>
            </div>
            <button name="create_comment" type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </div>
    </div>

    <!-- Posted Comments -->

    <?php 
    
    // $query = "select * from comments where comment_post_id = $selected_post_id 
    // and comment_status = 'approved' order by comment_id desc";
    // $select_comment_query = mysqli_query($connection, $query);
    // confirmQuery($select_comment_query);
    // while($row = mysqli_fetch_assoc($select_comment_query)){
    //     $comment_date = $row['comment_date'];
    //     $comment_content = $row['comment_content'];
    //     $comment_author = $row['comment_author'];
    //     ?>

    <?php
    // }
    
    ?>






    <!-- end of comments -->
    <div class="col-lg-12 pl-3 pr-3 scene_element scene_element--fadeinright">
        <hr class="bg-white">
        <p class="text-center text-white font-italic">Chartwell International School, Belgrade, Serbia</p>
    </div>
</div>

</div>









</body>
</html>

