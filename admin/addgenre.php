<?php
$title="Add Genre";
require_once("./includes/header.php");
?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <?php
                if(isset($_GET["edit_genre"])){
                    $genreid=$_GET["edit_genre"];
                    $query="SELECT * FROM add_genre WHERE id='$genreid'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $genreName=$row["genre"];
                    
                    ?>
                         <form action="./handlers/edit_handler.php" method="POST" enctype="multipart/form-data">
                             <input type="text" name="genre_id" hidden value="<?=$genreid;?>" id="">
                        <div class="px-3 py-5">
                            <h5>Edit a genre</h5>
                        <div class="row my-3">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <input type="text" name="genre_name" value="<?=$genreName;?>" class="form-control" placeholder="Genre name" id="">
                            
                        </div>

                            
                           
                        </div>

                        <div class="field-wrapper">
                                <button type="submit" class="btn btn-primary add_genre" value="" name="edit_genre">Edit <?=$genreName;?></button>
                        </div>
                        </div>

                        
           </form>
                    <?php
                }else{
                    ?>
                    <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
                        <div class="px-3 py-5">
                            <h5>Add a genre</h5>
                        <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Genre name</h6>
                                <input type="text" name="genre_name" required class="form-control" placeholder="Enter name" id="">
                            
                        </div>

                           
                        </div>

                        <div class="field-wrapper">
                                <button type="submit" class="btn btn-primary add_genre" value="" name="add_genre">Add Genre</button>
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
                                        
                                        <th>Genre Name</th>
                                       
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $query = "SELECT * FROM add_genre";
                                        $result = mysqli_query($conn,$query);
                                        $i=0;
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $genre=$row["genre"];
                                                $genreid=$row["id"];
                                                $image=$row["genre_image"];
                                                ?>
                                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <input type="text" hidden class="genre_id" value="<?=$genreid;?>">
                                       
                                        <td>
                                            <div class="d-flex">
                                               
                                                <p class="align-self-center mb-0 user-name"> <?=$genre;?></p>
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
                                                    <a class="dropdown-item action-edit" href="addgenre.php?edit_genre=<?=$genreid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                                </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                                    <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuLink2" >
                                                    <a class="dropdown-item action-edit" href="addgenre.php?edit_genre=<?=$genreid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
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

           
        <!--  END CONTENT AREA  -->
                    <?php
                }
            ?>
            
   
           


     
           
          
    </div>
    <!-- END MAIN CONTAINER -->
    <script>
        const delets = document.querySelectorAll(".action-delete");
        const genereids=document.querySelectorAll(".genre_id")
       delets.forEach((delet,index)=>{
        delet.onclick=function(){
            fetch(`./handlers/delete_handler.php?deletegenre=${genereids[index].value}`).then(e=>e.text()).then(e=>{
                if(e=="true"){
                    swal("Deleted","","success");
                }
            })
        }
       }) 
    </script>
    
    <?php
        require_once("./includes/footer.php");
    ?>
        
    
    
    
    

   
 