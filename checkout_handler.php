<?php
require_once("./admin/db/config.php");
if (isset($_POST["place_order"])) {

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    $query = "SELECT * FROM add_user WHERE user_id='$user'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_fullname = $row["fullname"];
        $db_email = $row["email"];
        if ($db_fullname == "" && $db_email == "") {
            $fullname = $firstname . " " . $lastname;
            $query = "UPDATE add_user SET fullname='$fullname', email='$email' WHERE user_id='$user'";
            $result = mysqli_query($conn, $query);
        } else {
            // if ($oldEmail != "" && $newEmail != "") {
            //     $query = "UPDATE add_user SET email='$newEmail' WHERE email='$oldEmail'";
            //     $result = mysqli_query($conn, $query);
            //     if (!$result) {
            //         location("checkout.php", "update", "failed");
            //     }
            // }
        }
    } else {
        $fullname = $firstname . " " . $lastname;
        $query = "INSERT INTO `add_user`(`user_id`, `fullname`, `email`) VALUES ('$user','$fullname','$email')";
        $result = mysqli_query($conn, $query);
    }
    makePayment($conn);
}

function location($page, $header, $message)
{
    header("location:./$page.php?$header=$message");
}

function makePayment($conn)
{
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    $payStack = $POST["paymentgateway"][0] == "payStack";
    $payPal = $POST["paymentgateway"][0] == "payPal";
    // Getting User's details
    $query = "SELECT * FROM add_user WHERE user_id='$user'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $email = $row["email"];
    $toNaira = $amount * 500;
    $secretKey = "sk_test_8921bdf70a7db5582dce86789a916ce6de1fae28";

    if ($payStack) {
        payStack($secretKey, $toNaira, $email);
    } else if ($payPal) {
        echo "oui";
    }
}

function payStack($secretKey, $amount, $email)
{
    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
        'email' => "$email",
        'amount' => $amount * 100,
        'subaccount' => "ACCT_s629au56hge7mjl",
        'bearer' => 'subaccount',
        'callback_url' => "http://localhost/alabah/callback.php?email=$email"
    ];

    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $secretKey",
        "Cache-Control: no-cache",
    ));

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    $data = json_decode($result);
    if ($data) {
        header("Location:" . $data->data->authorization_url);
    }
}
