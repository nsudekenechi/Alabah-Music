<?php
    $title="Song Hub";
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
                                    <li><a href="./samplepack.php">Sample Pack</a></li>
                                    <li><a href="./lyricsstore.php">Lyrics Store</a></li>
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
                                <div class="product-item-wrap row">
                            <?php
                            $location = "song";
                           
                            
                          
                            while ($row = mysqli_fetch_assoc($itemresult)) {
                                if($row['discount']!=""){
                                    $amount = $row['song_basic_amount'] * ($row['discount'])/100;
                                    $price = $row['song_basic_amount']-$amount; 
                                   $price = number_format($price,2);
                                }else{
                                    $price = $row['song_basic_amount'];
                                }
                                $songId=$row["song_id"];
                                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$songId'";
                                $cartid="";
                                $result1 = mysqli_query($conn,$query1);
                                if(mysqli_num_rows($result1)>0){
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $cartid=$row1["cart_id"];
                                    
                                }
                                $freeFile = $row["song_file"];
                            ?>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                   
                                    <div class="product-item " data-type="song" data-id="<?=$songId;?>">
                                    <input type="text" hidden id="beat-id" value="<?= $row['song_id']; ?>">
                                   
                                 
                                        

                                        <input type="text" hidden class="product-details">
                                        <div class="product-img">
                                            <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal" style="cursor:pointer;">
                                                <?php
                                                if ($row['song_category'] == "Premium") {
                                                ?>
                                                    <span class="btn btn-success position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>
                                                <?php
                                                }
                                                ?>
                                                <img class="primary-img" src="./admin/Files/song/<?= $row['song_image']; ?>" alt="Product Images">
                                                <img class="secondary-img" src="./admin/Files/song/<?= $row['song_image']; ?>" alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a data-tippy="Play" class="play"  data-id="<?= $row['song_id']; ?>" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="entypo-icon-controller-play"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                                                        if($row['song_basic_amount']!=""){
                                                            if($cartid==$songId){
                                                                ?>
                                                                                      <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  data-name="<?= $row['song_name'] ?>" data-type="song" data-image="<?= $row['song_image']; ?>" data-price="<?= $price; ?>" data-id="<?=$row['song_id'];?>">
                                                            <i class="pe-7s-cart cart-list-active"></i>
                                                        </a>
                                                    </li>
                                                                <?php
                                                            }else{
                                                            ?>
                                                                <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  data-name="<?= $row['song_name'] ?>" data-type="song" data-image="<?= $row['song_image']; ?>" data-price="<?= $price; ?>" data-id="<?=$row['song_id'];?>">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                            <?php
                                                            }
                                                        }else{
                                                            ?>
                                                                    <li>
                                                        <a class="download add-to-cart" data-tippy="Download" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"  href="./admin/Files/<?=$location;?>/<?=$freeFile;?>" download="<?=$row['song_name'];?>">
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
                                            if ($row['song_category'] == "Premium") {
                                                $price = "$" . $price;
                                            ?>
                                                <audio src="./admin/Files/song/<?= $row['song_preview']; ?>" loop></audio>
                                            <?php
                                            } else {
                                                $price = "";
                                            ?>
                                                <audio src="./admin/Files/song/<?= $row['song_preview']; ?>" loop></audio>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html"><?= $row['song_name']; ?></a>
                                            <div class="price-box pb-1 d-flex align-items-center">
                                               <?php
                                                if($row['discount']!=""){
                                                    ?>
                                                     <span class="new-price"><?= $price; ?></span>
                                                     <span style="font-size: 14px;" class="old-price"><del ><?='$'.$row['song_basic_amount'];?></del></span>
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
