<?php

require_once("./admin/db/config.php");
// Using dotenv
require_once ( __DIR__ . '/vendor/autoload.php');
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();
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
    // $secretKey = $_ENV["PAYSTACK_SK"];
    $secretKey = "sk_live_41f743b9d0e5e96a84ef296e5e874e0b086cacdc";

    if ($payStack) {
        payStack($secretKey, $toNaira, $email);
    } elseif ($payPal) {
        echo "oui";
    }
}

function payStack($secretKey, $amount, $email)
{
    $url = "https://api.paystack.co/transaction/initialize";
    echo $amount;

    $fields = [
        'email' => "$email",
        'amount' => $amount * 100,
        'subaccount' => "ACCT_536p2y56d3ox52o",
        'bearer' => 'account',
        'callback_url' => "https://dopemindstudio.com/callback.php?email=$email"
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
    )
    );

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    $data = json_decode($result);
    if ($data) {
        // print_r($data);
        header("Location:" . $data->data->authorization_url);
    }
}
