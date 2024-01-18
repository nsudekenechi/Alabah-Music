<?php
// Returning Every discount expiry to true, once its their expiry date
$title = "Home";
require_once("./includes/header.php");
$start = 0;
$end = 5;
$selector = "";
$query1 = "SELECT * FROM add_cart WHERE user_id='$user'";
$result1 = mysqli_query($conn, $query1);

$writeUps = [
    "beat" => ["The Perfect Blend of sounds that makes you feel alive"],
    "sample" => ["We've Got the perfect snare just for you"],
    "lyrics" => ["Each Word resonates with you on every level"],
    "song" => ["Original Songs with perfect melodies that speaks directly to your soul"]
];

function writeUp($item)
{
    $rand = rand(0, count($item) - 1);
    return $item[$rand];
}
$beatWriteUp = writeUp($writeUps["beat"]);
$sampleWriteUp = writeUp($writeUps["sample"]);
$lyricsWriteUp = writeUp($writeUps["lyrics"]);
$songWriteUp = writeUp($writeUps["song"]);


?>
<style>
    .expand-width img {
        box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, .4);
    }
</style>
<!-- Begin Slider Area -->
<div class="slider-area">

    <!-- Main Slider -->
    <div class="swiper-container main-slider swiper-arrow with-bg_white">
        <div class="swiper-wrapper">
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="assets/images/slider/bg/1-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">Buy Beats </span>
                                    <h2 class="title">From The Pro's</h2>
                                    <p class="short-desc">
                                        <?= $beatWriteUp; ?></p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary"
                                            href="beatstore.php">Buy Now <i
                                                class="fa fa-shopping-cart text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">

                                            <img src="./Img/beatBg.jpg"
                                                alt="Inner Image" style="object-fit:cover;width:100%;height:500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="assets/images/slider/bg/1-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">Buy Samples </span>
                                    <h2 class="title">From The Pro's</h2>
                                    <p class="short-desc">
                                        <?= $sampleWriteUp ?></p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary"
                                            href="samplepack.php">Buy Now <i
                                                class="fa fa-shopping-cart text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">

                                            <img src="./Img/sample.jpg"
                                                alt="Inner Image" style="object-fit:cover;width:100%;height:500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="assets/images/slider/bg/1-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">Buy Lyrics </span>
                                    <h2 class="title">From The Pro's</h2>
                                    <p class="short-desc">
                                        <?= $lyricsWriteUp; ?></p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary"
                                            href="lyricsstored.php">Buy Now <i
                                                class="fa fa-shopping-cart text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">

                                            <img src="./Img/lyrics.jpg"
                                                alt="Inner Image" style="object-fit:cover;width:100%;height:500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="assets/images/slider/bg/1-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">Buy Songs </span>
                                    <h2 class="title">From The Pro's</h2>
                                    <p class="short-desc">
                                        <?= $songWriteUp; ?></p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary" href="songhub.php">Buy
                                            Now <i class="fa fa-shopping-cart text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">

                                            <img src="./Img/song.jpg"
                                                alt="Inner Image" style="object-fit:cover;width:100%;height:500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination d-md-none"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Shipping Area -->
<div class="shipping-area section-space-top-100">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-title mb-5">Lease Licensing</h2>
        </div>
        <div class="shipping-bg">
            <div class="row shipping-wrap">
                <div class="col-lg-4 col-md-6">
                    <style>
                        .shipping-item {
                            height: 400px;
                        }

                        .shipping-content h2 {
                            margin-bottom: 20px;
                        }
                    </style>
                    <div class="shipping-item">
                        <!-- <div class="shipping-img">
<img src="assets/images/shipping/icon/car.png" alt="Shipping Icon">
</div> -->
                        <div class="shipping-content ">
                            <h2 class="title">Basic Lease</h2>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="shipping-item">
                        <!-- <div class="shipping-img">
<img src="assets/images/shipping/icon/card.png" alt="Shipping Icon">
</div> -->
                        <div class="shipping-content">
                            <h2 class="title">Exclusive Lease</h2>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="shipping-item">
                        <!-- <div class="shipping-img">
<img src="assets/images/shipping/icon/service.png" alt="Shipping Icon">
</div> -->
                        <div class="shipping-content">
                            <h2 class="title">Premium Lease</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shipping Area End Here -->

<!-- Beat Store Area -->
<?php
$selector = "Beat";
?>
<div class="product-area section-space-top-100">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-title mb-0">Beat Store</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active"
                            id="<?= $selector; ?>-all-tab"
                            data-bs-toggle="tab"
                            href="#<?= $selector; ?>-all" role="tab"
                            aria-controls="<?= $selector; ?>-all"
                            aria-selected="true">
                            All
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="<?= $selector; ?>-Free-tab"
                            data-bs-toggle="tab"
                            href="#<?= $selector; ?>-Free" role="tab"
                            aria-controls="<?= $selector; ?>-Free"
                            aria-selected="false">
                            Free
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="latest-tab" data-bs-toggle="tab"
                            href="#<?= $selector; ?>-Premium"
                            role="tab"
                            aria-controls="<?= $selector; ?>-Premium"
                            aria-selected="false">
                            Premium
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active"
                        id="<?= $selector; ?>-all" role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-all-tab">
                        <div class="product-item-wrap row">
                            <?php
                            $location = "beat";


