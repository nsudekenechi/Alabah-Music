<?php
require_once("./admin/db/config.php");
if (!isset($_COOKIE["user"])) {
    $user = "user".rand(0, 1000);
    $time = strtotime("1 year");
    setcookie("user", $user, $time, "/");
    session_start();
    $_SESSION["user"] = $user;

    $query = "INSERT INTO `add_user`( `user_id`) VALUES ('$user')";
    $result = mysqli_query($conn, $query);
}
if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
} else {
    $user = $_SESSION["user"];
}

$query = "SELECT * FROM add_cart WHERE user_id='$user'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
// Redirecting user if they try to access download page without paying
if ($title == "Download page") {
    $reference = $_GET["reference"];
    $query = "SELECT * FROM view_sold WHERE reference_id='$reference'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <= 0) {
        header("Location:./index.php");
    }
}

if ($title != "About us" && $title != "Thank You" && $title != "Contact Us" && $title != "Download page") {
    if ($title != "Home") {
        //    12 Items perpage for webpages that are not home page and 8 Items for Homepage
        $perPage = 12;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        // Displaying items if user tries to search
        if (isset($_GET["Search"])) {
            $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
            extract($GET);

            if ($title == "Beat Store") {
                $countQuery = "SELECT * FROM add_beat WHERE CONCAT (`beat_name`,`beat_category`) REGEXP '$Search'";
                $itemquery = "SELECT * FROM add_beat WHERE CONCAT (`beat_name`,`beat_category`) REGEXP '$Search' LIMIT $start,$perPage";
            } elseif ($title == "Sample Pack") {
                $countQuery = "SELECT * FROM add_sample WHERE CONCAT (`sample_name`,`sample_category`) REGEXP '$Search'";
                $itemquery = "SELECT * FROM add_sample WHERE CONCAT (`sample_name`,`sample_category`) REGEXP '$Search' LIMIT $start,$perPage";
            } elseif ($title == "Lyrics Store") {
                $countQuery = "SELECT * FROM add_lyrics WHERE CONCAT (`lyrics_name`,`lyrics_category`) REGEXP '$Search'";
                $itemquery = "SELECT * FROM add_lyrics WHERE CONCAT (`lyrics_name`,`lyrics_category`) REGEXP '$Search' LIMIT $start,$perPage";
            } elseif ($title == "Song Hub") {
                $countQuery = "SELECT * FROM add_song WHERE CONCAT (`song_name`,`song_category`) REGEXP '$Search'";
                $itemquery = "SELECT * FROM add_song WHERE CONCAT (`song_name`,`song_category`) REGEXP '$Search' LIMIT $start,$perPage";
            }
        } else {
            // Displaying items if user doesnt tries to search
            if ($title == "Beat Store") {
                $countQuery = "SELECT * FROM add_beat";
                $itemquery = "SELECT * FROM add_beat LIMIT $start,$perPage";
            } elseif ($title == "Sample Pack") {
                $countQuery = "SELECT * FROM add_sample";
                $itemquery = "SELECT * FROM add_sample LIMIT $start,$perPage";
            } elseif ($title == "Lyrics Store") {
                $countQuery = "SELECT * FROM add_lyrics ";
                $itemquery = "SELECT * FROM add_lyrics  LIMIT $start,$perPage";
            } elseif ($title == "Song Hub") {
                $countQuery = "SELECT * FROM add_song ";
                $itemquery = "SELECT * FROM add_song  LIMIT $start,$perPage";
            }
        }

        if ($title != "Checkout") {
            $countResult = mysqli_query($conn, $countQuery);
            $total = mysqli_num_rows($countResult);
            $pages = ceil($total / $perPage);

            $itemresult = mysqli_query($conn, $itemquery);
            $nom = mysqli_num_rows($itemresult);

            if ($nom != $perPage && $perPage == 1) {
                $itemcount = $total - $nom + $nom;
            } else {
                $itemcount  = $page * $nom;
            }
        }
    } else {
        $limit = 8;
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        extract($GET);
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DopeMind Studio || <?= $title; ?></title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Dope">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="Img/logo.png" />

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet" href="assets/css/entypo/style.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/Override.css"> -->

    <style>
        .cart-list-active {
            background-color: #abd373 !important;
            color: white;
        }

        .old-price {
            color: #abd373 !important;
        }

        .main-nav.main-nav-1 ul {
            display: flex;
            justify-content: space-between;
        }

        .main-nav.main-nav-1 ul li {
            padding: 0;
            margin: 0;
        }

        .main-nav.main-nav-1 ul a {
            font-size: 12px;
            padding: 10px 0px !important;
        }

        .main-nav.main-nav-1 ul a:hover {
            text-decoration: none;
            margin: 0;
        }
    </style>

</head>

<body>
    <!-- <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div> -->
    <div class="main-wrapper">
        <input type="text" value="<?=$user;?>" id="user" hidden>
        <!-- Begin Main Header Area -->
        <header class="main-header-area">
            <div class="header-top bg-pronia-primary d-none d-lg-block">

            </div>
            <div class="header-middle py-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap position-relative">
                                <div class="header-contact d-none d-lg-flex">
                                    <i class="pe-7s-call"></i>
                                    <a href="tel://+2348036328814">+234 803 6328 814</a>
                                </div>

                                <!-- <a href="" class="header-logo d-flex  justify-content-center align-items-center"
                                    style="width: 20vw;">
                                    <img src="Img/logo.png" alt="Header Logo" class=" w-50 h-50">
                                </a> -->
                                <a href="" class="header-logo d-flex  justify-content-center align-items-center "
                                    style="width: 100px;height:100px;">
                                    <img src="Img/Logo.jpeg" alt="Header Logo" class=" w-75 h-75"
                                        style="object-fit:contain; border-radius: 50%;">
                                </a>
                                <div class="header-right">
                                    <ul>
                                        <li>
                                            <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>


                                        <li class="minicart-wrap me-3 me-lg-0">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <span
                                                    class="quantity"><?= $count; ?></span>
                                            </a>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-menu position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Home</a>

                                        </li>
                                        <li>
                                            <a href="beatstore.php">Beat Store</a>

                                        </li>
                                        <li>
                                            <a href="samplepack.php">Sample Packs</a>

                                        </li>
                                        <li>
                                            <a href="lyricsstore.php">Lyrics Store</a>

                                        </li>
                                        <li>
                                            <a href="songhub.php">Song Hub</a>

                                        </li>


                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="aboutus.php">About </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-sticky py-4 py-lg-0">
                <div class="container">
                    <div class="header-nav position-relative">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-3  col-6">

                                <a href="" class="header-logo d-flex  justify-content-center align-items-center "
                                    style="width: 100px;height:100px;">
                                    <img src="Img/Logo.jpeg" alt="Header Logo" height="50" width="50"
                                        style="object-fit:contain; border-radius: 50%;">
                                </a>

                            </div>
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav class="main-nav main-nav-1">
                                        <ul class="">
                                            <li>
                                                <a href="index.php">Home</a>

                                            </li>
                                            <li>
                                                <a href="beatstore.php">Beat Store</a>

                                            </li>

                                            <li>
                                                <a href="samplepack.php">Sample Packs</a>

                                            </li>

                                            <li>
                                                <a href="lyricsstore.php">Lyrics Store</a>

                                            </li>
                                            <li>
                                                <a href="songhub.php">Song Hub</a>

                                            </li>

                                            <li>
                                                <a href="contact.php">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="aboutus.php">About </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="header-right">
                                    <ul>
                                        <li>
                                            <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>


                                        <li class="minicart-wrap me-3 me-lg-0">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <span
                                                    class="quantity"><?= $count; ?></span>
                                            </a>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-body">
                    <div class="inner-body">
                        <div class="offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="header-contact offcanvas-contact">
                            <i class="pe-7s-call"></i>
                            <a href="tel://+00-123-456-789">+00 123 456 789</a>
                        </div>
                        <div class="offcanvas-user-info">
                            <ul class="dropdown-wrap">

                                <li>
                                    <a href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="index.php">
                                            <span class="mm-text">Home
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                        </a>

                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="beatstore.php">
                                            <span class="mm-text">Beat Store</span>
                                        </a>

                                    </li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content modal-bg-dark">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away"
                                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-search">
                                <span class="searchbox-info">Start typing and press Enter to search or ESC to
                                    close</span>
                                <form class="hm-searchbox">
                                    <input type="text" name="Search" value="" autocomplete="off">
                                    <button class="search-btn" type="submit" aria-label="searchbtn">
                                        <i class="pe-7s-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="offcanvas-body">
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4 class="mb-0">Shopping Cart</h4>
                            <a href="#" class="button-close"><i class="pe-7s-close" data-tippy="Close"
                                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
                        </div>
                        <ul class="minicart-list">
                            <?php
                            $amount = 0;
$query = "SELECT * FROM add_cart";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["cart_id"];
    if ($row["item_type"] == "beat") {
        $query1 = "SELECT * FROM add_beat WHERE beat_id='$id'";

        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $id = $row1["beat_id"];
        $type = "beat";
        $image = $row1["beat_image"];
        $category = $row1["beat_category"];
        $file = $row1["beat_basic_file"];
        $discount = $row1["discount"];
    } elseif ($row["item_type"] == "sample") {
        $query1 = "SELECT * FROM add_sample WHERE sample_id='$id'";

        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $id = $row1["sample_id"];
        $type = "sample";
        $image = $row1["sample_image"];
        $category = $row1["sample_category"];
        $file = $row1["sample_file"];
        $discount = $row1["discount"];
    } elseif ($row["item_type"] == "lyrics") {
        $query1 = "SELECT * FROM add_lyrics WHERE lyrics_id='$id'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $id = $row1["lyrics_id"];
        $type = "lyrics";
        $image = $row1["lyrics_image"];
        $category = $row1["lyrics_category"];
        $file = $row1["lyrics_file"];
        $discount = $row1["discount"];
    } elseif ($row["item_type"] == "song") {
        $query1 = "SELECT * FROM add_song WHERE song_id='$id'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $id = $row1["song_id"];
        $type = "song";
        $image = $row1["song_image"];
        $category = $row1["song_category"];
        $file = $row1["song_preview"];
        $discount = $row1["discount"];
    }

    $name = $row["item_name"];
    $price = $row["item_amount"];
    ?>
                            <li class="minicart-product new"
                                id="li_<?= $row['cart_id']; ?>"
                                data-type="<?= $row['item_type']; ?>">
                                <a class="product-item_remove"><i class="pe-7s-close" data-tippy="Remove"
                                        data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true"
                                        data-tippy-theme="sharpborder"></i></a>
                                <div data-bs-target=#quickModal data-bs-toggle=modal style='width:100%;' class=d-flex>
                                    <a class="product-item_img" style='height:60px;'>
                                        <img class="img-full"
                                            src="admin/Files/<?= $row['item_type']; ?>/<?= $row['item_image']; ?>"
                                            alt="Product Image" style='height:100%;'>
                                    </a>

                                    <div class="product-item_content">
                                        <a
                                            class="product-item_title"><?= $row['item_name']; ?></a>
                                        <span class="product-item_quantity"
                                            id='product_item'>$<span><?= $row['item_amount']; ?></span></span>
                                        <span class="product-item_lease"
                                            style='font-size:14px;'><?= $row['item_lease_type']; ?></span>
                                    </div>
                                </div>
                            </li>

                            <div class="product-item d-none"
                                data-type="<?= $row['item_type']; ?>"
                                data-id="<?= $id; ?>">
                                <a data-tippy="Play"
                                    data-id="<?= $id; ?>"
                                    class="play" data-tippy-inertia="true" data-tippy-animation="shift-away"
                                    data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                    <i class="entypo-icon-controller-play"></i>
                                </a>
                                <div class="product-item d-none"
                                    data-type="<?= $type; ?>"
                                    data-id="<?= $id; ?>">
                                    <a class="add-to-cart" data-tippy="Add to cart" data-tippy-inertia="true"
                                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                        data-tippy-theme="sharpborder"
                                        data-name="<?= $name; ?>"
                                        data-type="<?= $type; ?>"
                                        data-image="<?= $image; ?>?>"
                                        data-price="<?= $price; ?>"
                                        data-id="<?= $id; ?>">

                                        <i class="pe-7s-cart cart-list-active"></i>
                                    </a>
                                    <audio
                                        src="./admin/Files/<?= $type; ?>/<?= $file; ?>"
                                        loop></audio>
                                </div>

                            </div>
                            <?php
        $amount += $row['item_amount'];
}
?>

                        </ul>
                    </div>




                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">$<span
                                class="amount"><?= number_format($amount, 2); ?></span></span>
                    </div>

                    <div class="group-btn_wrap d-grid gap-2">

                        <a href="checkout.php" class="btn btn-dark">Checkout</a>
                    </div>

                </div>
            </div>
            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->