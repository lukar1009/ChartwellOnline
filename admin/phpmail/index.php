<?php 

//parametri za php mejler
require "phpmailer/PHPMailerAutoload.php";
$mejl = new PHPMailer();
$mejl->isSMTP();
$mejl->SMTPDebug = 0;
$mejl->isHTML(true);
//$mail->Sendmail = '/usr/sbin/sendmail';


if(isset($_POST['submit'])){
    
    $fullname = $_POST['fullname'];
    $user_mail = $_POST['mail'];
    $subject = $_POST['subject'];
    $mail_body = $_POST['mail_body'];
    
    //response output
    $output = "";

    //validators
    $errorEmpty = false;
    $errorSend = false;
    $mailSent = false;

    if(empty($fullname) || empty($user_mail) || empty($subject) || empty($mail_body)){
        
        //header("Location: ../contact_support.php?empty=1");
        //echo "<span>No field must be empty, please try again.</span>";
        // $output = json_encode(array( //create JSON data
        //     'type'=>'empty', 
        //     'text' => 'No field must be empty, please try again.'
        // ));
        $output = "No field must be empty, please try again.";
        $errorEmpty = true;
    }else{

        //parametri za gmail nalog
        $mejl->Host = 'smtp.gmail.com';
        $mejl->Port = 587;
        $mejl->SMTPAuth = true;
        $mejl->SMTPSecure = 'tls';
        $mejl->Username = "lukaradovanovic1311@gmail.com";
        $mejl->Password = "wt3gj55s";


        //parametri za slanje mejla
        //1.ko salje
        $mejl->setFrom($user_mail, $fullname);
        //2.kome stize odgovor
        $mejl->addReplyTo($user_mail, $fullname);
        //3.gde saljemo, tj korisnikova mejl adresa i ime
        $mejl->addAddress('lukaradovanovic1311@gmail.com');

        //kreiramo telo mejla
        $mejl->Subject = $subject;
        $mejl->Body = $mail_body; //ovde mogu ici i html tagovi

        //slanje mejla
        if(!$mejl->send()){
            //echo "Mejl nije poslat" . $mejl->ErrorInfo;
            //header("Location: ../contact_support.php?error=1");
            //echo "<span>Server down, please call support.</span>";
            // $output = json_encode(array( //create JSON data
            //     'type'=>'notSent', 
            //     'text' => 'Server down, please call support.'
            // ));
            $output = "Server down, please call support.";
            $errorSend = true;
        }else{
            //echo "Mejl je poslat";
            //header("Location: ../contact_support.php?success=1");
            // echo "<span>Mail sent!</span>";
            // $output = json_encode(array( //create JSON data
            //     'type'=>'sent', 
            //     'text' => 'Mail sent!'
            // ));
            $output = "Mail sent!";
            $mailSent = true;
        }

    }
    //echo $output;
    die($output);
}



?>