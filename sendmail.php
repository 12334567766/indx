<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submitContact']))
{
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];



    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); 
        $mail->SMTPAuth   = true;
                                                                    //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                                                            //Enable SMTP authentication
        $mail->Username   = 'haroonaslam991@gmail.com';                     //SMTP username
        $mail->Password   = 'esumsyisijtknvyg'; 
                                                                    //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('haroonaslam991@gmail.com', 'Muhammad Haroon Aslam');
        $mail->addAddress('haroonaslam991@gmail.com', 'Muhammad Haroon Aslam');     //Add a recipient
        


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New enquiry - Muhammad Haroon Aslam';
        $mail->Body    = '<h3>Hello, you got new enquiry</h3>
            <h4>Fullname: '.$full_name.'</h4>
            <h4>Fathername: '.$father_name.'</h4>
            <h4>Phonenumber: '.$phone_number.'</h4>
            <h4>Email: '.$email.'</h4>
            <h4>Subject: '.$subject.'</h4>
            <h4>Message: '.$message.'</h4>
        ';

        if($mail->send())
        {
            $_SESSION['status'] = "Thank you contact us - Muhammad Haroon Aslam";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
        else
        {
            $_SESSION['status'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }

        

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
    header('Location: index.php');
    exit(0);
}
?>