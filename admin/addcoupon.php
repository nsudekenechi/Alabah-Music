
<?php 
$title="Add Coupon";
require_once("./includes/header.php");




?>
<div id="content" class="main-content">
            <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">

                        <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
                        <div class="px-3 py-5">
                            <h5>Add a Coupon</h5>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h6>Coupon Code</h6>
                                    <input type="text" name="coupon_code" required class="form-control coupon-code" placeholder="Enter Code..." id="" >
                                
                            </div>
               
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                <h6>Coupon Discount(%)</h6>
                                    <input type="text" name="coupon_discount" required class="form-control  discount" placeholder="Enter Discount..." id="" >
                                
                            </div>
                           
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-3">
                                <h6>Expiry Date</h6>
                                    <input type="date" name="coupon_expiry" required class="form-control  discount" placeholder="Enter Discount..." id="" >
                                
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-3">
                                <h6>Maximum Persons</h6>
                                <input type="number" name="maximum" class="form-control  " name="" id="" required>
                            </div>
                            
                            
                            
                            
                                
                                

                            
                            </div>
                     
                        <div class="field-wrapper my-3">
                                <button type="submit" class="btn btn-primary " value="" name="add_coupon">Add Code</button>

                                <button type="button" class="btn btn-success generate-code ml-3" value="" name="generate_code">Generate Code</button>
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
                                        <th>Coupon Code</th>
                                        <th>Expired</th>
                                        <th>Expiry Date </th>
                                        <th>Discount </th>
                                        <th>Counts</th>
                                        <th>Maximum</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM add_coupon";
                                        $result = mysqli_query($conn,$query);
                                        $i=0;
                                        $beattrack="";
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                            $id=$row["id"];
                                            $couponCode = $row["coupon_code"];
                                               $expiryDate=$row["date"];
                                               $isExpired=$row["is_expired"];
                                               $couponDiscount = $row["coupon_discount"];
                                               $counts=$row["count"];
                                               $products=$row["Maximum"];
                                               
                                                ?>
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="coupon_id" value="<?=$id;?>">
                                        <td>
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> <?=$couponCode;?></p>
                                            </div>
                                        </td>
                                       
                                        <td>
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> <?=$isExpired;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name expiry"> <?=$expiryDate;?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$couponDiscount;?>%</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$counts;?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$products;?></p>
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
                                                   
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                                    <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuLink2" >
                                                  
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
</div>
<?php require_once("./includes/footer.php");?>

<script>
    const generateBtn=document.querySelector(".generate-code");
    const couponCode=document.querySelector(".coupon-code");
    const discount = document.querySelector(".discount");
    generateBtn.onclick=function(){
        const generate= async ()=>{
            let req = await fetch("./handlers/add_handler.php?generate_id")
            let data = await req.text()
            couponCode.value=data
        }
        generate()
    }
    const delets = document.querySelectorAll(".action-delete");
        const couponids=document.querySelectorAll(".coupon_id")
        
       delets.forEach((delet,index)=>{
        delet.onclick=function(){
            fetch(`./handlers/delete_handler.php?deletecoupon=${couponids[index].value}`).then(e=>e.text()).then(e=>{
              if(e=="true"){
                  swal("Deleted","","success")
              }
            })
        }
       })
   
</script>