<?php
$title="Add Mood";
require_once("./includes/header.php");
?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
      
                    <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
                        <div class="px-3 py-5">
                            <h5>Add a Mood</h5>
                        <div class="row my-3">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Mood Name </h6>
                                <input type="text" name="lyrics_type" required class="form-control" placeholder="Enter mood name" id="">
                            
                        </div>

                            
                           
                        </div>

                        <div class="field-wrapper">
                                <button type="submit" class="btn btn-primary add_genre" value="" name="add_lyrics_type">Add Mood</button>
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
                                        
                                        <th>Mood </th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM add_lyrics_type";
                                        $result = mysqli_query($conn,$query);
                                        $i=0;
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $lyrics_type=$row["lyrics_type"];
                                                $lyrics_type_id=$row["id"];
                                                $image=$row["lyrics_type_image"];
                                                ?>
                                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="lyrics_type_id" value="<?=$lyrics_type_id;?>">
                                       
                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$lyrics_type;?></p>
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
    <!-- END MAIN CONTAINER -->
    <script>
        const delets = document.querySelectorAll(".action-delete");
        const genereids=document.querySelectorAll(".lyrics_type_id")
        const trs = document.querySelectorAll("tr") 
       delets.forEach((delet,index)=>{
        delet.onclick=function(){
            fetch(`./handlers/delete_handler.php?delete_lyrics_type=${genereids[index].value}`).then(e=>e.text()).then(e=>{
                swal("Deleted","","success")
            })
        }
       }) 
    </script>
    
    <?php
        require_once("./includes/footer.php");
    ?>
        
    
    
    
    

   
 