if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_beat WHERE CONCAT (`beat_name`,`beat_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_beat WHERE purchase_status='Not Sold' || purchase_status='Free'  ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $beatId = $row["beat_id"];



        if ($row['discount'] != "") {
            $amount = $row['beat_basic_amount'] * ($row['discount']) / 100;
            $price = $row['beat_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['beat_basic_amount'];
        }

        $freeFile = $row["beat_free_file"];
        ?>
                            <div class="col-xl-3 col-md-4 col-sm-6">


                                <div class="product-item " data-type="beat"
                                    data-id="<?= $beatId; ?>">






                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">
                                            <?php
                                if ($row['beat_category'] == "Premium") {
                                    ?>
                                            <span
                                                class="btn btn-success position-absolute m-1 btn-sm"><?= $row['beat_category']; ?></span>
                                            <?php
                                } else {
                                    ?>
                                            <span
                                                class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['beat_category']; ?></span>
                                            <?php
                                }
        ?>
                                            <img class="primary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a data-tippy="Play"
                                                        data-id="<?= $row['beat_id']; ?>"
                                                        class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <?php
            if ($row['beat_basic_amount'] != "") {
                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$beatId'";
                $result1 = mysqli_query($conn, $query1);
                $test = mysqli_num_rows($result1) == 1;
                if ($test) {
                    ?>

                                                <li>
                                                    <a class="add-to-cart " data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['beat_name'] ?>"
                                                        data-type="Beat"
                                                        data-image="<?= $row['beat_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['beat_id']; ?>">
                                                        <i class="pe-7s-cart cart-list-active"></i>
                                                    </a>
                                                </li>
                                                <?php
                } else {
                    ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['beat_name'] ?>"
                                                        data-type="Beat"
                                                        data-image="<?= $row['beat_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['beat_id']; ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <?php
                }
                ?>

                                                <?php
            } else {
                ?>
                                                <li>
                                                    <a class="download add-to-cart" data-tippy="Download"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                        download="<?= $row['beat_name']; ?>">
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
                                                if ($row['beat_basic_file'] != "") {
                                                    $price = "$" . $price;
                                                    ?>
                                        <audio
                                            src="./admin/Files/beat/<?= $row['beat_basic_file']; ?>"
                                            loop></audio>
                                        <?php
                                                } else {
                                                    $price = $price;
                                                    ?>
                                        <audio
                                            src="./admin/Files/beat/<?= $row['beat_free_file']; ?>"
                                            loop></audio>
                                        <?php
                                                }
        ?>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="shop.html"><?= $row['beat_name']; ?></a>
                                        <div class="price-box pb-1 d-flex align-items-center">
                                            <?php
            if ($row['discount'] != "") {
                ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
                                            <span style="font-size: 14px;"
                                                class="old-price"><del><?= '$' . $row['beat_basic_amount']; ?></del></span>
                                            <?php
            } else {
                ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>



                        </div>
                    </div>
                    <div class="tab-pane fade"
                        id="<?= $selector; ?>-Free" role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-Free-tab">
                        <div class="product-item-wrap row">
                            <?php
$location = "beat";
if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_beat WHERE purchase_status='Free'  AND  CONCAT (`beat_name`,`beat_category`)   REGEXP '$Search'";
} else {
    $query = "SELECT * FROM add_beat WHERE purchase_status='Free' ORDER BY id DESC LIMIT $limit";
}


$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $freeFile = $row["beat_free_file"];
        $beatId = $row["beat_id"];
        ?>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="product-item " data-type="beat"
                                    data-id="<?= $beatId; ?>">
                                    <input type="text" hidden id="beat-id"
                                        value="<?= $row['beat_id']; ?>">

                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">

                                            <span
                                                class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['beat_category']; ?></span>

                                            <img class="primary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                        data-id="<?= $beatId ?>">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="download add-to-cart" data-tippy="Download"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                        download="<?= $row['beat_name']; ?>">
                                                        <i class="pe-7s-download"></i>
                                                    </a>
                                                </li>
                                                </a>

                                            </ul>
                                        </div>

                                        <audio
                                            src="./admin/Files/beat/<?= $row['beat_free_file']; ?>"
                                            loop></audio>

                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="shop.html"><?= $row['beat_name']; ?></a>

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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>





                        </div>
                    </div>
                    <div class="tab-pane fade"
                        id="<?= $selector; ?>-Premium"
                        role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-Premium-tab">
                        <div class="product-item-wrap row">
                            <?php
$location = "beat";

if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_beat WHERE purchase_status='Not Sold' AND CONCAT (`beat_name`,`beat_category`)  REGEXP '$Search'";
} else {
    $query = "SELECT * FROM add_beat WHERE purchase_status='Not Sold' ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['beat_basic_amount'] * ($row['discount']) / 100;
            $price = $row['beat_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['beat_basic_amount'];
        }

        $beatId = $row["beat_id"];


        $freeFile = $row["beat_free_file"];
        ?>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="product-item " data-type="beat"
                                    data-id="<?= $beatId; ?>">
                                    <input type="text" hidden id="beat-id"
                                        value="<?= $row['beat_id']; ?>">

                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">

                                            <span
                                                class="btn btn-success position-absolute m-1 btn-sm"><?= $row['beat_category']; ?></span>

                                            <img class="primary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/beat/<?= $row['beat_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true"
                                                        data-id="<?= $beatId ?>"
                                                        data-tippy-theme="sharpborder">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>

                                                <?php
                                    $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$beatId'";
        $result1 = mysqli_query($conn, $query1);
        $test = mysqli_num_rows($result1) == 1;
        if ($test) {
            ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['beat_name'] ?>"
                                                        data-type="Beat"
                                                        data-image="<?= $row['beat_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['beat_id']; ?>">
                                                        <i class="pe-7s-cart cart-list-active"></i>
                                                    </a>
                                                </li>
                                                <?php
        } else {
            ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['beat_name'] ?>"
                                                        data-type="Beat"
                                                        data-image="<?= $row['beat_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['beat_id']; ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <?php
        }
        ?>

                                            </ul>
                                        </div>

                                        <audio
                                            src="./admin/Files/beat/<?= $row['beat_basic_file']; ?>"
                                            loop></audio>

                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="shop.html"><?= $row['beat_name']; ?></a>
                                        <div class="price-box pb-1 d-flex align-items-center">
                                            <?php
                                                    $price = "$" . $price;
        if ($row['discount'] != "") {
            ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
                                            <span style="font-size: 14px;"
                                                class="old-price"><del><?= '$' . $row['beat_basic_amount']; ?></del></span>
                                            <?php
        } else {
            ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Beat Store End Here -->

<!-- Sample Pack starts here -->
<?php
$selector = "sample";
?>
<div class="product-area section-space-top-100">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-title mb-0">Sample Packs</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active"
                            id="<?= $selector; ?>-all-tab"
                            data-bs-toggle="tab"
                            href="#<?= $selector; ?>-all" role="tab"
                            aria-controls="<?= $selector; ?>-all"
                            aria-selected="true">
                            All
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="<?= $selector; ?>-Free-tab"
                            data-bs-toggle="tab"
                            href="#<?= $selector; ?>-Free" role="tab"
                            aria-controls="<?= $selector; ?>-Free"
                            aria-selected="false">
                            Free
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="latest-tab" data-bs-toggle="tab"
                            href="#<?= $selector; ?>-Premium"
                            role="tab"
                            aria-controls="<?= $selector; ?>-Premium"
                            aria-selected="false">
                            Premium
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active"
                        id="<?= $selector; ?>-all" role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-all-tab">
                        <div class="product-item-wrap row">
                            <?php
                            $location = "sample";
if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_sample WHERE  CONCAT (`sample_name`,`sample_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_sample  ORDER BY id DESC LIMIT $limit";
}




