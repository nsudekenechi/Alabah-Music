<?php
require_once("../db/config.php");
require_once("./function_handler.php");
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["add_genre"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $genre_name=ucfirst($genre_name);
   
       $query = "INSERT INTO `add_genre`( `genre`) VALUES ('$genre_name')";
       $result = mysqli_query($conn,$query);
       if($result){
           header("Location:../addgenre.php?add_s");
       }else{
           header("Location:../addgenre.php?add_f");
       }
   
}

//Adding Lyrics Type
if(isset($_POST["add_lyrics_type"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $lyrics_type=ucwords($lyrics_type);
    $replacedName=str_replace(" ","_",$lyrics_type);
  
 
  
       $query = "INSERT INTO `add_lyrics_type`( `lyrics_type`) VALUES ('$lyrics_type')";
       $result = mysqli_query($conn,$query);
       if($result){
           header("Location:../addmood.php?add_s");
       }else{
           header("Location:../addmood.php?add_f");
       }
   
}


//Adding Beat
if(isset($_POST["add_beat"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $beat_name=ucwords($beat_name);
    $replacedName=str_replace(" ","_",$beat_name).rand(0,100);
    $beat_id=generateId(5);
    $image=FileHandler("image_file",$replacedName,"beat","Image","Image");
    $imageFileNewName=$array["Image"];
    if($beat_category=="Free"){
        $audio =FileHandler("free_audio_file",$replacedName,"beat","Free","Free");
       
        $audioFileNewName=$array["Free"];
        
        $query = "INSERT INTO `add_beat`( `beat_id`, `beat_name`, `beat_genre`, `beat_category`,`beat_mood`,  `beat_image`, `beat_free_file`,`purchase_status`) VALUES ('$beat_id','$beat_name','$beat_genre','$beat_category','$beat_mood','$imageFileNewName','$audioFileNewName','$purchase_status')";


        $result=mysqli_query($conn,$query); 
        
        if($result){
            header("Location:../addbeat.php?add_s");
        }else{
            header("Location:../addbeat.php?add_f");
        }
    }else{
        $basicFunc = FileHandler("basic_audio_file",$replacedName,"beat","Basic","basic");
        if($prem=="basic"){
            $basicName=$array["basic"];
        }
        $exclusiveFunc = FileHandler("exclusive_audio_file",$replacedName,"beat","Exclusive","exclusive");
        if($prem=="exclusive"){
            $exclusiveName=$array["exclusive"];
        }
       
        $premimumFunc = FileHandler("premium_audio_file",$replacedName,"beat","Premium","premium");

        if($prem=="premium"){
            $premiumName=$array["premium"];
        }

    
       $query="INSERT INTO `add_beat`( `beat_id`, `beat_name`, `beat_genre`, `beat_category`,`beat_mood`, `beat_image`, `beat_basic_amount`, `beat_exclusive_amount`, `beat_premium_amount`, `beat_basic_file`, `beat_exclusive_file`, `beat_premium_file`, `purchase_status`) VALUES ('$beat_id','$beat_name','$beat_genre','$beat_category','$beat_mood','$imageFileNewName','$basic_lease_amount','$exclusive_lease_amount','$premium_lease_amount','$basicName','$exclusiveName','$premiumName','$purchase_status')";


       $result = mysqli_query($conn,$query);
    
       if($result){
        header("Location:../addbeat.php?add_s");
    }else{
        header("Location:../addbeat.php?add_f");
    }

        

    }
}


 //Adding Sample
 if(isset($_POST["add_sample"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $sample_id = generateId(5);
    $replacedName=str_replace(" ","_",$sample_name).rand(0,100);
   
    $image =FileHandler("image_file",$replacedName,"sample","Image" ,"Image");
    $imageNewName=$array["Image"];

    if($sample_category=="Free"){

        $sample =FileHandler("sample_file",$replacedName,"sample","Free" ,"Free");
        $sampleNewName=$array["Free"];
        $query = "INSERT INTO `add_sample`( `sample_id`, `sample_name`, `sample_category`, `sample_image`, `sample_file`) VALUES ('$sample_id','$sample_name','$sample_category','$imageNewName','$sampleNewName')";
        $result=mysqli_query($conn,$query);

    }else{

        $sample =FileHandler("sample_file",$replacedName,"sample","Premium","Premium");
        $sampleNewName=$array["Premium"];
        $query = "INSERT INTO `add_sample`( `sample_id`, `sample_name`, `sample_category`, `sample_image`, `sample_file`, `sample_amount`) VALUES ('$sample_id','$sample_name','$sample_category','$imageNewName','$sampleNewName','$sample_amount')";
        $result=mysqli_query($conn,$query);
    }

    if($result){
        header("Location:../addsample.php?add_s");
    }else{
        header("Location:../addsample.php?add_f");
    }
 }

 //Adding Lyrics
 if(isset($_POST["add_lyrics"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $lyrics_id = generateId(5);
    $lyrics_name=ucwords($lyrics_name);
    $replacedName=str_replace(" ","_",$lyrics_name).rand(0,100);
   
    $image =FileHandler("image_file",$replacedName,"lyrics","Image" ,"Image");
    $imageNewName=$array["Image"];

    if($lyrics_category=="Free"){

        $lyrics =FileHandler("lyrics_file",$replacedName,"lyrics","Free" ,"Free");
        $lyricsNewName=$array["Free"];
        $query = "INSERT INTO `add_lyrics`( `lyrics_id`, `lyrics_name`, `lyrics_category`, `lyrics_type`,`lyrics_image`, `lyrics_file`,`purchase_status` ) VALUES ('$lyrics_id','$lyrics_name','$lyrics_category','$lyrics_type','$imageNewName','$lyricsNewName','Free')";
        

    }else{

        $lyrics =FileHandler("lyrics_file",$replacedName,"lyrics","Premium(Lyrics)","Premium");
        $lyricsNewName=$array["Premium"];
        $query = "INSERT INTO `add_lyrics`( `lyrics_id`, `lyrics_name`, `lyrics_category`,  `lyrics_type`,`lyrics_image`, `lyrics_file`, `lyrics_basic_amount`,`lyrics_exclusive_amount`,`lyrics_premium_amount`,`purchase_status`) VALUES ('$lyrics_id','$lyrics_name','$lyrics_category','$lyrics_type','$imageNewName','$lyricsNewName','$lyrics_basic_amount','$lyrics_exclusive_amount','$lyrics_premium_amount','Not Sold')";
        
    }
    $result=mysqli_query($conn,$query);
    if($result){
        header("Location:../addlyrics.php?add_s");
    }else{
        header("Location:../addlyrics.php?add_f");
    }
 }

 //Adding Song
if(isset($_POST["add_song"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $song_name=ucwords($song_name);
    $replacedName=str_replace(" ","_",$song_name).rand(0,100);
    $song_id=generateId(5);
    $image=FileHandler("image_file",$replacedName,"song","Image","Image");
    $imageFileName=$array["Image"];
   
    $preview =FileHandler("preview_file",$replacedName,"song","Preview","Preview");
    $previewFileName=$array["Preview"];
    if($song_category=="Free"){
        
        $song =FileHandler("song_file",$replacedName,"song","Free","Free");
        $songFileName=$array["Free"];

        $query = "INSERT INTO `add_song`( `song_id`, `song_name`, `song_genre`, `song_category`, `song_mood`,`song_image`, `song_file`,`song_preview`, `purchase_status`) VALUES ('$song_id','$song_name','$song_genre','$song_category','$song_mood','$imageFileName','$songFileName','$previewFileName','$purchase_status')";


       
        
        
    }else{

        $song = FileHandler("song_file",$replacedName,"song","Premium","Premium");
        $songFileName=$array["Premium"];

        $query = "INSERT INTO `add_song`( `song_id`, `song_name`, `song_genre`, `song_category`, `song_mood`,`song_image`, `song_file`,`song_preview`,`song_basic_amount`,`song_exclusive_amount`, `song_premium_amount`,`purchase_status`) VALUES ('$song_id','$song_name','$song_genre','$song_category','$song_mood','$imageFileName','$songFileName','$previewFileName','$song_basic_amount','$song_exclusive_amount','$song_premium_amount','$purchase_status')";

    }

    $result=mysqli_query($conn,$query); 
    if($result){
        header("Location:../addsong.php?add_s");
    }else{
        header("Location:../addsong.php?add_f");
    }

     
}

//Adding Addmin
if(isset($_POST["add_admin"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $password = generateId(8);
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);
    $adminId=generateId(6);
    $adminUsername = "Admin".rand(0,1000);
    
   
    

        $mail = sendMail($admin_email,$admin_role,$adminUsername,$password);
        if($mail){
            
            $query = "INSERT INTO `login`(`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_role`, `admin_type`) VALUES ('$adminId','$adminUsername','$admin_email','$hashpassword','$admin_role','$admin_type')";
            $result=mysqli_query($conn,$query);
            if($result){
                header("Location:../addadmin.php?add_s");
            }
        }else{
            echo "Sending Mail Failed, Try again";
        }

        
   
}


//Generate Coupon Code
if(isset($_GET["generate_id"])){
    $generate_id = generateId(6);
    echo $generate_id; 
}

//Adding Coupon
if(isset($_POST["add_coupon"])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $expired = "False";
    extract($POST);
    $coupon_expiry = date("d-M-Y",strtotime($coupon_expiry));
    $query="INSERT INTO `add_coupon`(`coupon_code`,`coupon_discount`,`is_expired`,`count`,`Maximum`,`date`) VALUES('$coupon_code','$coupon_discount','$expired',0,'$maximum','$coupon_expiry') ";
    $result=mysqli_query($conn,$query);

    if($result){
        header("Location:../addcoupon.php?add_s");
    }else{
        header("Location:../addcoupon.php?add_f");
    }
}


//Function that adds beat discount
AddDis($conn,"add_beat","beat_id","addbeat","getbeatdiscount","remove_beat");
//Function that adds sample discount
AddDis($conn,"add_sample","sample_id","addsample","getsamplediscount","remove_sample");

//Function that adds lyrics discount
AddDis($conn,"add_lyrics","lyrics_id","addlyrics","getlyricsdiscount","remove_lyrics");
//Function that adds songs discount
AddDis($conn,"add_song","song_id","addsong","getsongdiscount","remove_song");

function sendMail($email,$admin_role,$adminUsername,$password){
    $senderemail="alabahmusic@gmail.com";
    $senderpassword ="vqfrqkykxfnxxqeb";
    $senderFrom = "Alabah's Music";
    $subject = "Admin at Alabah's Music";
      
    $body = file_get_contents("../emailtoadmin.html");
    $body = str_replace(["(Heading)","(SubHeading)","{{username}}","{{password}}","{{role}}","{Footer Info}"],["You were chosen as an admin at alabah's music","Here is your login details",$adminUsername,$password,$admin_role,"Your can change the username and password later,please keep your password secretly"],$body);
   
     
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
?>