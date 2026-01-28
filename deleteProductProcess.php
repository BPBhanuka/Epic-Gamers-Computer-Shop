<?php

session_start();
require "connection.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

 
       
    $product_rs = Database::search("DELETE product.id,product.price,product.qty,product.description,product.title,
    product.datetime_added,product.category_id,product.model_has_brand_id,product.color_id,
    model.name, brand.name FROM `product` INNER JOIN `model_has_brand` ON 
    model_has_brand.id=product.model_has_brand_id INNER JOIN `brand` ON brand.id=model_has_brand.brand_id INNER JOIN 
    `model` ON model.id=model_has_brand.model_id  INNER JOIN `image` ON image.product_id WHERE product.id='" . $pid . "'");  

 

        // $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$pid."'");
        // $image_data = $image_rs->fetch_assoc();

        // Database::iud("DELETE FROM `image` WHERE `product_id`='".$pid."'");


    
    echo ("success");

         
  

}


?>