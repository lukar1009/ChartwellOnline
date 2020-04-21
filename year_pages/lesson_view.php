<?php require "./includes/year_header.php"; ?>
<?php require "./includes/year_navigation.php"; ?>

<div class="container-fluid">

<div class="row scene_element scene_element--fadeinright">
    <p class="display-3 col-12 text-center text-white">View here or read more!</p>
</div>
<div class="row mb-3 scene_element scene_element--fadeinup">
<?php 

if(isset($_GET['year']) && isset($_GET['sub'])){
    $year = $_GET['year'];
    $sub_tag = $_GET['sub'];

    $year = mysqli_real_escape_string($connection, $year);
    $sub_tag = mysqli_real_escape_string($connection, $sub_tag);
    //pretraga po tagu
    //Pretrazivanje sadrzaja po godini iz lesson tabele i subject iz subject tabele!!!
    $subject_id_query = "select id from subjects where subject_tag = '$sub_tag'";
    $select_sub_id = mysqli_query($connection, $subject_id_query);
    if(!$select_sub_id){
        die("QUERY1 failed: ".mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_sub_id);
    $sub_id = $row['id'];
    
    $lesson_query = "select * from lessons where subject_id = '$sub_id' and lesson_year = '$year'";
    $select_lesson = mysqli_query($connection, $lesson_query);
    if(!$select_lesson){
        die("QUERY2 failed: ".mysqli_error($connection));
    }

    //ovim su selektovani svi casovi za odredjenu godinu i predmet
    //dalje treba pustiti while petlju
    //koja ce pri svakom prolazu uzimati video i name lesson-a
    //kreirati novi panel div(od klase col-lg-4 col-md-6 pa na dalje se kreira sve sto je unutar toga)
    //taj novi div ostaje istih karakteristika osim sto se tekst menja, kao i img u video
    //podesiti karakteristike videa da moze da se prikaze(naziv iz baze ide u putanju do videa!!)
    //i prikazivati u panel div-u u odredjenim poljima

    while($row = mysqli_fetch_assoc($select_lesson)){
        $lesson_id = $row['id'];
        $lesson_name = $row['lesson_name'];
        $lesson_video = $row['lesson_video']


    ?>
        <div class="col-lg-4 col-md-6 text-center mb-3">
            <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
                <div class="panel-body">
                    <!-- <img style="height: 400px; width: 500px;" src="./images/english.png" alt="" class="img-responsive img-thumbnail"> -->
                    <!-- <video controls>
                        <source src="./upload/<?php //echo $row['video_name'] ?>" type="video/webm">
                        Your browser does not support this type of video.
                    </video> -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls="true" class="embed-responsive-item" src="./upload/<?php echo $lesson_video; ?>" allowfullscreen></video>
                    </div>
                    <h4><?php echo $lesson_name; ?></h4>
                    <button class="btn btn-danger"><a class="nav-link text-white" href="./lesson_detail.php?less=<?php echo $lesson_id; ?>">Read more...</a></button>
                </div>
            </div>
        </div>
    <?php
    }
}

?>
    </div><!--ROW END!!! -->

    <!-- TEST LESSONS FOR FRONT END DESIGN -->
    <!-- <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" class="img-responsive img-thumbnail" src="./images/math.jpg" alt="">
                <h4>Mathematics</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="#">Read more...</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/biology.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>Biology</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="#">Read more...</a></button>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/history.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>History</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="#">Read more...</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" class="img-responsive img-thumbnail" src="./images/geography.jpg" alt="">
                <h4>Geography</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="#">Read more...</a></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 text-center mb-3">
        <div class="panel bg-light pt-4 pb-4 pl-2 pr-2 rounded">
            <div class="panel-body">
                <img style="height: 400px; width: 500px;" src="./images/physics.jpg" alt="" class="img-responsive img-thumbnail">
                <h4>Physics</h4>
                <button class="btn btn-danger"><a class="nav-link text-white" href="#">Read more...</a></button>
            </div>
        </div>
    </div> -->

</div>
<div class="col-lg-12 pl-3 pr-3 scene_element scene_element--fadeinright">
        <hr class="bg-white">
        <p class="text-center text-white font-italic">Chartwell International School, Belgrade, Serbia</p>
</div>

<?php require "./includes/year_footer.php"; ?>