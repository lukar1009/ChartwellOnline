<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
ob_start();
require "./includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Chartwell] Online Classes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js"></script>
    <script>
        function sendmail(){
                $(".form_message").removeClass("alert");
                $(".form_message").removeClass("alert-success");
                $(".form_message").removeClass("alert-danger");
                $(".form_message").addClass("alert");
                //$("#contact_form").on("click", function(e){
                //e.preventDefault();
                var fullname = $("#fullname").val();
                var email = $("#mail").val();
                var subject = $("#subject").val();
                var message = $("#mail_content").val();
                var submit = $("#mail_submit").val();
                // $("#form_message").load("./phpmail/index.php", {
                    // fullname: fullname,
                    // mail: email,
                    // subject: subject,
                    // mail_body: message,
                    // submit: submit
                // });
                $.post("./phpmail/index.php", {
                        fullname: fullname,
                        mail: email,
                        subject: subject,
                        mail_body: message,
                        submit: submit
                    }, function(data, status){
                        var response_message = data;
                        // var response_type = data.type;
                        // if(response_type == 'empty'){
                        //     //izgled diva
                        // }
                        // if(response_type == 'notSent'){
                        //     //izgled diva
                        // }
                        // if(response_type == 'sent'){
                        //     //izgled diva
                        // }
                        //podesiti jsonencode u index.php
                        if(response_message == "Mail sent!"){
                            $(".form_message").addClass("alert-success");
                            $("#fullname, #mail, #subject, #mail_content").val("");
                        }else{
                            $(".form_message").addClass("alert-danger");
                        }
                        $(".form_message").html(response_message);
                    }
                );
                //});
        }
        
    </script>

</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">