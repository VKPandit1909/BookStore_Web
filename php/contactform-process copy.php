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
    $email = $_POST["email"];
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

// $EmailTo = "vickybff746@gmail.com";
// $Subject = "New message from Book Store by The Debug Arena";

// // prepare email body text
// $Body = "";
// $Body .= "Name: ";
// $Body .= $name;
// $Body .= "\n";
// $Body .= "Email: ";
// $Body .= $email;
// $Body .= "\n";
// $Body .= "Message: ";
// $Body .= $message;
// $Body .= "\n";
// $Body .= "Terms: ";
// $Body .= $terms;
// $Body .= "\n";

// // send email
// $success = mail($EmailTo, $Subject, $Body, "From:".$email);

// // redirect to success page
// if ($success && $errorMSG == ""){
//    echo "success";
// }else{
//     if($errorMSG == ""){
//         echo "Something went wrong :(";
//     } else {
//         echo $errorMSG;
//     }
// }

use PHPMailer\PHPMailer\PHPMailer;



   




    // echo $course;


    require_once "PHPMailer/PHPMailer.php";
    
    
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "adarsh438tcsckandivali@gmail.com";
    $mail->Password = 'tcsc438tcsc';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom("phasor.co.in");
    $mail->addAddress("adarshthakur210@gmail.com");
    $mail->Subject = ("Form Submittion");
    $mail->Body ="Name: $name <br> Email:$email <br> mobile:$message";

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        // $response = "Something is wrong: <br>" . $mail->ErrorInfo;
        $response="We are unable to get your request. Please mail us!!";
    }

    exit(json_encode(array( $response)));


?>
