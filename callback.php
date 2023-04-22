<?php

require_once("./admin/db/config.php");
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["reference"])) {
    $reference = $_GET["reference"];
    $key = "sk_test_e7e15f5f0c023be901615538c8ce9c8ed163cd24";
    $email = $_GET["email"];
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $key",
        "Cache-Control: no-cache",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $res = json_decode($response, true);
        if ($res["data"]["status"] == "success") {
            sendEmailToUser($email, $conn, $reference);
        }
    }
}

function sendEmailToUser($email, $conn, $reference)
{
    $query = "SELECT * FROM add_user WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $userid = $row["user_id"];
    $fullname = $row["fullname"];
    $query = "SELECT * FROM add_cart WHERE user_id='$userid'";
    $result = mysqli_query($conn, $query);
    $arr = [
      "file" => [],
      "type" => [],
      "name" => [],
      "leaseType" => [],
      "image" => [],
      "amount" => [],
      "id" => []
    ];

    while ($row = mysqli_fetch_assoc($result)) {
        $itemType = $row["item_type"];
        $itemLeaseType = $row["item_lease_type"];
        $itemName = $row["item_name"];
        $itemImages = $row["item_image"];
        $itemId = $row["cart_id"];
        $itemAmount = $row["item_amount"];
        if ($itemType == "beat") {
            $table = "add_beat";
            $id = "beat_id";
        } elseif ($row["item_type"] == "sample") {
            $table = "add_sample";
            $id = "sample_id";
        } elseif ($row["item_type"] == "lyrics") {
            $table = "add_lyrics";
            $id = "lyrics_id";
        } elseif ($row["item_type"] == "song") {
            $table = "add_song";
            $id = "song_id";
        }
        $res = getFiles($conn, $table, $id, $row["cart_id"]);
        $row = mysqli_fetch_assoc($res);


        if ($itemType == "beat") {
            if ($itemLeaseType == "Basic Lease") {
                $file = $row["beat_basic_file"];
            } elseif ($itemLeaseType == "Exclusive Lease") {
                $file = $row["beat_exclusive_file"];
            } elseif ($itemLeaseType == "Premium Lease") {
                $file = $row["beat_premium_file"];
            }
        } elseif ($itemType == "sample") {
            $file = $row["sample_file"];
        } elseif ($itemType == "song") {
            if ($itemLeaseType == "Basic Lease") {
                $file = $row["song_preview"];
            } elseif ($itemLeaseType == "Exclusive Lease") {
                $file = $row["song_file"];
            }
        } else {
            $file = $row["lyrics_file"];
        }

        array_push($arr["file"], $file);
        array_push($arr["type"], $itemType);
        array_push($arr["name"], $itemName);
        array_push($arr["id"], $itemId);
        array_push($arr["image"], ["img"=>$itemImages,"type"=>$itemType]);
        array_push($arr["leaseType"], $itemLeaseType);
        array_push($arr["amount"], $itemAmount);
    }


    saveSold($arr["name"], $email, $arr["amount"], $arr["type"], $arr["leaseType"], $conn, $reference, $arr["id"], $arr["file"], $arr["image"], ["userid" => $userid, "fullname" => $fullname]);
    changePremiumItemsToSold($conn, $arr["id"], $arr["type"], $arr["leaseType"]);
}

function getFiles($conn, $table, $id, $idValue)
{
    $query = "SELECT * FROM $table WHERE $id='$idValue'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function saveSold($itemname, $user, $amount, $itemtype, $itemLeaseType, $conn, $reference, $ids, $files, $image, $userDetails)
{
    $date = date("d-M-Y");

    $itemname = json_encode($itemname);
    $amount = json_encode($amount);
    $itemtype = json_encode($itemtype);
    $itemLeaseType = json_encode($itemLeaseType);
    $files = json_encode($files);
    $filesIDs = json_encode($ids);

    $query = "INSERT INTO `view_sold`( `item_id`,`item_name`, `sold_to`, `amount_sold`, `date_sold`, `item_type`,`item_lease_type`,`reference_id`,`files`) VALUES ('$filesIDs','$itemname','$user','$amount','$date','$itemtype','$itemLeaseType','$reference','$files')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        sendEmail($user, $ids, $conn, $image, $userDetails, $reference);
    }
}



function sendEmail($email, $ids, $conn, $image, $userDetails, $reference)
{
    $image="https://dopemindstudio.com/admin/Files/".$image[0]["type"]."/".$image[0]["img"];
    $firstname = explode(" ", $userDetails["fullname"])[0];

    $senderemail = "doperecords2016@gmail.com";
    $senderpassword = "iihunfvlfystigua";
    $senderFrom = "Dopemind Records";
    $body = file_get_contents("./emailtouser.html");

    $body = str_replace(["{Firstname}", "{Link}", "{Image}"], [$firstname, "https://dopemindstudio.com/download.php?reference=$reference"], $body, $image);
    $subject = "You've successfully purchased your items";

    $mail = new PHPMailer(true);
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $senderemail;                     //SMTP username
    $mail->Password   = $senderpassword;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($senderemail, $senderFrom);
    //Add a recipient
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    if ($mail->send()) {
        deleteFromCart($ids, $conn);
    }
}

function deleteFromCart($ids, $conn)
{
    for ($i = 0; $i < count($ids); $i++) {
        $id = $ids[$i];
        // Deleting From Cart
        $query = "DELETE FROM add_cart WHERE cart_id='$id'";
        $result = mysqli_query($conn, $query);
    }
    // Redirecting User
    header("Location:./thankyou.php");
}
// Once a user purchases a premium Item, Change the purchase status to sold
function changePremiumItemsToSold($conn, $ids, $types, $leaseTypes)
{
    for ($i = 0; $i < count($types); $i++) {
        $itemType = $types[$i];
        $id = $ids[$i];
        $leaseType = $leaseTypes[$i];
        if ($itemType != "sample" && $leaseType == "Premium Lease") {
            if ($itemType == "beat") {
                $query = "UPDATE add_beat SET purchase_status='Sold' WHERE beat_id='$id'";
            } elseif ($itemType == "song") {
                $query = "UPDATE add_song SET purchase_status='Sold' WHERE song_id='$id'";
            } elseif ($itemType == "lyrics") {
                $query = "UPDATE add_lyrics SET purchase_status='Sold' WHERE lyrics_id='$id'";
            }

            $result = mysqli_query($conn, $query);
        }
    }
}

if (isset($_POST["sendmessage"])) {
    $POST = filter_var_array($_POST);
    extract($POST);
    $userfullname = $con_firstName . " " . $con_lastName;
    $useremail = $con_email;
    $usermessage =nl2br($con_message);

    $senderemail = "doperecords2016@gmail.com";
    // $senderemail1 = "doperecords2016@gmail.com";

    $senderpassword = "iihunfvlfystigua";
    $senderFrom = "Dopemind Records";
    $body = file_get_contents("./emailtoadmin.html");

    $body = str_replace(["{fullname}", "{Message}", "{phonenumber}","{email}"], [$userfullname,$usermessage,$con_phone,$con_email], $body);
    $subject = "New Message From $userfullname";

    $mail = new PHPMailer(true);
  //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $senderemail;                     //SMTP username
    $mail->Password   = $senderpassword;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($senderemail, "Dopemind Records");
    //Add a recipient
    $mail->addAddress($senderemail);
    // $mail->addAddress($senderemail1);
    // Replying to user
    $mail->addReplyTo($useremail, $userfullname);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    if ($mail->send()) {
        header("Location:./contact.php?email=sent");
    } else {
        header("Location:./contact.php?email=failed");
    }
}
