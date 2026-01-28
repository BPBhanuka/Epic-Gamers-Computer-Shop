<?php
include "connection.php";

$rs = Database::search("SELECT `product`.`product_id`,`product`.`product_name`  FROM `category` INNER JOIN `product` ON `category`.
`id` = `product`.`category_id`  GROUP BY `product`.`product_id`,`product`.`product_name` ");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    $labels[] = $d["product_name"];
    $data[] = $d["total_sold"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);
