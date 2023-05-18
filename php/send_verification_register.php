<?php
require('./database.php');
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$char="1234567890";
$otp=substr(str_shuffle($char),0,6);

//create instance of phpmailer
$mail=new PHPMailer();
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host='smtp.gmail.com';
//enable smtp authentication
$mail->SMTPAuth="true";
//set type of encryption(ssl/tls)
$mail->SMTPSecure="tls";
//set port to connect smtp
$mail->Port="587";
//set gmail username
$mail->Username="rtcclguiguintotesda@gmail.com";
//set password
$mail->Password="luionciwzonzgnmp";
//set email subject
$mail->Subject=$otp." is your Registration Verification Code for the Rttcl Documentation System";
//set sender email
$mail->setFrom('rtcclguiguintotesda@gmail.com');
//email body
$mail->Body="We received a request that you register in the RTCCL documentation system. Please enter the following code: ".$otp." ";
//add recipient

$email_add=$_POST['email_register'];


$mail->addAddress($email_add);



    if($mail->Send()){
        //echo "Email sent...!";
        echo $otp;
    }else{
        //echo "Error...!";
        echo 0;
    }
    //closing smtp connection
    $mail->smtpClose();



//send email



?>