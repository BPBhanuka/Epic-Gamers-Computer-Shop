<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $total = $_GET["t"];
    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $mobile = $_SESSION["u"]["mobile"];
    $email = $_SESSION["u"]["email"];

    
    $product_rs = Database::search("SELECT * FROM `product`");
    $product_data = $product_rs->fetch_assoc();

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");
    $address_num = $address_rs->num_rows;
     
    $order_id = uniqid();
    $qty=1;
    $title="SmartLife Products"; 

    $phpObject = new stdClass();

    if ($address_num == 1) { 

        $address_data = $address_rs->fetch_assoc(); 

        $city_id = $address_data["city_id"];
        $address = $address_data["line 1"].", ".$address_data["line 2"];

        $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."'");
        $district_data = $district_rs->fetch_assoc();

        $district_id = $district_data["district_id"];
        $delivery = "0"; 

        if($district_id == "1"){
            $delivery = $product_data["delivery_fee_gampaha"];
        }else{
            $delivery = $product_data["delivery_fee_other"];
        } 
         
        $user_address = $address;
        $city = $district_data["name"];
       

        $amount=$total;
        $merchant_secret="MzkyODQ4ODMzOTM3OTE3MzM3NjU0MTgyNjIwMjIwMzEwNTg4MDgyMA==";
        $currency="LKR";

        $hash = strtoupper(
            md5(
                $merchant_id = "1222822". 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $phpObject->qty=$qty;
        $phpObject->total=$total; 
        $phpObject->address=$user_address;
        $phpObject->city=$city;
        $phpObject->fname=$fname;
        $phpObject->lname=$lname;
        $phpObject->order_id=$order_id;
        $phpObject->title=$title;
        $phpObject->email=$email;
        $phpObject->mobile=$mobile;  
        $phpObject->hash=$hash;
        // $array["order_id"] = $order_id;
        // $array["item"] = $title;
        // $array["total"] = $total;
        // $array["fname"] = $fname;
        // $array["lname"] = $lname;
        // $array["mobile"] = $mobile;
        // $array["address"] = $user_address;
        // $array["city"] = $city;
        // $array["mail"] = $email;
        // $array["hash"] = $hash;

    

        $responseJSON=json_encode($phpObject);
        echo($responseJSON);


    } else {
        echo ("2");
    }
} else {

    echo ("1");
}
