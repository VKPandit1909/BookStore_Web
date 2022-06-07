

<?php
// use PHPMailer\PHPMailer\PHPMailer;
// require_once('Configmain.php');

// if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // $course=$_POST['mySelect'];
    echo $name, $email $message;

   



// $sql="INSERT INTO `enquire`(`user name`, `phone.no`, `email`, `subject`) VALUES ('$name','$mobile','$email','$course')";

// $query=mysqli_query($con,$sql);

//     // echo $course;


//     require_once "PHPMailer/PHPMailer.php";
    
//     require_once "PHPMailer/SMTP.php";
//     require_once "PHPMailer/Exception.php";

//     $mail = new PHPMailer();

//     //smtp settings
//     $mail->isSMTP();
//     $mail->Host = "smtp.gmail.com";
//     $mail->SMTPAuth = true;
//     $mail->Username = "adarsh438tcsckandivali@gmail.com";
//     $mail->Password = 'tcsc438tcsc';
//     $mail->Port = 465;
//     $mail->SMTPSecure = "tsl";

//     //email settings
//     $mail->isHTML(true);
//     $mail->setFrom("phasor.co.in");
//     $mail->addAddress("adarshthakur210@gmail.com");
//     $mail->Subject = ("Form Submittion");
//     $mail->Body ="Name: $name <br> Email:$email <br> mobile:$mobile <br> course: $course";

//     if($mail->send()){
//         $status = "success";
//         $response = "Email is sent!";
//     }
//     else
//     {
//         $status = "failed";
//         $response = "Something is wrong: <br>" . $mail->ErrorInfo;
//     }

//     exit(json_encode(array("status" => $status, "response" => $response)));
// }


// 
?>