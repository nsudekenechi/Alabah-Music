<?php



function generateId(int $number){
    $randId=null;
    for($i = 1; $i<=$number-2;$i++){
        $randId.=rand(0,9);
    }
    $prefix=["A","B","C","D","E","F"];

    $randId .=$prefix[rand(0,5)];
    $randId .=  $prefix[rand(0,5)];
    return $randId;
   
}

function logout(){
  
 session_start();
 session_destroy();
 if(isset($_COOKIE["username"])){
    $time=time() - 86400 * 30;
    setcookie("username","ji ",$time,"/");
 }

header("Location:../index.php");

}

function changeUsername($querytype,$newusername,$oldusername,$conn){
    
    $query = "UPDATE login set admin_$querytype='$newusername' WHERE admin_username='$oldusername'";
    $result = mysqli_query($conn,$query);
    if($result){
        logout();
    }else{
        header('../user_profile.php');
    }
}

function verifyPassword($username,$password,$conn){
  
    $query="SELECT * from login where admin_username='$username' || admin_email='$username'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $hashpassword = $row["admin_password"];
        if(password_verify($password,$hashpassword)){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

function updatePassword($confirmPassword,$email,$conn){
    $hashpassword = password_hash($confirmPassword,PASSWORD_DEFAULT);
    $query = "UPDATE `login` SET admin_password='$hashpassword' WHERE admin_email='$email'";
    $result=mysqli_query($conn,$query);
    $query2="DELETE FROM `forgot_password` WHERE admin_email='$email'";
    $result2=mysqli_query($conn,$query2);
    if($query){
        header("Location:../index.php?alert=changepass_s");
    }else{
        header("Location:../index.php?alert=changepass_f");

    }
}




function deleteHandler($id,$conn,$table,$columnId,$columnImage,$columnFile,$imageLocation,$fileLocation){
    $query1 = "SELECT * FROM `$table` WHERE $columnId='$id' ";
    $result1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)>0){

        while($row=mysqli_fetch_assoc($result1)){
           if($columnImage!=""){
            $image=$row[$columnImage];
           }
            if($columnFile!=""){
                $file=$row[$columnFile];
            }
        }
        if($columnFile!=""){
            $fileUnlink=unlink("$fileLocation/$file");
        }

        if($columnImage!=""){
            $imageUnlink=unlink("$imageLocation/$image");
        }
       
       

       
            $query="DELETE FROM `$table` WHERE $columnId='$id'";
            $result=mysqli_query($conn,$query);
            if($result){
                echo "true";
            }else{
                echo "false";
            }

       
    }
}

function  editimageHandler($imageFile,$unlinkFile,$imageDest){
    //Variables for Image File

    global $imageFileName,$imageFileNewName;//Using global so that variables can be accessed in other parts of the file
    $imageFileName = $_FILES[$imageFile]['name'];
  
    $imageTmp=$_FILES[$imageFile]['tmp_name'];
    
    $imageExtension=pathinfo($imageFileName,PATHINFO_EXTENSION);
    //Concating rand to imagefilename,so that same file can be added the same time with multiple ids
    $imageFileNewName= $imageFileName.rand(100,999).'.'.$imageExtension;
    if($unlinkFile!=""){
        $unlink=unlink($imageDest.$unlinkFile);
    }

   
        $imageUpload = move_uploaded_file($imageTmp,$imageDest.$imageFileNewName);

        if($imageUpload){
            return true;
        }else{ 
            return false;
        }
    
}

function  imageHandler($imageFile,$imageName,$dest){
    //Variables for Image File

    global $imageFileName,$imageFileNewName;//Using global so that variables can be accessed in other parts of the file
    $imageFileName = $_FILES[$imageFile]['name'];
    $extrainfo="_$dest";
    $imageTmp=$_FILES[$imageFile]['tmp_name'];
    $imageDest="../Files/$dest/";
    $imageExtension=pathinfo($imageFileName,PATHINFO_EXTENSION);
    //Concating rand to imagefilename,so that same file can be added the same time with multiple ids
   
    $imageFileNewName= $imageName.$extrainfo.'.'.$imageExtension;


   
        $imageUpload = move_uploaded_file($imageTmp,$imageDest.$imageFileNewName);

        if($imageUpload){
            return true;
        }else{ 
            return false;
        }
    
}

function  freeAudioHandler($audioFile,$audioName,$dest){
    //Variables for audio File

    global $audioFileName,$audioFileNewName;//Using global so that variables can be accessed in other parts of the file
    $audioFileName = $_FILES[$audioFile]['name'];
    $extrainfo="($dest)";
    $audioTmp=$_FILES[$audioFile]['tmp_name'];
    $audioDest="../Files/$dest/";
    $audioExtension=pathinfo($audioFileName,PATHINFO_EXTENSION);
    //Concating rand to audiofilename,so that same file can be added the same time with multiple ids
    $audioFileNewName= $audioName.$extrainfo.'.'.$audioExtension;


   
        $audioUpload = move_uploaded_file($audioTmp,$audioDest.$audioFileNewName);

        if($audioUpload){
            return true;
        }else{ 
            return false;
        }
    
}

