<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

$oid = $_POST["o"];
$pid = $_POST["i"];
$mail = $_POST["m"];
$amount = $_POST["a"];
$qty = $_POST["q"];

$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
$product_data = $product_rs->fetch_assoc();

$curr_qty = $product_data["qty"];
$new_qty = $curr_qty - $qty;

Database::iud("UPDATE `product` SET `qty`='".$new_qty."' WHERE `id`='".$pid."'");

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`qty`,`status`,`product_id`,`user_email`) VALUES 
('".$oid."','".$date."','".$amount."','".$qty."','0','".$pid."','".$mail."')");

echo ("1");

}

?>