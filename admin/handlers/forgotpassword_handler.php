<?php
require_once('../db/config.php');
require_once('./function_handler.php');
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_GET["email"])){
    $email=$_GET["email"];
    $query="SELECT * FROM login WHERE admin_email='$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){
        echo 'true';
    }else{
        echo 'false';
    }
}


if(isset($_POST["submit"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $recovery_password = generateId(6);
    $mail = sendMail($recovery_password,$email);
    
    if($mail){
        $query = "INSERT INTO `forgot_password` (admin_email,recovery_password) VALUES ('$email','$recovery_password')";
        $result = mysqli_query($conn,$query);
        if($result){
            
    
          header("Location: ../recoverypassword.php?email=$email");
    
    
        }

    }
   
}

if(isset($_POST["recover_password"])){
    $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
   
    $query="SELECT * FROM forgot_password WHERE admin_email='$email' && recovery_password='$password'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        header("Location: ../changepassword.php?email=$email");
        
    }else{
        header(("Location:../recoverypassword.php?email=$email"));
    }
    
}

if(isset($_POST["changePassword"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    updatePassword($confirmPassword,$email,$conn);
}

function sendMail($recovery_password,$email){
    $senderemail="alabahmusic@gmail.com";
    $senderpassword ="vqfrqkykxfnxxqeb";
    $senderFrom = "Alabah's Music";
    $subject = "Admin at Alabah's Music";
      
    $body = file_get_contents("../emailtoadmin.html");
    $body = str_replace(
        ["(Heading)","(SubHeading)","Username","{{username}}","Password:","{{password}}","Role:","{{role}}","inline-block","{Footer Info}"],
    
        ["Password Recovery","Below is your recovery password","Recovery password",$recovery_password,"","","","","none","Enter the recovery password in the recovery page"],$body);
   
     
      $mail = new PHPMailer(true);
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $senderemail;                     //SMTP username
      $mail->Password   = $senderpassword;                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom("$senderemail", "$senderFrom");
      //Add a recipient
      $mail->addAddress($email); 
      
     //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        if($mail->send()){
            return true;
        }
}