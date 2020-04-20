<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
ob_start();
?>
<?php require "./includes/year_header.php"; ?>
<?php require "./includes/year_navigation.php"; ?>

<?php 

if(isset($_GET['year'])){
    $year = $_GET['year'];
}

?>
<div class="container-fluid">

<div class="row scene_element scene_element--fadeinright">
    <p class="display-3 col-12 text-center text-white">Choose a subject:</p>
</div>
<div class="row mb-3 scene_element scene_element--fadeinup">
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/english.png" alt="" class="img-responsive img-thumbnail">
                <h4>English Language</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=eng">Start learning!</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" class="img-responsive img-thumbnail" src="./images/math.jpg" alt="">
                <h4>Mathematics</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=math">Start learning!</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/biology.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>Biology</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=bio">Start learning!</a></button>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/history.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>History</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=his">Start learning!</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" class="img-responsive img-thumbnail" src="./images/geography.jpg" alt="">
                <h4>Geography</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=geo">Start learning!</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/physics.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>Physics</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_view.php?year=<?php echo $year; ?>&sub=phy">Start learning!</a></button>
            </div>
        </div>
    </div>
</div>



</div>













<?php require "./includes/year_footer.php"; ?>