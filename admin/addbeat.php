<?php
$title="Add Beat";

require_once("./includes/header.php");
if($adminRole!="Producer"){
    header("Location:./dashboard.php");
}
?>
<link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
         <!--  BEGIN CONTENT AREA  -->
         <div id="content" class="main-content">
            <?php
                if(isset($_GET["edit_beat"])){
                    $beatid=$_GET["edit_beat"];
                    $query="SELECT * FROM add_beat WHERE beat_id='$beatid'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $beatId=$row["beat_id"];
                    $beatName=$row["beat_name"];
                    $beatCategory=$row["beat_category"];
                    $beatMood=$row["beat_mood"];
                    $basicAmount=$row["beat_basic_amount"];
                    $exclusiveAmount=$row["beat_exclusive_amount"];
                    $premiumAmount=$row["beat_premium_amount"];
                    ?>
                    <form action="./handlers/edit_handler.php" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?=$beatId;?>" hidden name="" class="purchase-status">
                        <input type="text" value="<?=$beatId;?>" hidden name="beat_id" >
                        <div class="px-3 py-5">
                            <h5>Add a beat</h5>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h6>Beat name</h6>
                                    <input type="text" name="beat_name"  class="form-control" placeholder="Enter Name..." id="" value="<?=$beatName;?>">
                                
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4 my-md-0">
                                <h6>Beat Genre</h6>
                                <select name="beat_genre" id="" class="form-control px-3">
                                    <?php
                                        $query="SELECT * FROM add_genre";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $genre=$row["genre"];
                                                ?>
                                                <option class="px-3"><?=$genre;?></option>  
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-0 my-md-4">
                                <h6>Beat Mood</h6>
                                <select name="beat_mood" required id="" class="form-control px-3">
                                <option class="px-3" value="<?=$beatMood;?>"><?=$beatMood;?></option>
                                    <?php
                                        $query="SELECT * FROM add_lyrics_type WHERE lyrics_type!='$beatMood'";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $lyrics_type=$row["lyrics_type"];
                                                ?>
                                                <option class="px-3" value="<?=$lyrics_type;?>"><?=$lyrics_type;?></option>  
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Beat Category</h6>
                                <select name="beat_category" id="" class="form-control px-3 select">
                                        <?php
                                            if($beatCategory=="Free"){
                                                ?>
                                                <option value="Free">Free</option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="Premium">Premimum</option>

                                                <?php
                                            }
                                        ?>
                                        
                                
                                </select>
                            </div>
                            
                            
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <h6>Beat Image</h6>
                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                           
                                           <input type="file" name="image_file" class=""  accept=".jpeg,.jpg,.png,.gif">
                                                    
                                           </div>
                                </div>

                                <div class="free-beat d-block col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <h6>Beat File (Mp3 with tag)</h6>
                                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                           
                                       <input type="file" name="free_audio_file" class=""  accept=".mp3">
                                                
                                       </div>
                                </div>

                              

                            
                            </div>
                            <div class="premimum-beat row d-none py-0 my-0">

                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4 ">
                                                <h6>Basic Lease File(Mp3 without tag)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="basic_audio_file" class=""  accept=".mp3">
                                                            
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-0 my-md-4">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" class="form-control" value="<?=$basicAmount;?>" placeholder="Enter Basic Lease Amount" name="basic_lease_amount">
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4 my-md-0">
                                                <h6>Exclusive Lease File (Mp3 + wav without tag)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="exclusive_audio_file" class=""  accept=".rar,.zip">
                                                            
                                                </div>
                                            </div>

                                        
                                            
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" name="exclusive_lease_amount" class="form-control" placeholder="Enter Exclusive Lease Amount" value="<?=$exclusiveAmount;?>">
                                            </div>
                                        

                                            
                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4 ">
                                        <h6>Premimum Exclusive Lease File (Mp3 + wav + STEMS)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="premium_audio_file" class=""  accept=".rar,.zip">
                                                            
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-0 my-md-4">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" name="premium_lease_amount" class="form-control" placeholder="Enter Premimum Exclusive Lease Amount" value="<?=$premiumAmount;?>">
                                            </div>
                              </div>
                        <div class="field-wrapper my-3">
                                <button type="submit" class="btn btn-primary add_beat" value="" name="edit_beat">Edit Beat</button>
                        </div>
                        </div>

                        
                    </form>
                    <?php
                }else{
                    ?>
                    <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
                        <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
                        <div class="px-3 py-5">
                            <h5>Add a beat</h5>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h6>Beat name</h6>
                                    <input type="text" name="beat_name" required class="form-control" placeholder="Enter Name..." id="" >
                                
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h6>Beat Genre</h6>
                                <select name="beat_genre" required id="" class="form-control px-3">
                                    <?php
                                        $query="SELECT * FROM add_genre";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $genre=$row["genre"];
                                                ?>
                                                <option class="px-3"><?=$genre;?></option>  
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                                
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Beat Mood</h6>
                                <select name="beat_mood" required id="" class="form-control px-3">
                                    <?php
                                        $query="SELECT * FROM add_lyrics_type";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $lyrics_type=$row["lyrics_type"];
                                                ?>
                                                <option class="px-3" value="<?=$lyrics_type;?>"><?=$lyrics_type;?></option>  
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Beat Category</h6>
                                <select name="beat_category" required id="" class="form-control px-3 select">
                                        <option value="Free">Free</option>
                                        <option value="Premium">Premimum</option>
                                
                                </select>
                            </div>
                            
                            
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-sm-4 my-md-0">
                                    <h6>Beat Image</h6>
                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                           
                                           <input type="file" required name="image_file" class=""  accept=".jpeg,.jpg,.png,.gif">
                                                    
                                           </div>
                                </div>

                                <div class="free-beat d-block col-12 col-sm-12 col-md-6 col-lg-6 ">
                                    <h6>Beat File (Mp3 with tag)</h6>
                                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                           
                                       <input type="file" required name="free_audio_file" class=""  accept=".mp3,.mpeg">
                                                
                                       </div>
                                </div>

                              

                            
                            </div>
                            <div class="premimum-beat row d-none py-0 my-0">

                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4 ">
                                                <h6>Basic Lease File(Mp3 without tag)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="basic_audio_file" class=""  accept=".mp3">
                                                            
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" class="form-control" placeholder="Enter Basic Lease Amount" name="basic_lease_amount">
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                                                <h6>Exclusive Lease File (Mp3 + wav without tag)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="exclusive_audio_file" class=""  accept=".zip,.rar">
                                                            
                                                </div>
                                            </div>

                                        
                                            
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" name="exclusive_lease_amount" class="form-control" placeholder="Enter Exclusive Lease Amount">
                                            </div>
                                        

                                            
                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                        <h6>Premimum Exclusive Lease File (Mp3 + wav + STEMS without tag)</h6>
                                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                                    
                                                <input type="file" name="premium_audio_file" class=""  accept=".zip,.rar">
                                                            
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                                <h6>Amount</h6>
                                                
                                                <input type="text" name="premium_lease_amount" class="form-control" placeholder="Enter Premimum Exclusive Lease Amount">
                                            </div>
                              </div>
                        <div class="field-wrapper my-3">
                                <button type="submit" class="btn btn-primary add_beat" value="" name="add_beat">Add Beat</button>
                        </div>
                        </div>

                        
                    </form>

           <div class="layout-px-spacing">
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                        
                    <div class="widget-content widget-content-area br-6">
                            <table id="invoice-list" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        
                                        <th>Beat Name</th>
                                        <th>Beat Category </th>
                                        <th>Beat Genre</th>
                                        <th>Purchase Status</th>
                                        <th>Image</th>
                                        <th>Listen</th>
                                        <th>Discount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM add_beat";
                                        $result = mysqli_query($conn,$query);
                                        $i=0;
                                        $beattrack="";
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $beat=$row["beat_name"];
                                                $beatid=$row["beat_id"];
                                                $image=$row["beat_image"];
                                                $category=$row["beat_category"];
                                                $purchase_status = $row["purchase_status"];
                                                $genre=$row["beat_genre"];
                                                $freeBeat = $row["beat_free_file"];
                                                $premiumBeat = $row["beat_basic_file"];
                                                if($category=="Free"){
                                                    $audio=$freeBeat;
                                                }else{
                                                    $audio=$premiumBeat;
                                                }
                                                $discount=$row["discount"];
                                                ?>
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="beat_id" value="<?=$beatid;?>">
                                       
                                        <td>
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> <?=$beat;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$category;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                            
                                                <p class="align-self-center mb-0 user-name"> <?=$genre;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                            <?php
                                                if($purchase_status=="Free"){
                                                    ?>
                                                    <span class="shadow-none badge badge-success"><?=$purchase_status;?></span>
                                                    <?php
                                                }else{
                                                    ?>
                                                            <span class="shadow-none badge badge-danger"><?=$purchase_status;?></span>
                                                    <?php
                                                }
                                            ?>
                                                
                                            </div>
                                        </td>

                                        


                                        <td>
                                        <div class="usr-img-frame  rounded-circle" style="background-image: url('Files/beat/<?=$image;?>');background-position:center;background-size:cover;">
                                                
                                                </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                              
                                                <p class="align-self-center mb-0 play" style="cursor: pointer;">  <i data-feather="play" class="play-icon d-block"></i> <i data-feather="pause" class="pause-icon d-none"></i></p>
                                                <audio src="Files/beat/<?=$audio;?>" controls hidden></audio>
                                            </div>
                                        </td>
                                    

                                      <?php
                                        if($category=="Premium"){
                                            if($discount==""){
                                                $discountText="Add  discount"; 
                                            }else{
                                                $discountText="Edit discount";
                                            }
                                            ?>
                                             <td>
                                             <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary btn-sm button-modal" data-toggle="modal" data-target="#loginModal" data-id="<?=$beatid;?>"><?=$discountText;?></button>
                                       </td>
                                            <?php
                                        }else{
                                            ?>
                                            <td></td>
                                            <?php
                                        }
                                      ?>
                           
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                               <?php
                                                if($i==mysqli_num_rows($result)-1){
                                                    ?>
                                                                 <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuLink2" >
                                                    <a class="dropdown-item action-edit" href="addbeat.php?edit_beat=<?=$beatid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                                    <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuLink2" >
                                                    <a class="dropdown-item action-edit" href="addbeat.php?edit_beat=<?=$beatid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>

                                                <?php
                                                }
                                               ?>
                                            </div>
                                        </td>

                                        
                                    </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                    ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>

        <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="loginModalLabel">
                                            <h4 class="modal-title">Add a discount</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0"  action="./handlers/add_handler.php" method="POST">
                                              <div class="form-group">
                                                <h6>Discount(%)</h6>

                                                  <input type="number" class="form-control mb-2 discount" id="exampleInputEmail1" max="100" name="discount" placeholder="Enter Discount(%)">

                                                <input type="date" class="form-control mb-2 expirydate" id="exampleInputEmail1" name="expirydate" >


                                               

                                                <input type="text" hidden value="beat" id="type">
                                                <input type="text" class="modal-id" name="id" hidden>
                                              </div>
                                             
                                              <button name="add_beat_discount" type="submit" class="btn btn-primary mt-2 mb-2 btn-block d-block">Add </button>

                                          

                                              <button name="remove_beat_discount" type="submit" class="btn btn-danger mt-2 mb-2 btn-block d-none">Remove </button>
                                            </form>

                                           

                                          </div>
                                         
                                        </div>
                                      </div>
        </div>
        <!--  END CONTENT AREA  -->
                <?php
            }
        ?>
            
   
           


     
           
          
    </div>