$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['sample_amount'] * ($row['discount']) / 100;
            $price = $row['sample_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['sample_amount'];
        }
        $sampleId = $row["sample_id"];

        $freeFile = $row["sample_file"];
        ?>
                            <audio></audio>
                            <div class="col-xl-3 col-md-4 col-sm-6">

                                <div class="product-item " data-type="sample"
                                    data-id="<?= $sampleId; ?>">
                                    <input type="text" hidden id="beat-id"
                                        value="<?= $row['sample_id']; ?>">





                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">
                                            <?php
                                if ($row['sample_category'] == "Premium") {
                                    ?>
                                            <span
                                                class="btn btn-success position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>

                                            <?php
                                } else {
                                    ?>
                                            <span
                                                class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>
                                            <?php
                                }
        ?>
                                            <img class="primary-img"
                                                src="./admin/Files/sample/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/sample/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li hidden>
                                                    <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>

                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <?php
            if ($row['sample_amount'] != "") {
                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$sampleId'";
                $result1 = mysqli_query($conn, $query1);
                $test = mysqli_num_rows($result1) == 1;
                if ($test) {
                    ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['sample_name'] ?>"
                                                        data-type="sample"
                                                        data-image="<?= $row['sample_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['sample_id']; ?>">
                                                        <i class="pe-7s-cart cart-list-active"></i>
                                                    </a>
                                                </li>
                                                <?php
                } else {
                    ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['sample_name'] ?>"
                                                        data-type="sample"
                                                        data-image="<?= $row['sample_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['sample_id']; ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <?php
                }
                ?>

                                                <?php
            } else {
                $explode = explode(".", $freeFile)[1];

                ?>
                                                <li>
                                                    <a class="download add-to-cart" data-tippy="Download"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                        download="<?= $row['sample_name']; ?>.<?php print_r($explode); ?>">
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
                                        <a class="product-name w-100"
                                            href="shop.html"><?= $row['sample_name']; ?></a>
                                        <div class="price-box pb-1 d-flex align-items-center">
                                            <?php
            if ($row['discount'] != "") {
                ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
                                            <span style="font-size: 14px;"
                                                class="old-price"><del><?= '$' . $row['sample_amount']; ?></del></span>
                                            <?php
            } else {
                ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>




                        </div>
                    </div>

                    <div class="tab-pane fade"
                        id="<?= $selector; ?>-Free" role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-Free-tab">
                        <div class="product-item-wrap row">
                            <?php
$location = "sample";


if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_sample WHERE sample_category='Free' AND CONCAT (`sample_name`,`sample_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_sample WHERE sample_category='Free' ORDER BY id DESC LIMIT $limit";
}




$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $freeFile = $row["sample_file"];
        ?>
                            <audio></audio>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="product-item "
                                    data-type="<?= $location; ?>">
                                    <input type="text" hidden id="beat-id"
                                        value="<?= $row['sample_id']; ?>">

                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">

                                            <span
                                                class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>

                                            <img class="primary-img"
                                                src="./admin/Files/<?= $location; ?>/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/<?= $location; ?>/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li hidden>
                                                    <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <?php
                                    $explode = explode(".", $freeFile)[1];
        ?>
                                                <li>
                                                    <a class="download add-to-cart" data-tippy="Download"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                        download="<?= $row['sample_name']; ?>.<?php print_r($explode); ?>">

                                                        <i class="pe-7s-download"></i>
                                                    </a>
                                                </li>
                                                </a>

                                            </ul>
                                        </div>



                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="shop.html"><?= $row['sample_name']; ?></a>

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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>


                        </div>
                    </div>

                    <div class="tab-pane fade"
                        id="<?= $selector; ?>-Premium"
                        role="tabpanel"
                        aria-labelledby="<?= $selector; ?>-Premium-tab">
                        <div class="product-item-wrap row">
                            <?php
$location = "sample";


$result = mysqli_query($conn, $query);
if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_sample WHERE sample_category='Premium' AND CONCAT (`sample_name`,`sample_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_sample WHERE sample_category='Premium' ORDER BY id DESC LIMIT $limit";
}




$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['sample_amount'] * ($row['discount']) / 100;
            $price = $row['sample_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['sample_amount'];
        }
        $sampleId = $row["sample_id"];


        $freeFile = $row["sample_file"];
        ?>
                            <audio></audio>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="product-item "
                                    data-type="<?= $selector; ?>"
                                    data-id="<?= $sampleId; ?>">
                                    <input type="text" hidden id="beat-id"
                                        value="<?= $row['sample_id']; ?>">

                                    <input type="text" hidden class="product-details">
                                    <div class="product-img">
                                        <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                            style="cursor:pointer;">

                                            <span
                                                class="btn btn-success position-absolute m-1 btn-sm"><?= $row['sample_category']; ?></span>

                                            <img class="primary-img"
                                                src="./admin/Files/sample/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                            <img class="secondary-img"
                                                src="./admin/Files/sample/<?= $row['sample_image']; ?>"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li hidden>
                                                    <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="entypo-icon-controller-play"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>

                                                <?php
                                    $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$sampleId'";
        $result1 = mysqli_query($conn, $query1);
        $test = mysqli_num_rows($result1) == 1;
        if ($test) {
            ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['sample_name'] ?>"
                                                        data-type="sample"
                                                        data-image="<?= $row['sample_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['sample_id']; ?>">
                                                        <i class="pe-7s-cart cart-list-active"></i>
                                                    </a>
                                                </li>
                                                <?php
        } else {
            ?>
                                                <li>
                                                    <a class="add-to-cart" data-tippy="Add to cart"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-name="<?= $row['sample_name'] ?>"
                                                        data-type="sample"
                                                        data-image="<?= $row['sample_image']; ?>"
                                                        data-price="<?= $price; ?>"
                                                        data-id="<?= $row['sample_id']; ?>">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <?php
        }
        ?>

                                            </ul>
                                        </div>



                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="shop.html"><?= $row['sample_name']; ?></a>
                                        <div class="price-box pb-1 d-flex align-items-center">
                                            <?php
                                                    if ($row['discount'] != "") {
                                                        $price = "$" . $price;
                                                        ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
                                            <span style="font-size: 14px;"
                                                class="old-price"><del><?= '$' . $row['sample_amount']; ?></del></span>
                                            <?php
                                                    } else {
                                                        $price = "$" . $price;
                                                        ?>
                                            <span
                                                class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                            <h1 class="text-center">No Search Results Found..</h1>
                            <?php
    } else {
        ?>
                            <h1 class="text-center">No Items Found..</h1>
                            <?php
    }
}
?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sample Pack ends here -->
    <!-- Lyrics starts here -->
    <?php
    $selector = "lyrics";
?>
    <div class="product-area section-space-top-100">
        <div class="container">
            <div class="section-title-wrap">
                <h2 class="section-title mb-0">Lyrics Store</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active"
                                id="<?= $selector; ?>-all-tab"
                                data-bs-toggle="tab"
                                href="#<?= $selector; ?>-all"
                                role="tab"
                                aria-controls="<?= $selector; ?>-all"
                                aria-selected="true">
                                All
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="<?= $selector; ?>-Free-tab"
                                data-bs-toggle="tab"
                                href="#<?= $selector; ?>-Free"
                                role="tab"
                                aria-controls="<?= $selector; ?>-Free"
                                aria-selected="false">
                                Free
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="latest-tab" data-bs-toggle="tab"
                                href="#<?= $selector; ?>-Premium"
                                role="tab"
                                aria-controls="<?= $selector; ?>-Premium"
                                aria-selected="false">
                                Premium
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent"
                        id="<?= $selector; ?>">
                        <div class="tab-pane fade show active"
                            id="<?= $selector; ?>-all"
                            role="tabpanel"
                            aria-labelledby="<?= $selector; ?>-all-tab">
                            <div class="product-item-wrap row">
                                <?php
                            $location = "lyrics";


$result = mysqli_query($conn, $query);

if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_lyrics WHERE CONCAT (`lyrics_name`,`lyrics_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_lyrics  ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['lyrics_basic_amount'] * ($row['discount']) / 100;
            $price = $row['lyrics_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['lyrics_basic_amount'];
        }

        $lyricsId = $row["lyrics_id"];

        $freeFile = $row["lyrics_file"];
        ?>
                                <audio></audio>
                                <div class="col-xl-3 col-md-4 col-sm-6">

                                    <div class="product-item "
                                        data-type="<?= $selector; ?>"
                                        data-id="<?= $lyricsId; ?>">
                                        <input type="text" hidden id="beat-id"
                                            value="<?= $row['lyrics_id']; ?>">





                                        <input type="text" hidden class="product-details">
                                        <div class="product-img">
                                            <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                style="cursor:pointer;">
                                                <?php
                                if ($row['lyrics_category'] == "Premium") {
                                    ?>
                                                <span
                                                    class="btn btn-success position-absolute m-1 btn-sm"><?= $row['lyrics_category']; ?></span>
                                                <?php
                                } else {
                                    ?>
                                                <span
                                                    class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['lyrics_category']; ?></span>
                                                <?php
                                }
        ?>
                                                <img class="primary-img"
                                                    src="./admin/Files/lyrics/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                                <img class="secondary-img"
                                                    src="./admin/Files/lyrics/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li hidden>
                                                        <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="entypo-icon-controller-play"></i>
                                                        </a>
                                                    </li>

                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <?php
            if ($row['lyrics_basic_amount'] != "") {
                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$lyricsId'";
                $result1 = mysqli_query($conn, $query1);
                $test = mysqli_num_rows($result1) == 1;
                if ($test) {
                    ?>
                                                    <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            data-name="<?= $row['lyrics_name'] ?>"
                                                            data-type="<?= $selector; ?>"
                                                            data-image="<?= $row['lyrics_image']; ?>"
                                                            data-price="<?= $price; ?>"
                                                            data-id="<?= $row['lyrics_id']; ?>">
                                                            <i class="pe-7s-cart cart-list-active"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                } else {
                    ?>
                                                    <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            data-name="<?= $row['lyrics_name'] ?>"
                                                            data-type="<?= $selector; ?>"
                                                            data-image="<?= $row['lyrics_image']; ?>"
                                                            data-price="<?= $price; ?>"
                                                            data-id="<?= $row['lyrics_id']; ?>">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                }
            } else {
                $explode = explode(".", $freeFile)[1];

                ?>
                                                    <li>
                                                        <a class="download add-to-cart" data-tippy="Download"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                            download="<?= $row['lyrics_name']; ?>.<?php print_r($explode); ?>">
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
                                                    if ($row['lyrics_basic_amount'] != "") {
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
                                            <a class="product-name w-100"
                                                href="shop.html"><?= $row['lyrics_name']; ?></a>
                                            <div class="price-box pb-1 d-flex align-items-center">
                                                <?php
            if ($row['discount'] != "") {
                ?>
                                                <span
                                                    class="new-price"><?= $price; ?></span>
                                                <span style="font-size: 14px;"
                                                    class="old-price"><del><?= '$' . $row['lyrics_basic_amount']; ?></del></span>
                                                <?php
            } else {
                ?>
                                                <span
                                                    class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                <h1 class="text-center">No Search Results Found..</h1>
                                <?php
    } else {
        ?>
                                <h1 class="text-center">No Items Found..</h1>
                                <?php
    }
}
?>


                            </div>
                        </div>

                        <div class="tab-pane fade"
                            id="<?= $selector; ?>-Free"
                            role="tabpanel"
                            aria-labelledby="<?= $selector; ?>-Free-tab">
                            <div class="product-item-wrap row">
                                <?php
$location = "lyrics";



if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_lyrics WHERE lyrics_category='Free' AND CONCAT (`lyrics_name`,`lyrics_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_lyrics WHERE lyrics_category='Free' ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $freeFile = $row["lyrics_file"];
        ?>
                                <audio></audio>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item "
                                        data-type="<?= $location; ?>">
                                        <input type="text" hidden id="beat-id"
                                            value="<?= $row['lyrics_id']; ?>">

                                        <input type="text" hidden class="product-details">
                                        <div class="product-img">
                                            <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                style="cursor:pointer;">

                                                <span
                                                    class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['lyrics_category']; ?></span>

                                                <img class="primary-img"
                                                    src="./admin/Files/<?= $location; ?>/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                                <img class="secondary-img"
                                                    src="./admin/Files/<?= $location; ?>/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li hidden>
                                                        <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="entypo-icon-controller-play"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                                    $explode = explode(".", $freeFile)[1];
        ?>
                                                    <li>
                                                        <a class="download add-to-cart" data-tippy="Download"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                            download="<?= $row['lyrics_name']; ?>.<?php print_r($explode); ?>">

                                                            <i class="pe-7s-download"></i>
                                                        </a>
                                                    </li>
                                                    </a>

                                                </ul>
                                            </div>



                                        </div>
                                        <div class="product-content">
                                            <a class="product-name"
                                                href="shop.html"><?= $row['lyrics_name']; ?></a>

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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                <h1 class="text-center">No Search Results Found..</h1>
                                <?php
    } else {
        ?>
                                <h1 class="text-center">No Items Found..</h1>
                                <?php
    }
}
?>


                            </div>
                        </div>

                        <div class="tab-pane fade"
                            id="<?= $selector; ?>-Premium"
                            role="tabpanel"
                            aria-labelledby="<?= $selector; ?>-Premium-tab">
                            <div class="product-item-wrap row">
                                <?php
