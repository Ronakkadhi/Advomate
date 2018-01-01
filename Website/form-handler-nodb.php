<?php
require 'PHPMailer/PHPMailerAutoload.php';
$name = $_POST['name'];
$email = $_POST['email'];
// $phone = $_POST['phone'];
$message = $_POST['message'];
$msg = nl2br("Thank you for choosing Advomate \r\n You have submitted following details" . "\r\n" . "Name: " . $name . "\r\n" . "Email: " . $email . "\r\n" . "\r\n" . "Message: " . $message);

//echo $to;
$to1 = '';
$pass = '';
$flag = 0;
$mail = new PHPMailer;
{
    $mail->SMTPDebug = 2;                               // Enable verbose debug output

      $mail->isSMTP();    
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
                                 // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '@gmail.com';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('@gmail.com', 'Simran');
    // $mail->addAddress('@gmail.com');     // Add a recipient
    $mail->addAddress('@gmail.com');               // Name is optional
    $mail->addReplyTo('@gmail.com');
    $mail->addCC('@gmail.com');
    $mail->addBCC('@gmail.com');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Thank you for your form submission';
    $mail->Body = $msg;

   if (!$mail->send()) {
        header("location: index.html?connection_failure=mailnotsent". $mail->ErrorInfo);
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("location: index.html");
        echo "Done with submission";
    }
}