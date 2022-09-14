<?php
    require_once('./function_handler.php');
    require_once('../db/config.php');


    if(isset($_POST["changeUsername"])){
       $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
       extract($POST);
       changeUsername("username",$newUsername,$oldUsername,$conn); 
    }

    if(isset($_POST["changeEmail"])){
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        extract($POST);
        changeUsername("email",$email,$oldUsername,$conn); 
     }

     if(isset($_GET["oldPassword"])){
        $GET=filter_var_array($_GET,FILTER_SANITIZE_STRING);
        extract($GET);
        verifyPassword($username,$oldPassword,$conn);
     }

     if(isset($_POST["changePassword"])){
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        extract($POST);
        updatePassword($newPassword,$email,$conn);
     }

?>