$("#students_table").ready(function(){
    setInterval(function(){
        viewAllStudents();
        viewAllTeachers();
    }, 500);
});

$("#lessons_table").ready(function(){
    setInterval(function(){
        viewAllLessons();
    }, 500);
});

function viewAllStudents(){
    $("#students_table").load("./includes/select_students.php");
}

function viewAllTeachers(){
    $("#teachers_table").load("./includes/select_teachers.php");
}

function viewAllLessons(){
    $("#lessons_table").load("./includes/select_lessons.php");
}

function deleteUser(user_id){
    console.log(`Deleted ${user_id}`);
    $.post("./includes/delete_user.php", {
        user_id: user_id
        }, function(data, status){
            var response_message = data;
            alert(response_message);
        }
    );
}

function deleteLesson(lesson_id){
    $.post("./includes/delete_lesson.php",{
        lesson_id: lesson_id
    }, function(data, status){
        alert(data);
    });
}

$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})

function sendmail(){
    $(".form_message").removeClass("alert");
    $(".form_message").removeClass("alert-success");
    $(".form_message").removeClass("alert-danger");
    $(".form_message").addClass("alert");

    var fullname = $("#fullname").val();
    var email = $("#mail").val();
    var subject = $("#subject").val();
    var message = $("#mail_content").val();
    var submit = $("#mail_submit").val();

    $.post("./phpmail/index.php", {
            fullname: fullname,
            mail: email,
            subject: subject,
            mail_body: message,
            submit: submit
        }, function(data, status){
            var response_message = data;
            if(response_message == "Mail sent!"){
                $(".form_message").addClass("alert-success");
                $("#fullname, #mail, #subject, #mail_content").val("");
            }else{
                $(".form_message").addClass("alert-danger");
            }
            $(".form_message").html(response_message);
        }
    );
}