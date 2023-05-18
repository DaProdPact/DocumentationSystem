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
$mail->Subject=$otp." is your Rttcl Documentation System account recovery code";
//set sender email
$mail->setFrom('rtcclguiguintotesda@gmail.com');
//email body
$mail->Body="We received a request to reset your account password. Enter the following code : ".$otp." ";
//add recipient

$email_add=$_POST['email'];

$query = "SELECT * FROM trainer_account WHERE trainer_email_address = '$email_add' ";
$emailsql = mysqli_query($connection,$query);
$mail->addAddress($email_add);

if(mysqli_num_rows($emailsql) > 0){
    $updateotp = "UPDATE trainer_account SET trainer_verification = '$otp' WHERE trainer_email_address = '$email_add' ";
    $passcode = mysqli_query($connection,$updateotp);

    if($mail->Send()){
        //echo "Email sent...!";
        echo $otp;
    }else{
        //echo "Error...!";
        echo 0;
    }
    //closing smtp connection
    $mail->smtpClose();

}
else{
    echo 4;
}


//send email



?>