<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POWER SUPPLY | EPIC Gamers Computer </title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rl="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row gy-4">

            <?php include "header.php"; ?>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-2 d-grid d-lg-block">
                        <button class="c3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Category</button>
                        <div class="offcanvas offcanvas-start bg-dark " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close bg-info" data-bs-dismiss="offcanvas" aria-label="Close" style="margin-left: 350px;"></button>
                            </div>
                            <div class="offcanvas-body">
                                <a href="category1.php">
                                    <button class="c4 d7i popup">PROCESSORS</button>
                                </a>

                                <a href="category2.php">
                                    <button class="c4 d7ii popup">MOTHERBOARDS</button>
                                </a>

                                <a href="category3.php">
                                    <button class="c4 d7iii popup">GRAPHIC CARDS</button>
                                </a>

                                <a href="category4.php">
                                    <button class="c4 d7iv popup">MONITORS</button>
                                </a>

                                <a href="category5.php">
                                    <button class="c4 d7v popup">STORAGE DEVICES</button>
                                </a>

                                <a href="category6.php">
                                    <button class="c4 d7vi popup">CASING</button>
                                </a>

                                <a href="category7.php">
                                    <button class="c4 d7vii popup">LAPTOPS</button>
                                </a>

                                <a href="category8.php">
                                    <button class="c4 d7viii popup">KEYBOARDS, MOUSE & GAMEPADS</button>
                                </a>

                                <a href="category9.php">
                                    <button class="c4 d7ix popup">RAM</button>
                                </a>

                                <a href="category10.php">
                                    <button class="c4 d7x popup">POWER SUPPLY</button>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php


            require "connection.php";
            $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='power supply' ");
            $c_num = $c_rs->num_rows;

            for ($y = 0; $y < $c_num; $y++) {
                $cdata = $c_rs->fetch_assoc();

            ?>


                <!-- Products -->

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="row justify-content-center gap-4">

                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' ");
                                $product_num = $product_rs->num_rows;

                                for ($z = 0; $z < $product_num; $z++) {
                                    $product_data = $product_rs->fetch_assoc();

                                ?>

                                    <div class="card col-12 col-lg-6 mt-5 mb-2 d8 popup" style="width: 300px; border-width: 5px; border-color:#505050; border-radius: 20px;">

                                        <?php

                                        $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>

                                        <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 250px;" />
                                        <div class="card-body ms-0 m-0 text-center  ">
                                            <h5 class="card-title fs-6 fw-bold text-dark"><?php echo $product_data["title"]; ?> <span class="badge bg-warning">New</span></h5>
                                            <span class="card-text text-primary">Rs. <?php echo $product_data["price"]; ?>.00</span> <br />

                                            <?php

                                            if ($product_data["qty"] > 0) {

                                            ?>

                                                <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                                <span class="card-text text-success fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br /><br />
                                                <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>
                                                    <button class="col-12 buy">Buy Now</button>
                                                </a>
                                                <button class="col-12  c2 mt-2" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-plus-circle-fill" style="margin-right: 10px;"></i>| Add to Cart</button>

                                                <?php

                                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
        `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                $watchlist_num = $watchlist_rs->num_rows;

                                                if ($watchlist_num == 1) {
                                                ?>
                                                    <button class="col-12 btn btn-dark mt-2 border border-info" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                                        <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
                                                    </button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="col-12 btn btn btn-dark mt-2 border border-info" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                                        <i class="bi bi-heart-fill text-info fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
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

                                <?php

                                }

                                ?>

                            </div>
                            <div>


                            </div>
                        </div>
                        <!-- Products -->

                    <?php

                }

                    ?>



                    </div>
                </div>
                <?php include "footer.php"; ?>

                <script src="bootstrap.bundle.js"></script>
                <script src="script.js"></script>



</body>