<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$category = $_POST["ca"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$clr = $_POST["col"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dwga = $_POST["dwga"];
$doga = $_POST["doga"];
$desc = $_POST["desc"];

if($category == "0"){
    echo ("Please select a Category");
}else if($brand == "0"){
    echo ("Please select a Brand");
}else if($model == "0"){
    echo ("Please select a Model");
}else if(empty($title)){
    echo ("Please Enter a Title");
}else if(strlen($title) >= 100){
    echo ("Title should have lover than 100 characters");
}else if($clr == "0"){
        echo ("Please select a colour");
}else if(empty($qty)){
    echo ("Please Enter the Quantity.");
}else if($qty == "0" | $qty == "e" | $qty < 0){
    echo ("Invalid input for Quantity");
}else if(empty($cost)){
    echo ("Please Enter the Price.");
}else if(!is_numeric($cost)){
    echo ("Invalid input for Cost");
}else if(empty($dwga)){
    echo ("Please Enter the delivery fee for Gampaha.");
}else if(!is_numeric($dwga)){
    echo ("Invalid input for delivery cost inside Gampaha");
}else if(empty($doga)){
    echo ("Please Enter the delivery fee for out of Gampaha.");
}else if(!is_numeric($doga)){
    echo ("Invalid input for delivery cost out of Gampaha");
}else if(empty($desc)){
    echo ("Please Enter a Description.");
}else{
    
    $mhb_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$brand."' AND `model_id`='".$model."'");

    $model_has_brand_id;

    if($mhb_rs->num_rows == 1){

        $mhb_data = $mhb_rs->fetch_assoc();
        $model_has_brand_id = $mhb_data["id"];

    }else{

        Database::iud("INSERT INTO `model_has_brand`(`brand_id`,`model_id`) VALUES ('".$brand."','".$model."')");
        $model_has_brand_id = Database::$connection->insert_id;

    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product`
    (`price`,`qty`,`description`,`title`,`datetime_added`,`delivery_fee_gampaha`,`delivery_fee_other`,`category_id`,
    `model_has_brand_id`,`color_id`,`user_email`,`status_id`) VALUES 
    ('".$cost."','".$qty."','".$desc."','".$title."','".$date."','".$dwga."','".$doga."','".$category."',
    '".$model_has_brand_id."','".$clr."','".$email."','1')");

    echo ("Product saved successfully");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if($length <= 3 && $length > 0){

        $allowed_img_extentions = array ("image/jpg","image/jpeg","image/png","image/svg+xml");

        for($x = 0; $x < $length;$x++){
            if(isset($_FILES["image".$x])){

                $img_file = $_FILES["image".$x];
                $file_extention = $img_file["type"];

                if(in_array($file_extention,$allowed_img_extentions)){

                    $new_img_extention;

                    if($file_extention == "image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_extention == "image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_extention == "image/png"){
                        $new_img_extention = ".png";
                    }else if($file_extention == "image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resource/New_Items/".$title."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `image`(`code`,`product_id`) VALUES ('".$file_name."','".$product_id."')");

                }else{
                    echo ("Invalid Image type");
                }

            }
        }

        echo ("Product image saved successfully");

    }
    
    
    
}

?>