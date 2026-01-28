<?php

include "connection.php";

$brand = $_POST["b"]; 
$category2 = $_POST["c2"]; 

if (empty($brand)) {
    echo ("Please enter your brand name");
} else if (empty($category2)) {
    echo ("Please Select your category name");
} else {
    // echo("Success");
    $rs = Database::search("SELECT * FROM `brand` WHERE `name` = '" . $brand . "' ");
    $num = $rs->num_rows;
    // echo ($num);

    if ($num > 0) {
        echo ("Your brand name already exit");
    } else {
        Database::iud("INSERT INTO `brand` (`name`,`category_id`) VALUES ('" . $brand . "','" . $category2 . "')");
        echo ("Success");
    }
}

?>