$location = "lyrics";


$result = mysqli_query($conn, $query);

if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_lyrics WHERE purchase_status='Not Sold' AND CONCAT (`lyrics_name`,`lyrics_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_lyrics WHERE purchase_status='Not Sold' ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['lyrics_basic_amount'] * ($row['discount']) / 100;
            $price = $row['lyrics_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['lyrics_basic_amount'];
        }

        $lyricsId = $row["lyrics_id"];

        $freeFile = $row["lyrics_file"];
        ?>
                                <audio></audio>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item "
                                        data-type="<?= $selector; ?>"
                                        data-id="<?= $lyricsId; ?>">
                                        <input type="text" hidden id="beat-id"
                                            value="<?= $row['lyrics_id']; ?>">

                                        <input type="text" hidden class="product-details">
                                        <div class="product-img">
                                            <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                style="cursor:pointer;">

                                                <span
                                                    class="btn btn-success position-absolute m-1 btn-sm"><?= $row['lyrics_category']; ?></span>

                                                <img class="primary-img"
                                                    src="./admin/Files/lyrics/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                                <img class="secondary-img"
                                                    src="./admin/Files/lyrics/<?= $row['lyrics_image']; ?>"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li hidden>
                                                        <a data-tippy="Play" class="play" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="entypo-icon-controller-play"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>

                                                    <?php
                                    $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$lyricsId'";
        $result1 = mysqli_query($conn, $query1);
        $test = mysqli_num_rows($result1) == 1;
        if ($test) {
            ?>
                                                    <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            data-name="<?= $row['lyrics_name'] ?>"
                                                            data-type="lyrics"
                                                            data-image="<?= $row['lyrics_image']; ?>"
                                                            data-price="<?= $price; ?>"
                                                            data-id="<?= $row['lyrics_id']; ?>">
                                                            <i class="pe-7s-cart cart-list-active"></i>
                                                        </a>
                                                    </li>
                                                    <?php
        } else {
            ?>
                                                    <li>
                                                        <a class="add-to-cart" data-tippy="Add to cart"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"
                                                            data-name="<?= $row['lyrics_name'] ?>"
                                                            data-type="lyrics"
                                                            data-image="<?= $row['lyrics_image']; ?>"
                                                            data-price="<?= $price; ?>"
                                                            data-id="<?= $row['lyrics_id']; ?>">
                                                            <i class="pe-7s-cart "></i>
                                                        </a>
                                                    </li>
                                                    <?php
        }
        ?>

                                                </ul>
                                            </div>



                                        </div>
                                        <div class="product-content">
                                            <a class="product-name"
                                                href="shop.html"><?= $row['lyrics_name']; ?></a>
                                            <div class="price-box pb-1 d-flex align-items-center">
                                                <?php
                                                        if ($row['discount'] != "") {
                                                            $price = "$" . $price;
                                                            ?>
                                                <span
                                                    class="new-price"><?= $price; ?></span>
                                                <span style="font-size: 14px;"
                                                    class="old-price"><del><?= '$' . $row['lyrics_basic_amount']; ?></del></span>
                                                <?php
                                                        } else {
                                                            $price = "$" . $price;
                                                            ?>
                                                <span
                                                    class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                <h1 class="text-center">No Search Results Found..</h1>
                                <?php
    } else {
        ?>
                                <h1 class="text-center">No Items Found..</h1>
                                <?php
    }
}
?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lyrics  ends here -->
        <?php
        $selector = "song";
?>
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title mb-0">Song Hub</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active"
                                    id="<?= $selector; ?>-all-tab"
                                    data-bs-toggle="tab"
                                    href="#<?= $selector; ?>-all"
                                    role="tab"
                                    aria-controls="<?= $selector; ?>-all"
                                    aria-selected="true">
                                    All
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="<?= $selector; ?>-Free-tab"
                                    data-bs-toggle="tab"
                                    href="#<?= $selector; ?>-Free"
                                    role="tab"
                                    aria-controls="<?= $selector; ?>-Free"
                                    aria-selected="false">
                                    Free
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="latest-tab" data-bs-toggle="tab"
                                    href="#<?= $selector; ?>-Premium"
                                    role="tab"
                                    aria-controls="<?= $selector; ?>-Premium"
                                    aria-selected="false">
                                    Premium
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active"
                                id="<?= $selector; ?>-all"
                                role="tabpanel"
                                aria-labelledby="<?= $selector; ?>-all-tab">
                                <div class="product-item-wrap row">
                                    <?php
                            $location = "song";



if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_song WHERE purchase_status='Not Sold' AND CONCAT (`song_name`,`song_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_song WHERE purchase_status='Not Sold' || purchase_status='Free'  ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['song_basic_amount'] * ($row['discount']) / 100;
            $price = $row['song_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['song_basic_amount'];
        }
        $songId = $row["song_id"];

        $freeFile = $row["song_file"];
        ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6">

                                        <div class="product-item " data-type="song"
                                            data-id="<?= $songId; ?>">
                                            <input type="text" hidden id="beat-id"
                                                value="<?= $row['song_id']; ?>">



                                            <input type="text" hidden class="product-details">
                                            <div class="product-img">
                                                <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                    style="cursor:pointer;">
                                                    <?php
                                if ($row['song_category'] == "Premium") {
                                    ?>
                                                    <span
                                                        class="btn btn-success position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>
                                                    <?php
                                } else {
                                    ?>
                                                    <span
                                                        class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>
                                                    <?php
                                }
        ?>
                                                    <img class="primary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                    <img class="secondary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a data-tippy="Play" class="play"
                                                                data-id="<?= $songId; ?>"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="entypo-icon-controller-play"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal"
                                                            data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <?php
            if ($row['song_basic_amount'] != "") {
                $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$songId'";
                $result1 = mysqli_query($conn, $query1);
                $test = mysqli_num_rows($result1) == 1;
                if ($test) {
                    ?>
                                                        <li>
                                                            <a class="add-to-cart" data-tippy="Add to cart"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                data-name="<?= $row['song_name'] ?>"
                                                                data-type="song"
                                                                data-image="<?= $row['song_image']; ?>"
                                                                data-price="<?= $price; ?>"
                                                                data-id="<?= $row['song_id']; ?>">
                                                                <i class="pe-7s-cart cart-list-active"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                } else {
                    ?>
                                                        <li>
                                                            <a class="add-to-cart" data-tippy="Add to cart"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                data-name="<?= $row['song_name'] ?>"
                                                                data-type="song"
                                                                data-image="<?= $row['song_image']; ?>"
                                                                data-price="<?= $price; ?>"
                                                                data-id="<?= $row['song_id']; ?>">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                }
            } else {
                ?>
                                                        <li>
                                                            <a class="download add-to-cart" data-tippy="Download"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                href="./admin/Files/<?= $location; ?>/<?= $freeFile; ?>"
                                                                download="<?= $row['song_name']; ?>">
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
                                                <audio
                                                    src="./admin/Files/song/<?= $row['song_preview']; ?>"
                                                    loop></audio>
                                                <?php
                                                        } else {
                                                            $price = "";
                                                            ?>
                                                <audio
                                                    src="./admin/Files/song/<?= $row['song_preview']; ?>"
                                                    loop></audio>
                                                <?php
                                                        }
        ?>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name"
                                                    href="shop.html"><?= $row['song_name']; ?></a>
                                                <div class="price-box pb-1 d-flex align-items-center">
                                                    <?php
            if ($row['discount'] != "") {
                ?>
                                                    <span
                                                        class="new-price"><?= $price; ?></span>
                                                    <span style="font-size: 14px;"
                                                        class="old-price"><del><?= '$' . $row['song_basic_amount']; ?></del></span>
                                                    <?php
            } else {
                ?>
                                                    <span
                                                        class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                    <h1 class="text-center">No Search Results Found..</h1>
                                    <?php
    } else {
        ?>
                                    <h1 class="text-center">No Items Found..</h1>
                                    <?php
    }
}
?>


                                </div>
                            </div>
                            <div class="tab-pane fade"
                                id="<?= $selector; ?>-Free"
                                role="tabpanel"
                                aria-labelledby="<?= $selector; ?>-Free-tab">
                                <div class="product-item-wrap row">
                                    <?php
