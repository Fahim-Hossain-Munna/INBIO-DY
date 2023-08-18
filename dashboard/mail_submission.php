<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../src/PHPMailer.php";
require "../src/SMTP.php";
require "../src/Exception.php";

$mail = new PHPMailer(true);



include("../config/configdb.php");
session_start();

if(isset($_POST['contact_send_btn'])){
    $name = $_POST['contact_name'];
    $contact = $_POST['contact_phone'];
    $email_to = $_POST['contact_email'];
    $email_subject = $_POST['contact_subject'];
    $email_message_me = $_POST['contact_message'];
    $email_message_user = "Hello $name sir, I am grateful for your support.";

    if($name && $contact && $email_to && $email_subject && $email_message_me){
        
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'fahim.hossain69.bd@gmail.com';                     //SMTP username
            $mail->Password   = 'oeoxegexpdrgklmv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('admin@dev.com', 'Fahim Hossain Munna');
            $mail->addAddress("$email_to", "$name");     //Add a recipient
            $mail->addReplyTo('fahim.hossain69.bd@gmail.com');
        
            //Attachments
            $mail->addAttachment('../uploads/user-check.svg');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Thank You For Contact";
            $mail->Body    = "$email_message_user";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            
        if($mail->send()){
            $date = date("d-m-Y");
        $insert_massage = "INSERT INTO mails (name,email,contact,subject,message,date) VALUES ('$name','$email_to','$contact','$email_subject','$email_message_me','$date')";
        mysqli_query($db_connect,$insert_massage);
        $_SESSION['mail_success'] = "mail is received by admin";
        $_SESSION['client_name'] = $name;
        }
        header("location: ../index.php#contacts");
    }else{
        $_SESSION['mail_error'] = "sorry! something is wrong message can't sent";
        header("location: ../index.php#contacts");
    }
}


?>