<?php
require_once("./includes/footer.php");
?>
<script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
<script>
    const freeBeat = document.querySelector(".free-beat")
    const premimumBeat = document.querySelector(".premimum-beat")
    const select = document.querySelector(".select");
    const amountInputs = document.querySelectorAll(".premimum-beat input[type=text]")
    const fileInputs = document.querySelectorAll(".premimum-beat input[type=file]")
    const fileInput =document.querySelector(".free-beat input[type=file]")
    const addbeatBtn = document.querySelector(".add_beat");
    const purchaseStatus = document.querySelector(".purchase-status")
   
          
    select.onchange = function(){
        hideInput()
    }
    if(select.value=="Premium"){
            freeBeat.classList.replace("d-block","d-none");
            premimumBeat.classList.replace("d-none","d-flex");
            //Changing purchase status of beat
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required
            
           
            
        }
    function hideInput(){
        if(select.value=="Premium"){
            freeBeat.classList.replace("d-block","d-none");
            premimumBeat.classList.replace("d-none","d-flex");
            //Changing purchase status of beat
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required
            
            addRequired(amountInputs,fileInputs,fileInput)
            
        }else if(select.value=="Free"){
            freeBeat.classList.replace("d-none","d-block");
            premimumBeat.classList.replace("d-flex","d-none");
            //Removing required from inputs
            purchaseStatus.value = "Free"
           
            removeRequired(amountInputs,fileInputs,fileInput)
        }
    }

    function addRequired(amountInputs,fileInputs,singleInput){
        amountInputs.forEach(input=>{
                input.setAttribute("required",true)
             
            })
            fileInputs.forEach(input=>{
                input.setAttribute("required",true)
             
            })
            singleInput.removeAttribute("required")
           
    }

    function removeRequired(amountInputs,fileInputs,singleInput){
        amountInputs.forEach(input=>{
                input.removeAttribute("required")
             
            })
            fileInputs.forEach(input=>{
                input.removeAttribute("required")
             
            })
            singleInput.setAttribute("required",true)
            console.log(singleInput)
    }

    amountInputs.forEach(input=>{
        input.onkeyup=function(){
            if(isNaN(input.value)){ 
                addbeatBtn.setAttribute("disabled",true)
            }else{
                addbeatBtn.removeAttribute("disabled")
            }
        
        }
        input.onblur=function(){
          input.value=  parseFloat(input.value).toFixed(2)
        }
    
    })

    const plays = document.querySelectorAll(".play")
    const playIcon=document.querySelectorAll(".play-icon")
    const pauseIcon = document.querySelectorAll(".pause-icon");
    const audio = document.querySelectorAll("audio")
    
    let arr=[];
    plays.forEach((play,index)=>{
       
        arr.push(index)
        play.onclick=function(){
         
           if(playIcon[index].classList.contains("d-block")){
               playIcon[index].classList.replace("d-block","d-none");
               pauseIcon[index].classList.replace("d-none","d-block")
               arr.forEach(arr=>{
                   //Preventing two or more beats to play at the same time
                   if(arr!=index){

                    playIcon[arr].classList.replace("d-none","d-block");
                     pauseIcon[arr].classList.replace("d-block","d-none")
                       audio[arr].pause()
                   }
               })
               audio[index].play()
           }else{
            playIcon[index].classList.replace("d-none","d-block");
               pauseIcon[index].classList.replace("d-block","d-none") 
               audio[index].pause()
           }
        }
    })

        const delets = document.querySelectorAll(".action-delete");
        const beatids=document.querySelectorAll(".beat_id")
        
       delets.forEach((delet,index)=>{
        delet.onclick=function(){
            fetch(`./handlers/delete_handler.php?deletebeat=${beatids[index].value}`).then(e=>e.text()).then(e=>{
              if(e=="true"){
                  swal("Deleted","","success")
              }
            })
        }
       }) 

     
</script>
<script src="./discount.js"></script>
