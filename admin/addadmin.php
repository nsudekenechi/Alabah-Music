<?php
    $title="Add Admin";
    require_once("./includes/header.php");
   
    if($adminType!="High"){
       header("Location:./dashboard.php");
    }
?>
<div id="content" class="main-content">
 
   
 <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="px-3 py-5">
                            <h5>Add an admin</h5>
                        <div class="row mt-4">
                           

                       
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                <h6>Admin Email</h6>
                                    <input type="text" name="admin_email" required class="form-control" placeholder="Enter Email..." id="" >
                                
                            </div>

                       
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                                <h6>Admin Role</h6>
                                <select name="admin_role" id="" class="form-control px-3 select">
                                      
                                                <option value="Producer">Producer</option>
                                                <option value="Song Writer">Song Writer</option>

                                        
                                
                                </select>
                                
                            </div>

                       
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                                <h6>Admin Type</h6>
                                <select name="admin_type" id="" class="form-control px-3 ">
                                      
                                                
                                    <option value="Low">Low</option>
                                </select>
                                
                            </div>

                       
                           
                            
                        
                        
                        </div>
                        <div class="field-wrapper ">
                                <button type="submit" class="btn btn-primary " value="" name="add_admin">Add Admin</button>
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
                                        
                                        <th>Admin Username</th>
                                        <th>Admin Email </th>
                                        <th>Admin Role</th>
                                        <th>Admin Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM `login` WHERE admin_username!='$username'";
                                        $result = mysqli_query($conn,$query);
                                        
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $i=0;
                                                ?>
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="admin_id" value="<?=$row["admin_id"];?>">
                                       
                                        <td>
                                            <div class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> <?=$row["admin_username"];?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$row["admin_email"];?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                            
                                                <p class="align-self-center mb-0 user-name"> <?=$row["admin_role"];?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                            
                                                <p class="align-self-center mb-0 user-name"> <?=$row["admin_type"];?></p>
                                            </div>
                                        </td>
                                        


                           
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                             
                                               
                                                                 <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuLink2" >
                                                   
                                                    <a class="dropdown-item action-delete delete_admin" href="javascript:void(0);" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>
                                               
                                            </div>
                                        </td>

                                        
                                    </tr>
                                                <?php
                                            
                                            }
                                        }
                                    ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

           
        <!--  END CONTENT AREA  -->
   
</div>

<?php
    require_once("./includes/footer.php");
?>
<script>
   
    const deleteAdmins=document.querySelectorAll(".delete_admin");
    const adminId=document.querySelectorAll(".admin_id");
    deleteAdmins.forEach((deleteAdmin,index)=>{
        deleteAdmin.onclick=function(){
            
            fetch(`./handlers/delete_handler.php?delete_admin=${adminId[index].value}`).then(e=>e.text()).then(e=>{
               if(e=="true"){
                swal("Deleted","","success")
               }
            })
        }
    })
</script>