$('.carousel').carousel({
    interval: 1500
});

$(document).ready(function(){
    disable();
    // $(".teacher-div").css("visibility", "hidden");
    //function that shows teacher-div if teacher role is selected
    $("#user_role").on('change', function(){
        if(this.value == "teacher"){
            // $(".teacher-div").css("visibility", "visible");
            enable();
        }else{
            // $(".teacher-div").css("visibility", "hidden");
            disable();
        }
    });
});

function enable(){
    $("#teacher-subject").prop("disabled", false);
}

function disable(){
    $("#teacher-subject").prop("disabled", true);
}

function registerUser(){
    $(".register_form_message").removeClass("alert");
    $(".register_form_message").removeClass("alert-success");
    $(".register_form_message").removeClass("alert-danger");
    $(".register_form_message").addClass("alert");

    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var user_role = $("#user_role").val();
    var teacher_subject = $("#teacher-subject").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var submit = $("#submit").val();

    $.post("./includes/register.php", {
        "user_firstname": firstname,
        "user_lastname": lastname,
        "user_email": email,
        "user_role": user_role,
        "teacher-subject": teacher_subject,
        "username": username,
        "password": password,
        "submit": submit
    }, function(data){
        if(data == "Successfully registered user!"){
            $(".register_form_message").addClass("alert-success");
            //$("#fullname, #lastname, #email, #user_role, #mail_content").val("");
        }else{
            $(".register_form_message").addClass("alert-danger");
        }
        $(".register_form_message").html(data);
    });
}

function login(){
    $(".login_form_message").removeClass("alert");
    $(".login_form_message").removeClass("alert-success");
    $(".login_form_message").removeClass("alert-danger");
    $(".login_form_message").addClass("alert");

    var username = $("#username").val();
    var password = $("#password").val();
    var submit = $("#submit").val();

    $.post("./includes/login.php", {
        "username": username,
        "password": password,
        "submit": submit
    }, function(data){
        if(data == "Wrong username or password, please try again." || data == "No field must be empty, please try again."){
            $(".login_form_message").addClass("alert-danger");
        }else{
            //$(".register_form_message").addClass("alert-success");
            //$("#fullname, #lastname, #email, #user_role, #mail_content").val("");
            window.location = './home_page.php';
        }
        $(".login_form_message").html(data);
    });
}

function addLesson(){
    $(".add_lesson_form_message").removeClass("alert");
    $(".add_lesson_message").removeClass("alert-success");
    $(".add_lesson_form_message").removeClass("alert-danger");
    $(".add_lesson_form_message").addClass("alert");

    var lesson_name = $("#lesson_name").val();
    var lesson_desc = $("#lesson_desc").val();
    var lesson_year = $("#lesson_year").val();
    var lesson_subject = $("#lesson_subject").val();
    var submit = $("#submit").val();
    if(lesson_year == "error" || lesson_subject == "error"){
        $(".add_lesson_form_message").addClass("alert-danger");
        $(".add_lesson_form_message").html("Invalid option selected!");
        return;
    }else{
        var video = $("#video")[0].files[0];
        var attachment = $("#attachment")[0].files[0];

        var video_name = video.name;
        var video_extension = video_name.split('.').pop().toLowerCase();
        if(jQuery.inArray(video_extension, ['mp3', 'mp4']) == -1){
            $(".add_lesson_form_message").addClass("alert-danger");
            $(".add_lesson_form_message").html("Invalid file extension!");
            return;    
        }
        var video_size = video.size;
        // if(video_size > 2000000){
        //     $(".add_lesson_form_message").addClass("alert-danger");
        //     $(".add_lesson_form_message").html("Video must be smaller than 20MB!");
        //     return;
        // }

        var att_name = attachment.name;
        var att_extension = att_name.split('.').pop().toLowerCase();
        if(jQuery.inArray(att_extension, ['pdf', 'zip', 'docx', 'ppt', 'xls']) == -1){
            $(".add_lesson_form_message").addClass("alert-danger");
            $(".add_lesson_form_message").html("Invalid file extension!");
            return;    
        }
        var att_size = attachment.size;
        if(att_size > 2000000){
            $(".add_lesson_form_message").addClass("alert-danger");
            $(".add_lesson_form_message").html("Attachment must be smaller than 20MB!");
            return;
        }

        var form_data = new FormData();
        form_data.append("video", video);
        form_data.append("attachment", attachment);
        form_data.append("lesson_name", lesson_name);
        form_data.append("lesson_desc", lesson_desc);
        form_data.append("lesson_year", lesson_year);
        form_data.append("lesson_subject", lesson_subject);
        form_data.append("submit", submit);
            
        $.ajax({
            url: "./includes/new_lesson.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                if(data == "Successfully added lesson!"){
                    $(".add_lesson_form_message").addClass("alert-success");
                }else{
                    $(".add_lesson_form_message").addClass("alert-danger");
                }
                $(".add_lesson_form_message").html(data);
            }
        });

        
    }

}

