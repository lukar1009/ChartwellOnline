
<?php
ob_start();
session_start();
?>

<?php require "includes/header.php"; ?>
<?php require "includes/navigation.php"; ?>


<div class="container-fluid">

<div class="row">
    <div class="col-lg-6 pl-3 pr-3 pt-3">
        <?php require "includes/slider.php"; ?>
    </div>
    <div class="col-lg-6 pt-3">
        <!-- <h1 class="text-wrap text-center text-light font-weight-light font-italic">Welcome to Chartwell ONLINE CLASSROOM</h1> -->
        <!-- <h1 class="text-light display-4 text-center font-italic">Welcome to Chartwell ONLINE CLASSROOM</h1>
        <p class="mt-4 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas obcaecati, similique voluptatum quos, ratione laudantium optio dolor eveniet suscipit provident sit. Ea reiciendis tenetur enim omnis veniam totam amet excepturi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci perspiciatis nulla assumenda, at eum ipsam sit corporis vel fugit odio hic, sint doloribus cum! Modi cum nostrum nobis commodi aut?</p> -->
        <div class="jumbotron mb-0"style="height: 500px;">
            <?php 
            
            if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                echo "<h1 class='display-4'>Hello, $firstname!</h1>";                
            }else{
                echo "<h1 class='display-4'>Hello there!</h1>";
            }
            
            ?>
            <p class="lead text-justify">Welcome to Chartwell Online Classroom! This is made for all of you pupils who want to take your learning to a next level!</p>
            <hr class="my-4">
            <p class="text-justify">Please follow the instructions made by your teachers, and do not attempt to do any illegal stuff.</p>
            <p class="text-justify">For any further information about Chartwell or contact, please click on the button bellow for Chartwell official website.</p>
            <a class="btn btn-danger btn-lg" href="https://chartwell.edu.rs/" role="button">Chartwell Official Website</a>
        </div>
    </div>
    <div class="col-lg-12 pl-3 pr-3">
        <hr class="bg-white">
        <p class="text-center text-white font-italic">Chartwell International School, Belgrade, Serbia</p>
    </div>
</div>

</div>













<?php require "includes/footer.php"; ?>
    

