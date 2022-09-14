<?php
    require_once("./admin/db/config.php");
    if(isset($_POST["place_order"])){
        
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        extract($POST);
        $query = "SELECT * FROM add_user WHERE user_id='$user'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $fullname = $row["fullname"];
        $email1 = $row["email"];
        
        if($fullname=="" && $email1==""){
            $fullname = $firstname." ".$lastname;
            $query = "UPDATE add_user SET fullname='$fullname', email='$email' WHERE user_id='$user'";
            $result = mysqli_query($conn,$query);

            if($result){
                makePayment($conn);
            }
        }else{
            if($oldEmail!="" && $newEmail!=""){
                $query = "UPDATE add_user SET email='$newEmail' WHERE email='$oldEmail'";
                $result = mysqli_query($conn,$query);
                if(!$result){
                    location("checkout.php","update","failed");
                }
            }
            
            makePayment($conn);
           
          
        }
        
    }

    function location($page,$header,$message){
        header("location:./$page.php?$header=$message");
    }

    function makePayment($conn){
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        extract($POST);
        $payStack = $POST["paymentgateway"][0] == "payStack";
        $payPal = $POST["paymentgateway"][0] == "payPal";
        // Getting User's details
        $query = "SELECT * FROM add_user WHERE user_id='$user'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $fullname = $row["fullname"];
        $email = $row["email"];
        // Get Producer's Money
        $producerAmount = 0;
        $query = "SELECT * FROM add_cart WHERE user_id='$user' && item_type='beat' || item_type='sample'";
        $result = mysqli_query($conn,$query);
       
        while($row = mysqli_fetch_assoc($result)){
            $itemAmount = $row["item_amount"];
            $producerAmount += $itemAmount; 
        }
         // Get Song Writer Money
        $songWriterAmount = 0;
        $query = "SELECT * FROM add_cart WHERE user_id='$user' && item_type='lyrics' || item_type='song'";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($result)){
            $itemAmount = $row["item_amount"];
            $songWriterAmount += $itemAmount; 
        }
        $totalAmount = $amount;
        $songWriterAmount = number_format($songWriterAmount,2);
        $producerAmount = number_format($producerAmount,2);
        
        
        if($payStack){
           payStack($email,$totalAmount,$songWriterAmount,$producerAmount);
        }else if($payPal){
            echo "oui";
        }
        
    }

    function payStack($email,$Totalamount,$songWriterAmount,$producerAmount){

        $key = "sk_test_8921bdf70a7db5582dce86789a916ce6de1fae28";
        $url = "https://api.paystack.co/transaction/initialize";
        $toNaira = 500 * 100;
        $Totalamount = $Totalamount * $toNaira;
        $songWriterAmount = $songWriterAmount * $toNaira;
        $producerAmount = $producerAmount * $toNaira;
        $songWriterAccount = "ACCT_f5qxwf70zpnh2d0";
        $producerAccount = "ACCT_qlgequcduo8z4pb";

        $url = shareMoney($Totalamount,$songWriterAmount,$producerAmount,$url,$key,$songWriterAccount,$producerAccount,$email);
       if($url){
            header("Location:$url");
       }
        
    }


function shareMoney($Totalamount,$amount1,$amount2,$url,$key,$account1,$account2,$email){
    if($Totalamount > 0){

        // Validating Accounts that have money
        if($amount1 > 0 && $amount2 > 0){
            $accounts = [
                [
                    'subaccount' => $account1, 
                    'share'=>$amount1,
                    "bearer_type"=>"subaccount",
                    
                ],
                [
                    "subaccount"=> $account2,
                    "share"=> $amount2,
                    "bearer_type"=>"subaccount",
                ]
                ];
        }else{
            if($amount1 > 0){
                $accounts = [
                    [
                        'subaccount' => $account1, 
                        'share'=>$amount1,
                        "bearer_type"=>"subaccount",
                        
                    ]
                    
                    ];
            }else{
                $accounts = [
                    [
                        'subaccount' => $account2, 
                        'share'=>$amount2,
                        "bearer_type"=>"subaccount",
                        
                    ]
                    
                    ];
            }
        }
        
        $callbackUrl="http://localhost/alabah/callback.php?email=$email";
        
        $fields = [
            'email' => $email,
            'amount' => $Totalamount,
            'callback_url' => $callbackUrl,
            'split' => [
                'type'=>"flat",
                
                "subaccounts"=> $accounts
            ]
          ];
        
          $fields_string = http_build_query($fields);
        
          //open connection
          $ch = curl_init();
          
          //set the url, number of POST vars, POST data
          curl_setopt($ch,CURLOPT_URL, $url);
          curl_setopt($ch,CURLOPT_POST, true);
          curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $key",
            "Cache-Control: no-cache",
            
          ));
          
          //So that curl_exec returns the contents of the cURL; rather than echoing it
          curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
          
            //execute post
            $result = curl_exec($ch);
            $res= json_decode($result,TRUE);
            $url= $res["data"]["authorization_url"];

            return $url;
    }
   


}

    
?>