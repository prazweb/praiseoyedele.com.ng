<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$EmailTo = "opra.temmy@gmail.com";
$Title = "New Message Received from ".$name;

// prepare email body text
$Fields .= "Name: ";
$Fields .= $name;
$Fields .= "\n <br/>";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n <br/>";

$Fields.= "Subject: ";
$Fields .= $subject;
$Fields .= "\n <br/>";

$Fields .= "Message: ";
$Fields .= $message;
$Fields .= "\n";


$mail = new PHPMailer; //$mail->SMTPDebug = 3;      // Enable verbose debug output
$mail->isSMTP();     // Set mailer to use SMTP
$mail->Host = 'mail.praiseoyedele.com.ng;servername.truehost.cloud';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;   // Enable SMTP authentication
$mail->Username = 'admin@praiseoyedele.com.ng';     // SMTP username
$mail->Password = 'Tijesunimi437!';              // SMTP password
$mail->SMTPSecure = 'tls';        // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;      // TCP port to connect to or 25 for non secure
$mail->setFrom('admin@praiseoyedele.com.ng', 'praiseoyedele.com.ng');
$mail->addAddress('opra.temmy@gmail.com', 'Praise Oyedele');     // Add a recipient
$mail->addReplyTo('admin@praiseoyedele.com.ng', 'Praise Oyedele');
$mail->addCC('admin@praiseoyedele.com.ng');
$mail->addBCC('admin@praiseoyedele.com.ng');
$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);            // Set email format to HTML
$mail->Subject = $Title;
$mail->Body    = $Fields;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {    echo 'Message could not be sent.';    echo 'Mailer Error: ' .
$mail->ErrorInfo;} else {    echo 'Message has been sent';}


// send email
$success = mail($EmailTo,  $Title,  $Fields, "From:".$email);


