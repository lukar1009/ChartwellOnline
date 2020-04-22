$("#edit_user_form").ready(function(){
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

$("#comments_table").ready(function(){
    setInterval(function(){
        viewAllComments();
    }, 500);
});


function enable(){
    $("#teacher-subject").prop("disabled", false);
}

function disable(){
    $("#teacher-subject").prop("disabled", true);
}


function viewAllStudents(){
    $("#students_table").load("./includes/select_students.php");
}

function viewAllTeachers(){
    $("#teachers_table").load("./includes/select_teachers.php");
}

function viewAllLessons(){
    $("#lessons_table").load("./includes/select_lessons.php");
}

function viewAllComments(){
    $("#comments_table").load("./includes/select_comments.php");
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

function deleteComment(comment_id){
    $.post("./includes/delete_comment.php", {
        comment_id: comment_id
    }, function(data, status){
        alert(data);
    })
}

function editProfile(user_id, password){
    $(".edit_user_form_message").removeClass("alert");
    $(".edit_user_form_message").removeClass("alert-success");
    $(".edit_user_form_message").removeClass("alert-danger");
    $(".edit_user_form_message").addClass("alert");

    var new_username = $("#username").val();
    var new_password = $("#password").val();
    var new_firstname = $("#firstname").val();
    var new_lastname = $("#lastname").val();
    var new_email = $("#email").val();
    var submit = $("#submit").val();

    var form_data = new FormData();
    form_data.append("user_id", user_id);
    form_data.append("username", new_username);
    form_data.append("old_password", password);
    form_data.append("password", new_password);
    form_data.append("firstname", new_firstname);
    form_data.append("lastname", new_lastname);
    form_data.append("email", new_email);
    form_data.append("submit", submit);

    $.ajax({
        url: "./includes/update_profile.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            if(data == "Successfully updated profile!"){
                $(".edit_user_form_message").addClass("alert-success");
            }else{
                $(".edit_user_form_message").addClass("alert-danger");
            }
            $(".edit_user_form_message").html(data);
        }
    });
}

function editUser(user_id, password, user_role, teacher_subject_id){
    $(".edit_user_form_message").removeClass("alert");
    $(".edit_user_form_message").removeClass("alert-success");
    $(".edit_user_form_message").removeClass("alert-danger");
    $(".edit_user_form_message").addClass("alert");
    var new_username = $("#username").val();
    var new_password = $("#password").val();
    var new_firstname = $("#firstname").val();
    var new_lastname = $("#lastname").val();
    var new_email = $("#email").val();
    var new_user_role = $("#user_role").val();
    if(new_user_role == "error"){
        new_user_role = user_role;
    }
    var new_teacher_subject = $("#teacher-subject").val();
    if(new_user_role == "teacher" && new_teacher_subject == "error"){
        new_teacher_subject = teacher_subject_id;
    }
    var submit = $("#submit").val();

    var form_data = new FormData();
    form_data.append("user_id", user_id);
    form_data.append("username", new_username);
    form_data.append("old_password", password);
    form_data.append("password", new_password);
    form_data.append("firstname", new_firstname);
    form_data.append("lastname", new_lastname);
    form_data.append("email", new_email);
    form_data.append("user_role", new_user_role);
    form_data.append("teacher_subject", new_teacher_subject);
    form_data.append("submit", submit);
    
    $.ajax({
        url: "./includes/update_user.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            if(data == "Successfully updated user!"){
                $(".edit_user_form_message").addClass("alert-success");
            }else{
                $(".edit_user_form_message").addClass("alert-danger");
            }
            $(".edit_user_form_message").html(data);
        }
    });

}

function editLesson(lesson_id, lesson_subject_id, lesson_year, lesson_video, lesson_file){
    $(".edit_lesson_form_message").removeClass("alert");
    $(".edit_lesson_form_message").removeClass("alert-success");
    $(".edit_lesson_form_message").removeClass("alert-danger");
    $(".edit_lesson_form_message").addClass("alert");

    var new_name = $("#lesson_name").val();
    var new_desc = $("#lesson_desc").val();
    var new_year = $("#lesson_year").val();
    if(new_year == "error"){
        new_year = lesson_year;
    }
    var new_subject = $("#lesson_subject").val();
    if(new_subject == "error"){
        new_subject = lesson_subject_id;
    }
    var submit = $("#submit").val();


    var form_data = new FormData();



    var video = $("#video")[0].files[0];
    var attachment = $("#attachment")[0].files[0];

    if(typeof video != "undefined"){
        var video_name = video.name;
        var video_extension = video_name.split('.').pop().toLowerCase();
        if(jQuery.inArray(video_extension, ['mp3', 'mp4']) == -1){
            $(".add_lesson_form_message").addClass("alert-danger");
            $(".add_lesson_form_message").html("Invalid file extension!");
            return;    
        }
        var video_size = video.size;
        if(video_size > 20000000){
            $(".add_lesson_form_message").addClass("alert-danger");
            $(".add_lesson_form_message").html("Video must be smaller than 20MB!");
            return;
        }
        form_data.append("new_video", video);
    }

    if(typeof attachment != "undefined"){
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
        form_data.append("new_attachment", attachment);
    }

    if(typeof video === "undefined"){
        form_data.append("video_exists", lesson_video);
    }
    if(typeof attachment === "undefined"){
        form_data.append("attachment_exists", lesson_file);
    }

    form_data.append("lesson_id", lesson_id);
    form_data.append("lesson_name", new_name);
    form_data.append("lesson_desc", new_desc);
    form_data.append("lesson_year", new_year);
    form_data.append("lesson_subject", new_subject);
    form_data.append("submit", submit);
    
    // for (var key of form_data.keys()) {
    //     console.log(key); 
    // }

    // for (var value of form_data.values()) {
    //     console.log(value); 
    // }
    $.ajax({
        url: "./includes/update_lesson.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            if(data == "Successfully updated lesson!"){
                $(".edit_lesson_form_message").addClass("alert-success");
            }else{
                $(".edit_lesson_form_message").addClass("alert-danger");
            }
            $(".edit_lesson_form_message").html(data);
        }
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