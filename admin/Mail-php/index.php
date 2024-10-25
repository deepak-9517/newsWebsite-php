<?php
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include('../db_connect.php');
global $con;
$u_name=$_REQUEST['q'];    
$u_pwd=md5($_REQUEST['p']);    
$sql="select u_email from users where u_user='$u_name' and u_pwd='$u_pwd'";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
$data=mysqli_fetch_assoc($rs);
$mail=$data['u_email'];
$otp=rand(1000,9999);
send_mail($mail,$otp);
$sql1="update users set otp=$otp where u_user='$u_name' and u_pwd='$u_pwd'";
$rs=mysqli_query($con,$sql1) or die(mysqli_error($con));
header("location:../index.php?q=OTP send check your Mail...&user=$u_name&pwd=$u_pwd");
}else{
    header("location:../index.php?q=Invalid details plz try again...!"); 
}
function send_mail($email,$otp){
$mail = new PHPMailer(true);
try {
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'princefav143@gmail.com';                     //SMTP username
    $mail->Password   = 'umjbjdvptdzppvbm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('princefav143@gmail.com', 'News-Login');
    $mail->addAddress($email, 'Joe User');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Your Login OTP='.$otp;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>