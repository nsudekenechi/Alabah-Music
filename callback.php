<?php
require_once("./admin/db/config.php");
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["reference"])) {

  $reference = $_GET["reference"];
  $key = "sk_test_8921bdf70a7db5582dce86789a916ce6de1fae28";
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
  $query = "SELECT user_id FROM add_user WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $userid = $row["user_id"];

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
    } else if ($row["item_type"] == "sample") {
      $table = "add_sample";
      $id = "sample_id";
    } else if ($row["item_type"] == "lyrics") {
      $table = "add_lyrics";
      $id = "lyrics_id";
    } else if ($row["item_type"] == "song") {
      $table = "add_song";
      $id = "song_id";
    }
    $res = getFiles($conn, $table, $id, $row["cart_id"]);
    $row = mysqli_fetch_assoc($res);


    if ($itemType == "beat") {

      if ($itemLeaseType == "Basic Lease") {
        $file = $row["beat_basic_file"];
      } else if ($itemLeaseType == "Exclusive Lease") {
        $file = $row["beat_exclusive_file"];
      } else if ($itemLeaseType == "Premium Lease") {
        $file = $row["beat_premium_file"];
      }
    } else if ($itemType == "sample") {

      $file = $row["sample_file"];
    } else if ($itemType == "song") {

      if ($itemLeaseType == "Basic Lease") {
        $file = $row["song_preview"];
      } else if ($itemLeaseType == "Exclusive Lease") {
        $file = $row["song_file"];
      }
    } else {

      $file = $row["lyrics_file"];
    }

    array_push($arr["file"], $file);
    array_push($arr["type"], $itemType);
    array_push($arr["name"], $itemName);
    array_push($arr["id"], $itemId);
    array_push($arr["image"], $itemImages);
    array_push($arr["leaseType"], $itemLeaseType);
    array_push($arr["amount"], $itemAmount);
  }


  saveSold($arr["name"], $email, $arr["amount"], $arr["type"], $arr["leaseType"], $conn, $reference, $arr["id"], $arr["image"], $arr["file"]);
  changePremiumItemsToSold($conn, $arr["id"], $arr["type"], $arr["leaseType"]);
}

function getFiles($conn, $table, $id, $idValue)
{
  $query = "SELECT * FROM $table WHERE $id='$idValue'";
  $result = mysqli_query($conn, $query);
  return $result;
}
function saveSold($itemname, $user, $amount, $itemtype, $itemLeaseType, $conn, $reference, $ids, $images, $files)
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
    sendEmail($user, $ids, $conn, $reference);
  }
}



function sendEmail($email, $ids, $conn)
{
  $senderemail = "alabahmusic@gmail.com";
  $senderpassword = "vqfrqkykxfnxxqeb";
  $senderFrom = "Dopemind Mind Ent.";
  $body = file_get_contents("./emailtouser.html");
  $body = str_replace([], [], $body);
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
      } else if ($itemType == "song") {
        $query = "UPDATE add_song SET purchase_status='Sold' WHERE song_id='$id'";
      } else if ($itemType == "lyrics") {
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
  $usermessage = $con_message;

  $senderemail = "alabahmusic@gmail.com";
  $senderpassword = "aykucsstxmmcewhu";
  $senderFrom = "Alabah's Music";
  $subject = "$userfullname sent you a message";
  $body = " <h3>Full name: $userfullname</h3>
                <h3>Email: $useremail</h3>
                <h1>Message: $usermessage</h1>
      ";
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
  $mail->setFrom($senderemail, "$senderFrom");
  //Add a recipient
  $mail->addAddress($senderemail);
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $body;
  if ($mail->send()) {
    header("Location:./contact.php?email=sent");
  } else {
    header("Location:./contact.php?email=failed");
  }
}
