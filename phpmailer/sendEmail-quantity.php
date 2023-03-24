<?php
session_start();
include '../db.php';
require 'PHPMailerAutoload.php';
require 'credential.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
//echo "************************************************".EMAIL."***********".PASS;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Vinay Jain');
$mail->addAddress(ADMIN_EMAIL);     // Add a recipient
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$pin=mt_rand(10000,99999);
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Food quantity Alert';
$mail->Body    = 'This is reminder mail, that some food are going to replenish very fast. These are following foods whose remaining quantity is less than 3 : '.$_SESSION["food_name"];
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location: /foodManagementSystem/employee/homeEmployee-userRequest.php");
	// header("Location: /foodManagementSystem/employee/homeEmployee-userRequest.php");
}

