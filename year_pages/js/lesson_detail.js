$(document).ready(function(){
    var url_string = window.location.href; // www.test.com?filename=test
    var url = new URL(url_string);
    var paramValue = url.searchParams.get("less");

    setInterval(function(){
        $("#comments").load("./includes/load_comments.php",{
            lesson_id: paramValue
        });
    }, 500);


});

function insertContent(){
    var url_string = window.location.href; // www.test.com?filename=test
    var url = new URL(url_string);
    var paramValue = url.searchParams.get("less");

    $(".comment_form_message").removeClass("alert");
    $(".comment_message").removeClass("alert-success");
    $(".comment_form_message").removeClass("alert-danger");
    $(".comment_form_message").addClass("alert");

    var comment_content = $("#comment_content").val();
    if(comment_content == ""){
        $(".comment_form_message").addClass("alert-danger");
        $(".comment_form_message").html("Please type in your comment to submit!");
        return;
    }
    var form_data = new FormData();
    form_data.append("comment_content", comment_content);
    form_data.append("lesson_id", paramValue);
    form_data.append("submit", submit);
    $.ajax({
        url: "./includes/add_comment.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            if(data == "Comment added, thank you! Your teacher will respond ASAP."){
                $(".comment_form_message").addClass("alert-success");
            }else{
                $(".comment_form_message").addClass("alert-danger");
            }
            $(".comment_form_message").html(data);
        }
    });
}