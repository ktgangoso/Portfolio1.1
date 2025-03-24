<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "kevin.gangoso@gmail.com";
    $mail->Password = "lxkh thkk rbjy zuky";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom("portfolio@gmail.com", "Portfolio");
    $mail->addAddress("kevin.gangoso@gmail.com", "Kevin");

    $mail->Subject = "New Contact form submition";
    $mail->Body = "Name: $name\n " .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message: $message\n";
    if ($mail->send()) {
      echo "Message sent Successfully";
    } else {
      echo "Message Could not be sent, : " . $mail->ErrorInfo;
    }
  } catch (Exception $e) {
    echo "Message Could not be sent, : " . $mail->ErrorInfo;
  }
}
