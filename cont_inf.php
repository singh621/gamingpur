<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';
$mail = new PHPMailer;

$output = "";

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $channel_name = $_POST['channel_name'];
  $channel_link = $_POST['channel_link'];
  $message = $_POST['message'];

  $mail->isSMTP();
  $mail->Host = 'host.hostclub99.net';
  $mail->SMTPAuth = true;
  $mail->Username = 'contact@gamingpur.in';
  $mail->Password = 'Neha@12345#';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('contact@gamingpur.in', 'gamingpur');
  $mail->addAddress('business@gamingpur.com');

  $mail->isHTML(true);

  $mail->Subject = 'Influencer Contact Form Submission';
  $mail->Body    = 'Name : ' . $name . '<br>Phone : ' . $phone . '<br>Email : ' . $email . '<br>Channel Name : ' . $channel_name . '<br>Channel Link : ' . $channel_link . '<br>Has written you : ' . $message;

  if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    header('location:thank.html');
  }
}