function  FileHandler($basicFile,$basicName,$dest,$extrainfo,$premimumType){
    //Variables for basic File
  
    //Created an array so that we can use different premimum types in one function by passing it as a parameter
   
    global $prem,$array;//Using global so that variables can be accessed in other parts of the file
    $basicName=str_replace("","_",$basicName);
    $basicFileName = $_FILES[$basicFile]['name'];
    $prem=$premimumType;
    $basicTmp=$_FILES[$basicFile]['tmp_name'];
    $basicDest="../Files/$dest/";
    $basicExtension=pathinfo($basicFileName,PATHINFO_EXTENSION);
    //Concating rand to basicfilename,so that same file can be added the same time with multiple ids
    $basicFileNewName= $basicName."_$extrainfo".'.'.$basicExtension;
    $array = [$premimumType=>$basicFileNewName];


   
        $basicUpload = move_uploaded_file($basicTmp,$basicDest.$basicFileNewName);

        if($basicUpload){
            return true;
        }else{ 
            return false;
        }
    
}

function deleteHandler2($id,$conn,$table,$columnId,$imageLocation,$beatImage,$basicLease,$exclusiveLease,$premiumLease){
    $query1 = "SELECT * FROM `$table` WHERE $columnId='$id' ";
    $result1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)>0){

        while($row = mysqli_fetch_assoc($result1)){
            $basicLease=$row[$basicLease];
            $exclusiveLease=$row[$exclusiveLease];
            $premiumLease=$row[$premiumLease];
            $beatImage = $row["beat_image"];
        }

        unlink("$imageLocation/$beatImage");

        if($basicLease!=""){

            $basicLease=unlink("$imageLocation/$basicLease");
            
        }

        if($exclusiveLease!=""){

            $exclusiveLease=unlink("$imageLocation/$exclusiveLease");

        }

        if($premiumLease!=""){

            $premiumLease = unlink("$imageLocation/$premiumLease");

        }

        //Deleting From DB
        $query="DELETE FROM `$table` WHERE $columnId='$id'";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "true";
        }else{
            echo "false";
        }
       

        
    }
}

 //Function that validates if db was successful
 function result($result,$locationSuccess,$locationFailed){
    if($result){
        header("Location:../$locationSuccess");
    }else{
        header("Location:../$locationFailed");
    }
}

function deleteHandler3($id,$conn,$table,$columnId,$columnImage,$columnFile,$columnPreview,$Location){
    $query1 = "SELECT * FROM `$table` WHERE $columnId='$id' ";
    $result1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)>0){

        while($row=mysqli_fetch_assoc($result1)){
           if($columnImage!=""){
            $image=$row[$columnImage];
           }
            if($columnFile!=""){
                $file=$row[$columnFile];
            }
            if($columnFile!=""){
                $preview=$row[$columnPreview];
            }
        }
        if($columnFile!=""){
            $fileUnlink=unlink("$Location/$file");
        }

        if($columnImage!=""){
            $imageUnlink=unlink("$Location/$image");
        }

        if($columnPreview!=""){
            $previewUnlink=unlink("$Location/$preview");
        }
       
       

        if($imageUnlink || $fileUnlink || $previewUnlink){
            $query="DELETE FROM `$table` WHERE $columnId='$id'";
            $result=mysqli_query($conn,$query);
            if($result){
                echo "true";
            }else{
                echo "false";
            }

        }
    }
}

//Function that handles adding discount
function addDiscount($table,$columnId,$fileName,$conn){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $expirydate = date("d-M-Y",strtotime($expirydate));
    $query="UPDATE $table SET `discount`='$discount' ,`expiry_date`='$expirydate', `is_expired`='False' WHERE $columnId='$id'";
    $result=mysqli_query($conn,$query);
    result($result,"./$fileName.php?add_s","./$fileName.php?add_f"); 
}
//Function that handles removing discount
function removeDiscount($table,$columnId,$fileName,$conn){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    extract($POST);
    $query="UPDATE $table SET `discount`='',`expiry_date`='' WHERE $columnId='$id'";
    $result=mysqli_query($conn,$query);
    result($result,"./$fileName.php?del_s","./$fileName.php?del_f"); 
}

function AddDis($conn,$table,$columnid,$page,$getBeatDiscount,$remove){
        //Adding Beat Discount
    if(isset($_POST["$table"."_discount"])){
        addDiscount("$table","$columnid","$page",$conn); 
    }
    //Removing Beat Discount
    if(isset($_POST["$remove"."_discount"])){
        removeDiscount("$table","$columnid","$page",$conn); 
    }
    //Getting Beat Discount
    if(isset($_GET["$getBeatDiscount"])){
        $id=$_GET["$getBeatDiscount"];
        $query="SELECT * FROM $table WHERE $columnid='$id'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $discount = $row["discount"];
        $expirydate=date("d-M-Y",strtotime($row["expiry_date"]));
       
        $array=["discount"=>$discount,"expirydate"=>$expirydate];
        print_r(json_encode($array));
    }
}