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