$location = "song";


if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_song WHERE purchase_status='Free' AND CONCAT (`song_name`,`song_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_song WHERE purchase_status='Free' ORDER BY id DESC LIMIT $limit";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $freeFile = $row["song_file"];
        ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item " data-type="song"
                                            data-id="<?= $row['song_id']; ?>">
                                            <input type="text" hidden id="beat-id"
                                                value="<?= $row['song_id']; ?>">

                                            <input type="text" hidden class="product-details">
                                            <div class="product-img">
                                                <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                    style="cursor:pointer;">

                                                    <span
                                                        class="btn btn-warning text-white position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>

                                                    <img class="primary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                    <img class="secondary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a data-tippy="Play" class="play"
                                                                data-id="<?= $row['song_id']; ?>"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="entypo-icon-controller-play"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal"
                                                            data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>

                                                        <?php
                                    $explode = explode(".", $freeFile)[1];
        ?>
                                                        <li>
                                                            <a class="download add-to-cart" data-tippy="Download"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                href="./admin/Files/song/<?= $freeFile; ?>"
                                                                download="<?= $row['song_name']; ?>.<?php print_r($explode); ?>">

                                                                <i class="pe-7s-download"></i>
                                                            </a>
                                                        </li>
                                                        </a>

                                                    </ul>
                                                </div>

                                                <audio
                                                    src="./admin/Files/song/<?= $row['song_preview']; ?>"
                                                    loop></audio>

                                            </div>
                                            <div class="product-content">
                                                <a class="product-name"
                                                    href="shop.html"><?= $row['song_name']; ?></a>

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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                    <h1 class="text-center">No Search Results Found..</h1>
                                    <?php
    } else {
        ?>
                                    <h1 class="text-center">No Items Found..</h1>
                                    <?php
    }
}
?>


                                </div>
                            </div>
                            <div class="tab-pane fade"
                                id="<?= $selector; ?>-Premium"
                                role="tabpanel"
                                aria-labelledby="<?= $selector; ?>-Premium-tab">
                                <div class="product-item-wrap row">
                                    <?php
$location = "song";


if (isset($_GET["Search"])) {
    $query = "SELECT * FROM add_song WHERE purchase_status='Not Sold' AND CONCAT (`song_name`,`song_category`) REGEXP '$Search'  ORDER BY id DESC LIMIT $limit";
} else {
    $query = "SELECT * FROM add_song WHERE purchase_status='Not Sold' ORDER BY id DESC LIMIT $limit";
}


$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['discount'] != "") {
            $amount = $row['song_basic_amount'] * ($row['discount']) / 100;
            $price = $row['song_basic_amount'] - $amount;
            $price = number_format($price, 2);
        } else {
            $price = $row['song_basic_amount'];
        }
        $songId = $row["song_id"];
        $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$songId'";
        $cartid = "";
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_assoc($result1);
            $cartid = $row1["cart_id"];
        }
        $freeFile = $row["song_file"];
        ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item " data-type="song"
                                            data-id="<?= $songId; ?>">
                                            <input type="text" hidden id="beat-id"
                                                value="<?= $row['song_id']; ?>">

                                            <input type="text" hidden class="product-details">
                                            <div class="product-img">
                                                <a data-bs-toggle="modal" class="beat" data-bs-target="#quickModal"
                                                    style="cursor:pointer;">

                                                    <span
                                                        class="btn btn-success position-absolute m-1 btn-sm"><?= $row['song_category']; ?></span>

                                                    <img class="primary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                    <img class="secondary-img"
                                                        src="./admin/Files/song/<?= $row['song_image']; ?>"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a data-tippy="Play"
                                                                data-id="<?= $row['song_id']; ?>"
                                                                class="play" data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="entypo-icon-controller-play"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal"
                                                            data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>

                                                        <?php
                                    $query1 = "SELECT * FROM add_cart WHERE user_id='$user' && cart_id='$songId'";
        $result1 = mysqli_query($conn, $query1);
        $test = mysqli_num_rows($result1) == 1;
        if ($test) {
            ?>

                                                        <li>
                                                            <a class="add-to-cart" data-tippy="Add to cart"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                data-name="<?= $row['song_name'] ?>"
                                                                data-type="song"
                                                                data-image="<?= $row['song_image']; ?>"
                                                                data-price="<?= $price; ?>"
                                                                data-id="<?= $row['song_id']; ?>">
                                                                <i class="pe-7s-cart cart-list-active"></i>
                                                            </a>
                                                        </li>
                                                        <?php
        } else {
            ?>
                                                        <li>
                                                            <a class="add-to-cart" data-tippy="Add to cart"
                                                                data-tippy-inertia="true"
                                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                                data-name="<?= $row['song_name'] ?>"
                                                                data-type="song"
                                                                data-image="<?= $row['song_image']; ?>"
                                                                data-price="<?= $price; ?>"
                                                                data-id="<?= $row['song_id']; ?>">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <?php
        }
        ?>

                                                    </ul>
                                                </div>

                                                <audio
                                                    src="./admin/Files/song/<?= $row['song_preview']; ?>"
                                                    loop></audio>

                                            </div>
                                            <div class="product-content">
                                                <a class="product-name"
                                                    href="shop.html"><?= $row['song_name']; ?></a>
                                                <div class="price-box pb-1 d-flex align-items-center">
                                                    <?php
                                                            $price = "$" . $price;
        if ($row['discount'] != "") {
            ?>
                                                    <span
                                                        class="new-price"><?= $price; ?></span>
                                                    <span style="font-size: 14px;"
                                                        class="old-price"><del><?= '$' . $row['song_amount']; ?></del></span>
                                                    <?php
        } else {
            ?>
                                                    <span
                                                        class="new-price"><?= $price; ?></span>
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
} else {
    if (isset($_GET["Search"])) {
        ?>
                                    <h1 class="text-center">No Search Results Found..</h1>
                                    <?php
    } else {
        ?>
                                    <h1 class="text-center">No Items Found..</h1>
                                    <?php
    }
}
?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Song Hub End Here -->

        <script>
            let leaseTypes = {
                basic: ["$10.00 - $20.00", "Mp3 Version", "5000 Max. Sales ", "Producer / Song writer owns right",
                    "Commercial use", "Non-Exclusive"
                ],

                exclusive: ["$20.00 - $30.00", "Mp3 / Wav Version", "10000 Max. Sales ",
                    "Producer / Song Writer owns right", "Commercial use", "Non-Exclusive"
                ],

                premium: ["$30.00 - $50.00", "Mp3 / Wav / Stems Version", "Unlimited Max. Sales ",
                    "100% Royalty Free",
                    "Commercial use", "Non-Exclusive"
                ]

            }
            let shippingContents = document.querySelectorAll(".shipping-content");

            function addLeaseTypes(leaseType, shippingContent) {
                leaseType.forEach(item => {
                    let p = document.createElement("p");
                    p.classList.add("short-desc");
                    p.innerHTML = item
                    shippingContent.append(p)
                })
            }
            let i = 0;
            for (property in leaseTypes) {
                addLeaseTypes(leaseTypes[property], shippingContents[i]);
                i++;
            }
        </script>

        <?php
        require_once("./includes/footer.php");
?>


    </div>




    </body>

    </html>