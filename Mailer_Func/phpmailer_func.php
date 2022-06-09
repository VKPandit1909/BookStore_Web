<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
 
 
require_once 'vendor/autoload.php';
 
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
 
//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
 
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';
 
$email = 'vickybff746@gmail.com'; // the email used to register google app
$clientId = '285588024451-amlcp7nk09gcgtu00u6naj02n1944rts.apps.googleusercontent.com';
$clientSecret = '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';
$refreshToken = '1//04mCYPYs4vWvkCgYIARAAGAQSNwF-L9IrgKm44z7F4DuU1YECJlDi_yScIybom9AlqhQpdTOEUQwxvNGr0bjEetNdFChQZYN4xiM';
 
//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);
 
//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);
 
$mail->setFrom('vickybff756@gmail.com', 'Vicky Kumar');
$mail->addAddress('vkpandit1909@gmail.com', 'Vikram Pandit');
$mail->isHTML(true);
$mail->Subject = 'Email Subject';
$mail->Body = '<b>Email Body</b>';
 
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>