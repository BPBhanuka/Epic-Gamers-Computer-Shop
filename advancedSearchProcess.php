<?php

session_start();
require "connection.php";

$txt = $_POST["t"];
$category = $_POST["cat"];
$brand = $_POST["b"];
$model = $_POST["m"];
$color = $_POST["col"];
$price_from = $_POST["pf"];
$price_to = $_POST["to"];


$query = "SELECT * FROM `product`";
$status = 0;



if (!empty($txt)) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
    $status = 1;
}

if ($status == 0 && $category != 0) {
    $query .= " WHERE `category_id`='" . $category . "'";
    $status = 1;
} else if ($status != 0 && $category != 0) {
    $query .= " AND `category_id`='" . $category . "'";
}

$pid = 0;
if ($brand != 0 && $model == 0) {

    $brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $brand . "'");
    $brand_num = $brand_rs->num_rows;
    for ($x = 0; $x < $brand_num; $x++) {
        $brand_data = $brand_rs->fetch_assoc();
        $pid = $brand_data["id"];
    }

    if ($status == 0) {
        $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `model_has_brand_id`='" . $pid . "'";
    }
}

if ($brand == 0 && $model != 0) {

    $model_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='" . $model . "'");
    $model_num = $model_rs->num_rows;
    for ($x = 0; $x < $model_num; $x++) {
        $model_data = $model_rs->fetch_assoc();
        $pid = $model_data["id"];
    }

    if ($status == 0) {
        $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `model_has_brand_id`='" . $pid . "'";
    }
}

if ($brand != 0 && $model != 0) {

    $model_has_brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' 
        AND `model_id`='" . $model . "'");
    $model_has_brand_num = $model_has_brand_rs->num_rows;
    for ($x = 0; $x < $model_has_brand_num; $x++) {
        $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
        $pid = $model_has_brand_data["id"];
    }

    if ($status == 0) {
        $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `model_has_brand_id`='" . $pid . "'";
    }
}


if ($status == 0 && $color != 0) {
    $query .= " WHERE `color_id`='" . $color . "'";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    $query .= " AND `color_id`='" . $color . "'";
}

if (!empty($price_from) && empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` >= '" . $price_from . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` >= '" . $price_from . "'";
    }
} else if (empty($price_from) && !empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` <= '" . $price_to . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` <= '" . $price_to . "'";
    }
} else if (!empty($price_from) && !empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
    }
}


if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 10;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>

    <div class="y3 card mb-3 mt-4 col-12 col-lg-5 mx-auto popup" style="border-radius: 20px; border-width: 3px; background-color:  #00eaff ; border-color: #ff9100; ">
        <div class="row">

            <div class="col-md-4 mt-4">

                <?php

                $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $results_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();

                ?>

                <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start mx-3" style="width: 800px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">

                    <h5 class="card-title fw-bold"><?php echo $results_data["title"]; ?></h5>
                    <span class="card-text text-primary fw-bold"><?php echo $results_data["price"]; ?></span>

                    <div class="row">
                        <div class="col-12">

                            <?php

                            if ($results_data["qty"] > 0) {

                            ?>

                                <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                <span class="card-text text-success fw-bold"><?php echo $results_data["qty"]; ?> Items Available</span><br /><br />
                                <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>
                                    <button class="col-12 buy">Buy Now</button>
                                </a>
                                <button class="col-12  c2 mt-2" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-plus-circle-fill" style="margin-right: 10px;"></i>| Add to Cart</button>


                                <?php


                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $results_data["id"] . "' AND 
                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <button class="col-12 btn btn-dark mt-2 border border-info" onclick='addToWatchlist(<?php echo $results_data["id"]; ?>);'>
                                        <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php echo $results_data["id"]; ?>'></i>
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button class="col-12 btn btn-dark mt-2 border border-info" onclick='addToWatchlist(<?php echo $results_data["id"]; ?>);'>
                                        <i class="bi bi-heart-fill text-info fs-5" id='heart<?php echo $results_data["id"]; ?>'></i>
                                    </button>
                                <?php
                                }

                                ?>

                            <?php

                            } else {

                            ?>



                                <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                                <span class="card-text text-danger fw-bold">00 Items Available</span><br /><br />
                                <button class="col-12 buy disabled">Buy Now</button>
                                <button class="col-12 c2 mt-2"><i class="bi bi-plus-circle-fill" style="margin-right: 10px;"></i>| Add to Cart</button>
                                <button class="col-12 btn btn btn-dark mt-2 border border-info">
                                    <i class="bi bi-heart-fill text-info fs-5"></i>
                                </button>


                            <?php
                            }

                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
}

?>

<!--  -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link bg-warning" style="font-weight: bold;" <?php if ($pageno <= 1) {
                                                                                echo ("#");
                                                                            } else {
                                                                            ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                            } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link bg-warning" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link bg-warning" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link bg-warning" style="font-weight: bold;" <?php if ($pageno >= $number_of_pages) {
                                                                                echo ("#");
                                                                            } else {
                                                                            ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                            } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--  -->
</div>