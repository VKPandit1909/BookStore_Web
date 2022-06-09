<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email_from = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Message is required ";
} else {
    $message = $_POST["message"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["terms"];
}


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
 
$mail->setFrom('thedebugarena@gmail.com', 'Vicky Kumar');
$mail->addAddress('vkpandit1909@gmail.com', 'Vikram Pandit');
$mail->addAddress('adarshthakur210@gmail.com', 'Adarsh Thakur');
$mail->isHTML(true);
$mail->Subject = "New Message from $name";
$mail->Body ="Name: $name <br> Email: $email_from <br> Message: $message";
 
//send the message, check for errors
if ($mail->send()) {
    $status = "success";
    $response = "Email is sent! We'll get back to you soon.";
} else {
    $status = "failed";
    // $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    $response="We are unable to get your request. Please mail us!!";
}
exit(json_encode(array( $response)));


?>
