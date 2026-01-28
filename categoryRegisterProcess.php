<?php

include "connection.php";

$category = $_POST["c"]; 

if (empty($category)) {
    echo ("Please enter your category name");
} else {
    // echo("Success");
    $rs = Database::search("SELECT * FROM `category` WHERE `name` = '" . $category . "' ");
    $num = $rs->num_rows;
    // echo ($num);

    if ($num > 0) {
        echo ("Your category name already exit");
    } else {
        Database::iud("INSERT INTO `category` (`name`) VALUES ('" . $category . "')");
        echo ("Success");
    }
}

?>