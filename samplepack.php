<?php
    $title="Sample Pack";
    require_once("./includes/header.php");
    

    
?>


        <!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1919x388.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading"><?=$title;?></h2>
                                <ul>
                                    <li>
                                        <a href="./index.php">Home</a>
                                    </li>
                                    <li><a href="./beatstore.php">Beat Store</a></li>
                                    <li><b><?=$title;?></b></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-topbar">
                                <ul>
                                    <li class="page-count">
                                        <span><?=$itemcount;?></span> Product Found of <span><?=$total;?></span>
                                    </li>
                                    <li class="product-view-wrap">
                                        <ul class="nav" role="tablist">
                                            <li class="grid-view" role="presentation">
                                                <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                                    <i class="fa fa-th"></i>
                                                </a>
                                            </li>
                                            <li class="list-view" role="presentation">
                                                <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                                    <i class="fa fa-th-list"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="short">
                                        <select class="nice-select">
                                            <option value="1">Sort by Default</option>
                                            <option value="2">Sort by Premium</option>
                                            <option value="3">Sort by Rated</option>
                                            <option value="4">Sort by Latest</option>
                                            <option value="5">Sort by High Price</option>
                                            <option value="6">Sort by Low Price</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                                <div class="product-grid-view row g-y-20">
                            <?php
                            $location = "sample";
                           
                            
                            
                            while ($row = mysqli_fetch_assoc($itemresult)) {
                                if($row['discount']!=""){
                                    $amount = $row['sample_amount'] * ($row['discount'])/100;
                                    $price = $row['sample_amount']-$amount; 
                                   $price = number_format($price,2);
                                }else{
                                    $price = $row['sample_amount'];
                                }
                                $sampleId=$row["sample_id"];
                                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$sampleId'";
                                $cartid="";
                                $result1 = mysqli_query($conn,$query1);
                                if(mysqli_num_rows($result1)>0){
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $cartid=$row1["cart_id"];
                                    
                                }
                                $freeFile = $row["sample_file"];
                            ?>
                            <audio ></audio>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                   
                                    <div class="product-item " data-type="sample" data-id="<?=$sampleId;?>">
                                    <input type="text" hidden id="beat-id" value="<?= $row['sample_id']; ?>">
                                     
                                    
                                 
                                        

                                        <input type="text" hidden class="product-details">
                                        <div class="product-img">
                                            <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal" style="cursor:pointer;">
                                                <?php
                                                if ($row['sample_category'] == "Premium") {
                                                ?>
                                                    <span class="btn btn-success position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>
                                                    
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>
                                                <?php
                                                }
                                                ?>
                                                <img class="primary-img" src="./admin/Files/sample/<?= $row['sample_image']; ?>" alt="Product Images">
                                                <img class="secondary-img" src="./admin/Files/sample/<?= $row['sample_image']; ?>" alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                            <ul>
                                            <li hidden>
                                                        <a data-tippy="Play" class="play" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="entypo-icon-controller-play"></i>
                                                        </a>
                                                    </li>
                                                   
                                                    <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                                                        if($row['sample_amount']!=""){
                                                            if($sampleId==$cartid){
                                                                ?>
                                                                <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  data-name="<?= $row['sample_name'] ?>" data-type="sample" data-image="<?= $row['sample_image']; ?>" data-price="<?= $price; ?>" data-id="<?=$row['sample_id'];?>">
                                                            <i class="pe-7s-cart cart-list-active"></i>
                                                        </a>
                                                    </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  data-name="<?= $row['sample_name'] ?>" data-type="sample" data-image="<?= $row['sample_image']; ?>" data-price="<?= $price; ?>" data-id="<?=$row['sample_id'];?>">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                                <?php
                                                            }
                                                            ?>
                                                                
                                                            <?php
                                                        }else{
                                                            $explode=explode(".",$freeFile)[1];
                                                           
                                                            ?>
                                                    <li>
                                                        <a class="download add-to-cart" data-tippy="Download" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  href="./admin/Files/<?=$location;?>/<?=$freeFile;?>" download="<?=$row['sample_name'];?>.<?php print_r($explode);?>">
                                                      <?php
                                                       
                                                      ?>
                                                            <i class="pe-7s-download"></i>
                                                        </a>
                                                    </li>
                                                    
                                                        </a>
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($row['sample_amount'] != "") {
                                                $price = "$" . $price;
                                            ?>
                                         
                                            <?php
                                            } else {
                                                $price = $price;
                                            ?>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name w-100" href="shop.html"><?= $row['sample_name']; ?></a>
                                            <div class="price-box pb-1 d-flex align-items-center">
                                               <?php
                                                if($row['discount']!=""){
                                                    ?>
                                                     <span class="new-price"><?= $price; ?></span>
                                                     <span style="font-size: 14px;" class="old-price"><del ><?='$'.$row['sample_amount'];?></del></span>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <span class="new-price"><?= $price; ?></span>
                                                    <?php
                                                }
                                               ?>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                                   
                                        
                                    
                                </div>
                              
                            </div>
                            <div class="pagination-area">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                    <?php
                                        for($x=1;$x<=$pages;$x++):
                                    ?>
                                        <li class="page-item active"><a class="page-link" href="?page=<?=$x;?>"><?=$x;?></a></li>
                                    <?php endfor;?>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->

      

    </div>

 

<?php
require_once("./includes/footer.php");
?>


</body>

</html>
