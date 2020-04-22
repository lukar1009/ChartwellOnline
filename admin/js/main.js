$(document).ready(function(){
    setInterval(function(){
        viewAllStudents();
        viewAllTeachers();
    }, 500);
});

function viewAllStudents(){
    $("#students_table").load("./includes/select_students.php");
}

function viewAllTeachers(){
    $("#teachers_table").load("./includes/select_teachers.php");
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