<?php

require_once("./admin/db/config.php");
if (isset($_GET["getinfo"])) {
    $id = $_GET["getinfo"];
    $type = $_GET["itemType"];
    if ($type == "beat") {
        $query = "SELECT * FROM add_beat WHERE beat_id='$id'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $name = $row["beat_name"];
        $genre = $row["beat_genre"];
        $mood = $row["beat_mood"];
        $category = $row["beat_category"];
        $freeFile = $row["beat_free_file"];
        $image = $row["beat_image"];
        $basicAmount = $row["beat_basic_amount"];
        $exclusiveAmount = $row["beat_exclusive_amount"];
        $premiumAmount = $row["beat_premium_amount"];
        $discount = $row["discount"];
    } elseif ($type == "sample") {
        $query = "SELECT * FROM add_sample WHERE sample_id='$id'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $name = $row["sample_name"];
        $genre = "";
        $mood = "";
        $category = $row["sample_category"];
        $freeFile = $row["sample_file"];
        $image = $row["sample_image"];
        $basicAmount = $row["sample_amount"];
        $exclusiveAmount = "";
        $premiumAmount = "";
        $discount = $row["discount"];
    } elseif ($type == "lyrics") {
        $query = "SELECT * FROM add_lyrics WHERE lyrics_id='$id'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $name = $row["lyrics_name"];
        $genre = "";
        $mood = $row["lyrics_type"];
        $category = $row["lyrics_category"];
        $freeFile = $row["lyrics_file"];
        $image = $row["lyrics_image"];
        $basicAmount = $row["lyrics_basic_amount"];
        $exclusiveAmount = $row["lyrics_exclusive_amount"];
        $premiumAmount = $row["lyrics_premium_amount"];
        $discount = $row["discount"];
    } elseif ($type == "song") {
        $query = "SELECT * FROM add_song WHERE song_id='$id'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $name = $row["song_name"];
        $genre = $row["song_genre"];
        $mood = $row["song_mood"];
        $category = $row["song_category"];
        $freeFile = $row["song_file"];
        $image = $row["song_image"];
        $basicAmount = $row["song_basic_amount"];
        $exclusiveAmount = $row["song_exclusive_amount"];
        $premiumAmount = $row["song_premium_amount"];
        $discount = $row["discount"];
    }

    $array = ["id" => $id, "beat_name" => $name, "beat_genre" => $genre, "beat_mood" => $mood, "beat_category" => $category, "beat_free_file" => $freeFile, "beat_image" => $image, "beat_basic_amount" => $basicAmount, "beat_exclusive_amount" => $exclusiveAmount, "beat_premium_amount" => $premiumAmount, "beat_discount" => $discount];

    print_r(json_encode($array));
}

if (isset($_GET["addtocart"])) {
    if ($addtocart["user"] == "") {
        $user = "user" . rand(0, 1000);
        $time = strtotime("1 year");
        setcookie("user", $user, $time, "/");
        $query = "INSERT INTO `add_user`( `user_id`) VALUES ('$user')";
        $result = mysqli_query($conn, $query);
    } else {
        $user = $addtocart["user"];
    }
    $addtocart = json_decode($_GET["addtocart"], true);
    $cartId = $addtocart["itemId"];
    $itemName = $addtocart["itemName"];
    $itemPrice = $addtocart["itemPrice"];
    $itemLeaseType = $addtocart["itemLeaseType"];
    $itemImage = $addtocart["itemImage"];
    $itemType = $addtocart["itemType"];


    $query = "INSERT INTO `add_cart`( `cart_id`, `user_id`, `item_name`, `item_amount`, `item_lease_type`, `item_image`,`item_type`) VALUES ('$cartId','$user','$itemName','$itemPrice','$itemLeaseType','$itemImage','$itemType')";

    $result = mysqli_query($conn, $query);
}

if (isset($_GET["removefromcart"])) {
    $id = json_decode($_GET["removefromcart"], true);
    $cartId = $id["cartid"];
    $userid = $id["userid"];
    $query = "DELETE FROM add_cart WHERE cart_id='$cartId' && user_id='$userid'";
    $result = mysqli_query($conn, $query);
}



if (isset($_GET["changecart"])) {
    $changeCart = json_decode($_GET["changecart"], true);
    $userid = $changeCart["userid"];
    $cartid = $changeCart["cartid"];
    $item_amount = $changeCart["item_amount"];
    $item_lease_type = $changeCart["item_lease_type"];

    $query = "UPDATE `add_cart` SET `item_amount`='$item_amount',`item_lease_type`='$item_lease_type' WHERE cart_id='$cartid' && user_id='$userid'";
    $result = mysqli_query($conn, $query);
}

if (isset($_GET["coupon_code"])) {
    $code = $_GET["coupon_code"];
    $query = "SELECT * FROM add_coupon WHERE coupon_code='$code'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $isexpired = $row["is_expired"];
        $maximum = $row["Maximum"];
        $expiryDate = $row["date"];
        $date = date("d-M-Y");
        $count = intval($row["count"]);
        $expired = "True";



        if ($isexpired == "False") {
            if ($count == $maximum || strtotime($date) >= strtotime($expiryDate)) {
                $query = "UPDATE `add_coupon` SET  `is_expired`='$expired' WHERE coupon_code='$code'";
                $result = mysqli_query($conn, $query);
                $discount = "Expired";
            } else {
                $count += 1;
                $query = "UPDATE `add_coupon` SET  `count`='$count' WHERE coupon_code='$code'";
                $result = mysqli_query($conn, $query);
                $discount = $row["coupon_discount"];
            }
        } else {
            $discount = "Expired";
        }
    } else {
        $discount = "not found";
    }
    echo $discount;
}
