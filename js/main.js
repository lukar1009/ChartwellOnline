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

