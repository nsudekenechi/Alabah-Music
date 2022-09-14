<?php
    require_once("../db/config.php");
    require_once("./function_handler.php");

    //Editing Genre
    if(isset($_POST["edit_genre"])){
        $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
        extract($POST);
        $query="SELECT * FROM add_genre WHERE id='$genre_id'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $genre_name=ucfirst($genre_name);
  
     
            $query="UPDATE `add_genre` SET genre='$genre_name' WHERE id='$genre_id'";
            $result = mysqli_query($conn,$query);
            if($result){
                header("Location:../addgenre.php?edit_s");
            }else{
                header("Location:../addgenre.php?edit_f");
            }

       
    }

    //Editing Beat
    if(isset($_POST["edit_beat"])){
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $FILES=filter_var_array($_FILES,FILTER_SANITIZE_STRING);
        extract($FILES);
        extract($POST);
        $query = "SELECT * FROM add_beat WHERE beat_id='$beat_id'";
        $result=mysqli_query($conn,$query);
        $beat_name=ucwords($beat_name);
        $replacedName=str_replace(" ","_",$beat_name);
        if($beat_category=="Free"){

            while($row=mysqli_fetch_assoc($result)){
                $unlink_image=$row["beat_image"];
                $unlink_audio = $row["beat_free_file"];
            }
            //Checking if a new image or audio file was entered
            if($image_file["size"] !=0 || $free_audio_file["size"]!=0){
                if($image_file["size"]!=0){
                    unlink("../Files/beat/$unlink_image");
                    $image=FileHandler("image_file",$replacedName,"beat","Img","Image");
                    $beat_image=$array["Image"];
                    $query = "UPDATE `add_beat` SET  beat_image='$beat_image' WHERE beat_id='$beat_id'";
                    $result=mysqli_query($conn,$query);
                }
    
                if($free_audio_file["size"]!=0){
                    unlink("../Files/beat/$unlink_audio");
                $audio =FileHandler("free_audio_file",$replacedName,"beat","Free","Free");
                $beat_audio=$array["Free"];
                
                $query = "UPDATE `add_beat` SET   beat_free_file='$beat_audio' WHERE beat_id='$beat_id'";
                $result=mysqli_query($conn,$query);
                }

                $query = "UPDATE `add_beat` SET  beat_name='$beat_name', beat_genre='$beat_genre', beat_category='$beat_category',beat_mood='$beat_mood' WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);
              
                result($result,"addbeat.php?edit_s","addbeat.php?edit_f");
            }else{
                  $query = "UPDATE `add_beat` SET  beat_name='$beat_name', beat_genre='$beat_genre', beat_category='$beat_category',beat_mood='$beat_mood' WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);
                result($result,"addbeat.php?edit_s","addbeat.php?edit_f");
            } 
        }else{
            
            if( $image_file["size"]!=0 || $basic_audio_file["size"]!=0 || $exclusive_audio_file!=0 || $premium_audio_file!=0){

                while($row=mysqli_fetch_assoc($result)){
                    $unlink_image=$row["beat_image"];
                    $unlink_basic = $row["beat_basic_file"];
                    $unlink_exclusive = $row["beat_exclusive_file"];
                    $unlink_premium = $row["beat_premium_file"];
                }
                if($image_file["size"]!=0){
                unlink("../Files/beat/$unlink_image");
                $image=FileHandler("image_file",$replacedName,"beat","Img","Image");
                $beat_image=$array["Image"];
                
                $query="UPDATE `add_beat` SET `beat_image`='$beat_image'WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);

                }

                if($basic_audio_file["size"]!=0){
                    unlink("../Files/beat/$unlink_basic");
                    $basicFunc = FileHandler("basic_audio_file",$replacedName,"beat","Basic","basic");
                    $basicName=$array["basic"];
                    
                $query="UPDATE `add_beat` SET beat_basic_file='$basicName'WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);
                }

                if($exclusive_audio_file["size"]!=0){
                    unlink("../Files/beat/$unlink_exclusive");
                    $exclusiveFunc = FileHandler("exclusive_audio_file",$replacedName,"audio","Exclusive","exclusive");
                    $exclusiveName=$array["exclusive"];
                    
                 $query="UPDATE `add_beat` SET beat_exclusive_file='$exclusiveName' WHERE beat_id='$beat_id'";
                 $result = mysqli_query($conn,$query);

                }

                if($premium_audio_file["size"]!=0){
                    unlink("../Files/beat/$unlink_premium");
                    $premiumFunc = FileHandler("premium_audio_file",$replacedName,"audio","Premium","premium");
                    $premiumName=$array["premium"];

                    $query="UPDATE `add_beat` SET beat_premium_file='$premiumName' WHERE beat_id='$beat_id'";
                    $result = mysqli_query($conn,$query);
                }
                $query="UPDATE `add_beat` SET `beat_name`='$beat_name',`beat_genre`='$beat_genre',`beat_category`='$beat_category',`beat_mood`='$beat_mood',`beat_basic_amount`='$basic_lease_amount',`beat_exclusive_amount`='$exclusive_lease_amount',`beat_premium_amount`='$premium_lease_amount' WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);

               
                result($result,"addbeat.php?edit_s","addbeat.php?edit_f");
            }else{
                $query="UPDATE `add_beat` SET `beat_name`='$beat_name',`beat_genre`='$beat_genre',`beat_category`='$beat_category',`beat_mood`='$beat_mood',`beat_basic_amount`='$basic_lease_amount',`beat_exclusive_amount`='$exclusive_lease_amount',`beat_premium_amount`='$premium_lease_amount' WHERE beat_id='$beat_id'";
                $result = mysqli_query($conn,$query);

               
                result($result,"addbeat.php?edit_s","addbeat.php?edit_f");
            }
        }
        
 
       

       
       
    }

    //Editing Sample
    if(isset($_POST["edit_sample"])){
        $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $FILES=filter_var_array($_FILES,FILTER_SANITIZE_STRING);
        extract($POST);
        extract($FILES);
        $query = "SELECT * FROM add_sample WHERE sample_id='$sample_id'";
        $result=mysqli_query($conn,$query);
        $sample_name=ucwords($sample_name);
        $replacedName=str_replace(" ","_",$sample_name);
        if($image_file["size"]!=0||$sample_file["size"]!=0){
            while($row=mysqli_fetch_assoc($result)){
                $unlink_image=$row["sample_image"];
                $unlink_file = $row["sample_file"];
            }
            if($image_file["size"]!=0){
                unlink("../Files/sample/$unlink_image");
                $imageHandler = FileHandler("image_file",$replacedName,"sample","image","image");
                $imageFileNewName=$array["image"];

                $query="UPDATE `add_sample` SET `sample_image`='$imageFileNewName' WHERE sample_id='$sample_id'";
                $result=mysqli_query($conn,$query);
                
            }

            if($sample_file["size"]!=0){
                unlink("../Files/sample/$unlink_sample");
                $sampleHandler = FileHandler("sample_file",$replacedName,"sample","sample","sample");
                $sampleFileNewName=$array["sample"];

                $query="UPDATE `add_sample` SET `sample_image`='$sampleFileNewName' WHERE sample_id='$sample_id'";
                $result=mysqli_query($conn,$query);
                
            }

           
        }

        if($sample_category=="Free"){
            $query="UPDATE `add_sample` SET `sample_name`='$sample_name' WHERE sample_id='$sample_id'";
            $result  = mysqli_query($conn,$query);
          
        }else{
            $query="UPDATE `add_sample` SET `sample_name`='$sample_name',`sample_amount`='$sample_amount'  WHERE sample_id='$sample_id'";
            $result  = mysqli_query($conn,$query);
        }
        result($result,"addsample.php?edit_s","addsample.php?edit_f");
    }

    //Editing Lyrics
    if(isset($_POST["edit_lyrics"])){
        $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $FILES=filter_var_array($_FILES,FILTER_SANITIZE_STRING);
        extract($POST);
        extract($FILES);
        $query = "SELECT * FROM add_lyrics WHERE lyrics_id='$lyrics_id'";
        $result=mysqli_query($conn,$query);
        $lyrics_name=ucwords($lyrics_name);
        $replacedName=str_replace(" ","_",$lyrics_name);
        if($image_file["size"]!=0||$lyrics_file["size"]!=0){
            while($row=mysqli_fetch_assoc($result)){
                $unlink_image=$row["lyrics_image"];
                $unlink_file = $row["lyrics_file"];
            }
            if($image_file["size"]!=0){
                unlink("../Files/lyrics/$unlink_image");
                $imageHandler = FileHandler("image_file",$replacedName,"lyrics","Image(Lyrics)","image");
                $imageFileNewName=$array["image"];

                $query="UPDATE `add_lyrics` SET `lyrics_image`='$imageFileNewName' WHERE lyrics_id='$lyrics_id'";
                $result=mysqli_query($conn,$query);
                
            }

            if($lyrics_file["size"]!=0){
                unlink("../Files/lyrics/$unlink_file");
                
                if($lyrics_category=="Free"){
                    
                    $lyricsHandler = FileHandler("lyrics_file",$replacedName,"lyrics","Free(Lyrics)","lyrics");
                }else{
                    $lyricsHandler = FileHandler("lyrics_file",$replacedName,"lyrics","Premium(Lyrics)","lyrics");  
                }
                $lyricsFileNewName=$array["lyrics"];

                $query="UPDATE `add_lyrics` SET `lyrics_file`='$lyricsFileNewName' WHERE lyrics_id='$lyrics_id'";
                $result=mysqli_query($conn,$query);
                
            }

           
        }

        if($lyrics_category=="Free"){
            $query="UPDATE `add_lyrics` SET `lyrics_name`='$lyrics_name',`lyrics_type`='$lyrics_type' WHERE lyrics_id='$lyrics_id'";
            $result  = mysqli_query($conn,$query);
          
        }else{
            $query="UPDATE `add_lyrics` SET `lyrics_name`='$lyrics_name',`lyrics_type`='$lyrics_type',`lyrics_basic_amount`='$lyrics_basic_amount',`lyrics_exclusive_amount`='$lyrics_exclusive_amount',`lyrics_premium_amount`='$lyrics_premium_amount'  WHERE lyrics_id='$lyrics_id' ";
            $result  = mysqli_query($conn,$query);
        }
        result($result,"addlyrics.php?edit_s","addlyrics.php?edit_f");
    }

    //Editing Song
    if(isset($_POST["edit_song"])){
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $FILES=filter_var_array($_FILES,FILTER_SANITIZE_STRING);
        extract($FILES);
        extract($POST);
        $query = "SELECT * FROM add_song WHERE song_id='$song_id'";
        $result=mysqli_query($conn,$query);
        $song_name=ucwords($song_name);
        $replacedName=str_replace(" ","_",$song_name);
        if($song_category=="Free"){

            while($row=mysqli_fetch_assoc($result)){
                $unlink_image=$row["song_image"];
                $unlink_preview = $row["song_preview"];
                $unlink_audio=$row["song_file"];
            }
            //Checking if a new image or audio file was entered
            if($image_file["size"] !=0 || $preview_file["size"]!=0 || $song_file["size"]!=0){
                if($image_file["size"]!=0){
                    unlink("../Files/song/$unlink_image");
                    $image=FileHandler("image_file",$replacedName,"song","Img","Image");
                    $song_image=$array["Image"];
                    $query = "UPDATE `add_song` SET song_image='$song_image' WHERE song_id='$song_id'";
                  
                     $result = mysqli_query($conn,$query);
                }
    
            if($preview_file["size"]!=0){
                unlink("../Files/song/$unlink_preview");
                $audio =FileHandler("preview_file",$replacedName,"song","Preview","Preview");
                $preview_file_name=$array["Preview"];
                
                $query = "UPDATE `add_song` SET  song_preview='$preview_file_name' WHERE song_id='$song_id'";
                $result = mysqli_query($conn,$query);
                
    
                }

                if($song_file["size"]!=0){
                    unlink("../Files/song/$unlink_audio");
                    $audio =FileHandler("song_file",$replacedName,"song","Free","Free");
                    $song_file_name=$array["Free"];
                    
                    $query = "UPDATE `add_song` SET  song_file='$song_file_name' WHERE song_id='$song_id'";
                    $result = mysqli_query($conn,$query);
                    
        
                }
                $query="UPDATE `add_song` SET `song_name`='$song_name',`song_genre`='$song_genre',`song_mood`='$song_mood' WHERE `song_id`='$song_id'";
                $result = mysqli_query($conn,$query);
               
                result($result,"addsong.php?edit_s","addsong.php?edit_f");
            }else{
                $query="UPDATE `add_song` SET `song_name`='$song_name',`song_genre`='$song_genre',`song_mood`='$song_mood' WHERE `song_id`='$song_id'";
                $result = mysqli_query($conn,$query);
               
                result($result,"addsong.php?edit_s","addsong.php?edit_f");
            } 
        }else{
            
          
            while($row=mysqli_fetch_assoc($result)){
                $unlink_image=$row["song_image"];
                $unlink_preview = $row["song_preview"];
                $unlink_audio=$row["song_file"];
            }
            //Checking if a new image or audio file was entered
            if($image_file["size"] !=0 || $preview_file["size"]!=0 || $song_file["size"]!=0){
                if($image_file["size"]!=0){
                    unlink("../Files/song/$unlink_image");
                    $image=FileHandler("image_file",$replacedName,"song","Img","Image");
                    $song_image=$array["Image"];
                    $query = "UPDATE `add_song` SET song_image='$song_image' WHERE song_id='$song_id'";
                  
                     $result = mysqli_query($conn,$query);
                }
    
                if($preview_file["size"]!=0){
                unlink("../Files/song/$unlink_preview");
                $audio =FileHandler("preview_file",$replacedName,"song","Preview","Preview");
                $preview_file_name=$array["Preview"];
                
                $query = "UPDATE `add_song` SET  song_preview='$preview_file_name' WHERE song_id='$song_id'";
                $result = mysqli_query($conn,$query);
                
    
                }

                if($song_file["size"]!=0){
                    unlink("../Files/song/$unlink_audio");
                    $audio =FileHandler("song_file",$replacedName,"song","Free","Free");
                    $song_file_name=$array["Free"];
                    
                    $query = "UPDATE `add_song` SET  song_file='$song_file_name' WHERE song_id='$song_id'";
                    $result = mysqli_query($conn,$query);
                    
        
                }
                $query="UPDATE `add_song` SET `song_name`='$song_name',`song_genre`='$song_genre',`song_mood`='$song_mood',`song_basic_amount`='$song_basic_amount',`song_exclusive_amount`='$song_exclusive_amount'  WHERE `song_id`='$song_id'";
                $result = mysqli_query($conn,$query);
               
                result($result,"addsong.php?edit_s","addsong.php?edit_f");
            }else{
                $query="UPDATE `add_song` SET `song_name`='$song_name',`song_genre`='$song_genre',`song_mood`='$song_mood',`song_basic_amount`='$song_basic_amount',`song_exclusive_amount`='$song_exclusive_amount'  WHERE `song_id`='$song_id'";
                $result = mysqli_query($conn,$query);
               
                result($result,"addsong.php?edit_s","addsong.php?edit_f");
            } 
        }
        
 
       

       
       
    }
?>