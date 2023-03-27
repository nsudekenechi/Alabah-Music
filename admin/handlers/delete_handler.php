<?php
require_once("../db/config.php");
require_once("./function_handler.php");
if(isset($_GET["deletegenre"])){
    $id=$_GET["deletegenre"];
    deleteHandler($id,$conn,"add_genre","id","","","","");
    
}

if(isset($_GET["deletebeat"])){
    
   $id = $_GET["deletebeat"];
   $query="SELECT * FROM add_beat WHERE beat_id='$id'";
   $result = mysqli_query($conn,$query);

   while($row=mysqli_fetch_assoc($result)){
       $category = $row["beat_category"];
   }
   if($category=="Free"){
    deleteHandler($id,$conn,"add_beat","beat_id","beat_image","beat_free_file","../Files/beat","../Files/beat");
    

   }else{
       deleteHandler2($id,$conn,"add_beat","beat_id","../Files/beat","beat_image","beat_basic_file","beat_exclusive_file","beat_premium_file");
       
   }
   

}


if(isset($_GET["delete_viewbeat"])){
    $delete = "DELETE FROM view_sold";
    $result=mysqli_query($conn,$delete);

    if($result){
        echo "true";
    }
}

if(isset($_GET["delete_admin"])){
    $id=$_GET["delete_admin"];
    $query = "DELETE FROM `login` WHERE admin_id='$id'";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "true";
    }
}

if(isset($_GET["delete_sample"])){
    $id=$_GET["delete_sample"];
    deleteHandler($id,$conn,"add_sample","sample_id","sample_image","sample_file","../Files/sample","../Files/sample");
    
}
if(isset($_GET["delete_lyrics_type"])){
    $id=$_GET["delete_lyrics_type"];
    deleteHandler($id,$conn,"add_lyrics_type","id","","","","");
}
if(isset($_GET["delete_lyrics"])){
    $id=$_GET["delete_lyrics"];
    deleteHandler($id,$conn,"add_lyrics","lyrics_id","lyrics_image","lyrics_file","../Files/lyrics","../Files/lyrics");
    
}

if(isset($_GET["deletesong"])){
    $id=$_GET["deletesong"];
  deleteHandler3($id,$conn,"add_song","song_id","song_image","song_file","song_preview","../Files/songs");

}

if(isset($_GET["deletecoupon"])){
    $id=$_GET["deletecoupon"];
    deleteHandler($id,$conn,"add_coupon","id","","","","");
}
