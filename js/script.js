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

