<?php
$title="Add Lyrics";
require_once("./includes/header.php");

?>
<div id="content" class="main-content">
<?php
   if(isset($_GET["edit_lyrics"])){
    ?>
    <form action="./handlers/edit_handler.php" method="POST" enctype="multipart/form-data">
                    <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
                    <div class="px-3 py-5">
                        <h5>Edit a lyrics</h5>
                        <?php
                            $lyricsId=$_GET["edit_lyrics"];
                            $query="SELECT * FROM `add_lyrics` WHERE lyrics_id='$lyricsId'";
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                $lyricsName=$row["lyrics_name"];
                                $lyricsCategory=$row["lyrics_category"];
                                $basicamount=$row["lyrics_basic_amount"];
                                $exclusiveamount=$row["lyrics_exclusive_amount"];
                                $premiumamount=$row["lyrics_premium_amount"];
                                $ly_type=$row["lyrics_type"];
                            }
                        ?>
                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="text" hidden value="<?=$lyricsId;?>" name="lyrics_id">
                            <h6>Lyrics name</h6>
                                <input type="text" value="<?=$lyricsName;?>" name="lyrics_name"  class="form-control" placeholder="Enter Name..." id="" >
                            
                        </div>
                        

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <h6>Lyrics Category</h6>
                            <select name="lyrics_category"   id="" class="form-control px-3 select">
                                    <option value="<?=$lyricsCategory;?>"><?=$lyricsCategory;?></option>
                             </select>
                        </div>
                        
                        
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Lyrics Image</h6>
                                <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                       
                                       <input type="file"  name="image_file" class=""  accept=".jpeg,.jpg,.png,.gif">
                                                
                                       </div>
                            </div>

                            <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Lyrics File </h6>
                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                       
                                   <input type="file"   name="lyrics_file" class=""  accept=".rar,.zip,.rar4">
                                            
                                   </div>
                            </div>



                            <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 ">
                                <h6>Lyrics Type </h6>
                                
                            <select name="lyrics_type" required id="" class="form-control px-3">
                            <option class="px-3" value="<?=$ly_type;?>"><?=$ly_type;?></option>
                                    <?php
                                        $query="SELECT * FROM add_lyrics_type";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                if($ly_type!=$row["lyrics_type"]){
                                                  $lyrics_type=$row["lyrics_type"];  
                                                
                                                
                                                ?>
                                                <option class="px-3" value="<?=$lyrics_type;?>"><?=$lyrics_type;?></option>  
                                                <?php
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                         

                                   
                                    
                                        
                            <div class="d-none premimum-lyrics col-12 col-sm-12 col-md-12 col-lg-12 row">
                            

                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Amount For Basic Lease</h6>
                                
                                <input type="text" value="<?=$basicamount;?>" class="form-control" placeholder="Enter Basic Lease Amount" name="lyrics_basic_amount">
                            </div>

                           

                        
                            
                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Amount For Exclusive Lease</h6>
                                
                                <input type="text" name="lyrics_exclusive_amount" value="<?=$exclusiveamount;?>"  class="form-control" placeholder="Enter Exclusive Lease Amount">
                            </div>

                             
                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Amount For Premium Lease</h6>
                                
                                <input type="text" name="lyrics_premium_amount" value="<?=$premiumamount;?>"  class="form-control" placeholder="Enter Premium Lease Amount">
                            </div>
                        
                        
                         
                        



     </div
                        
                        </div>
                       
                    <div class="field-wrapper my-3">
                            <button type="submit" class="btn btn-primary add_lyrics" value="" name="edit_lyrics">Edit lyrics</button>
                    </div>
                    </div>

                    
    </form>
    <?php
}else{
    ?>
    <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
                    <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
                    <div class="px-3 py-5">
                        <h5>Add a Lyrics</h5>
                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h6>Lyrics name</h6>
                                <input type="text" name="lyrics_name" required class="form-control" placeholder="Enter Name..." id="" >
                            
                        </div>
                        

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <h6>Lyrics Category</h6>
                            <select name="lyrics_category" required  id="" class="form-control px-3 select">
                                    <option value="Free">Free</option>
                                    <option value="Premium">Premimum</option>
                            
                            </select>
                        </div>
                        
                        
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Lyrics Image</h6>
                                <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                       
                                       <input type="file" required name="image_file" class=""  accept=".jpeg,.jpg,.png,.gif">
                                                
                                       </div>
                            </div>

                            <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Lyrics File </h6>
                                    <div class="form-control p-0  m-0 d-flex align-items-center px-2">
                                       
                                   <input type="file" required  name="lyrics_file" class=""  accept=".rar,.zip,.rar4,.pdf,.ms">
                                            
                                   </div>
                            </div>

                          
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <h6>Lyrics Type</h6>
                            <select name="lyrics_type" required id="" class="form-control px-3">
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

                                   
                                    
                                        
                        <div class="d-none premimum-lyrics col-12 col-sm-12 col-md-12 col-lg-12 row">
                            

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                                <h6>Amount For Basic Lease</h6>
                                                
                                                <input type="text" class="form-control" placeholder="Enter Basic Lease Amount" name="lyrics_basic_amount">
                                            </div>

                                           

                                        
                                            
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                                <h6>Amount For Exclusive Lease</h6>
                                                
                                                <input type="text" name="lyrics_exclusive_amount" class="form-control" placeholder="Enter Exclusive Lease Amount">
                                            </div>

                                             
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                                <h6>Amount For Premium Lease</h6>
                                                
                                                <input type="text" name="lyrics_premium_amount" class="form-control" placeholder="Enter Premium Lease Amount">
                                            </div>
                                        
                                        
                                         
                                        



                     </div>

                     
                        
                        </div>
                       
                    <div class="field-wrapper my-3">
                            <button type="submit" class="btn btn-primary add_lyrics" value="" name="add_lyrics">Add lyrics</button>
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
                                        
                                        <th>Lyrics Name</th>
                                        <th>Lyrics Category </th>
                                        <th>Lyrics Genre</th>
                                       
                                        <th>Image</th>
                                        
                                        <th>Discount</th>
                                        <th>Purchase Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM add_lyrics";
                                        $result = mysqli_query($conn,$query);
                                        $i=0;
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $lyrics=$row["lyrics_name"];
                                                $lyricsid=$row["lyrics_id"];
                                                $image=$row["lyrics_image"];
                                                $category=$row["lyrics_category"];
                                                $purchase_status=$row["purchase_status"];
                                              
                                                $lyrics_type=$row["lyrics_type"];
                                                $discount=$row["discount"];
                                               
                                               
                                                ?>
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="lyrics_id" value="<?=$lyricsid;?>">
                                       
                                        <td>
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> <?=$lyrics;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$category;?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$lyrics_type;?></p>
                                            </div>
                                        </td>
                                       

                                        

                                        


                                        <td>
                                        <div class="usr-img-frame  rounded-circle" style="background-image: url('Files/lyrics/<?=$image;?>');background-position:center;background-size:cover;">
                                                 
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
                                    <button type="button" class="btn btn-secondary btn-sm button-modal" data-toggle="modal" data-target="#loginModal" data-id="<?=$lyricsid;?>"><?=$discountText;?></button>
                                       </td>
                                            <?php
                                        }else{
                                            ?>
                                                <td></td>
                                            <?php
                                        }
                                      ?>
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
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                               <?php
                                                if($i==mysqli_num_rows($result)-1){
                                                    ?>
                                                                 <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuLink2" >
                                                    <a class="dropdown-item action-edit" href="addlyrics.php?edit_lyrics=<?=$lyricsid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                                    <a class="dropdown-item action-delete delete-lyrics" href="javascript:void(0);" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                                    <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuLink2" >
                                                    <a class="dropdown-item action-edit" href="addlyrics.php?edit_lyrics=<?=$lyricsid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                                    <a class="dropdown-item action-delete delete-lyrics" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
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
                                                <input type="number" class="form-control mb-2 discount" id="exampleInputEmail1"  name="discount" placeholder="Enter Discount(%)">

                                                
                                                <input type="date" class="form-control mb-2 expirydate" id="exampleInputEmail1" name="expirydate" >

                                                <input type="text" class="modal-id" name="id" hidden>
                                                <input type="text" hidden value="lyrics" id="type">

                                              </div>
                                             
                                              <button name="add_lyrics_discount" type="submit" class="btn btn-primary mt-2 mb-2 btn-block d-block">Add </button>

                                          

                                              <button name="remove_lyrics_discount" type="submit" class="btn btn-danger mt-2 mb-2 btn-block d-none">Remove </button>
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
<script>
        const freelyrics = document.querySelector(".free-lyrics")
    const premimumlyrics = document.querySelector(".premimum-lyrics")
    const select = document.querySelector(".select");
    const amountInputs = document.querySelectorAll(".premimum-lyrics input[type=text]")
   
    const addlyricsBtn = document.querySelector(".add_lyrics");
    const purchaseStatus = document.querySelector(".purchase-status")
   
          
    select.onchange = function(){
        hideInput()
    }
    if(select.value=="Premium"){
            
            premimumlyrics.classList.toggle("d-none");
            //Changing purchase status of lyrics
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required
            
            addRequired(amountInputs)
            
        }
    function hideInput(){
        if(select.value=="Premium"){
            
            premimumlyrics.classList.toggle("d-none");
            //Changing purchase status of lyrics
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required
            
            addRequired(amountInputs)
            
        }else if(select.value=="Free"){
            
            premimumlyrics.classList.toggle("d-none");
            //Removing required from inputs
            purchaseStatus.value = "Free"
           
            removeRequired(amountInputs)
        }
    }

    function addRequired(amountInputs){
        amountInputs.forEach(input=>{
                input.setAttribute("required",true)
             
            })
           
           
    }

    function removeRequired(amountInputs){
        amountInputs.forEach(input=>{
                input.removeAttribute("required")
             
            })
           
    }

    amountInputs.forEach(input=>{
        input.onkeyup=function(){
            if(isNaN(input.value)){ 
                addlyricsBtn.setAttribute("disabled",true)
            }else{
                addlyricsBtn.removeAttribute("disabled")
            }
        
        }
        input.onblur=function(){
          input.value=  parseFloat(input.value).toFixed(2)
        }
    
    })

    const delets = document.querySelectorAll(".action-delete");
        const lyricsids=document.querySelectorAll(".lyrics_id")
       
       delets.forEach((delet,index)=>{
        delet.onclick=function(){
            fetch(`./handlers/delete_handler.php?delete_lyrics=${lyricsids[index].value}`).then(e=>e.text()).then(e=>{
               if(e=="true"){
                   swal("Deleted","","success")
               }
            })
        }
       }) 
</script>
<script src="./discount.js"></script>