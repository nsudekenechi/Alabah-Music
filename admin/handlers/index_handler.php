<?php
require_once('../db/config.php');
require_once('./function_handler.php');
if(isset($_GET["username"])){
    $username = $_GET["username"];
    $query="SELECT * from login where admin_username='$username' || admin_email='$username'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo 'true';
    }else{
        echo 'false';
    }
}

if(isset($_GET["password"])){
   $username=$_GET["username"];
   $password=$_GET["password"];
   verifyPassword($username,$password,$conn);
  
}
if(isset($_POST["log_in"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);

    
    if(isset($checkbox)){
        $time = time() + 86400 * 30;
        setcookie("username",$username,$time,"/");
    }else{
        session_start();
        $_SESSION["username"]=$username;
    }

    header("Location:../dashboard.php?alert=login_s");
    }