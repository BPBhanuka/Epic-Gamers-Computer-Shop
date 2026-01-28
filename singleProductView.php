<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,product.title,
    product.datetime_added,product.category_id,product.model_has_brand_id,product.color_id,
    model.name AS mname,brand.name AS bname FROM `product` INNER JOIN `model_has_brand` ON 
    model_has_brand.id=product.model_has_brand_id INNER JOIN `brand` ON brand.id=model_has_brand.brand_id INNER JOIN 
    `model` ON model.id=model_has_brand.model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>


    <!DOCTYPE html>
    <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>PROCESSORS | EPIC Gamers Computer</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="resource/logo.png" />
        </head>

        <body class="d4">

            <div class="container-fluid">
                <div class="row">

                    <?php include "header.php"; ?>

                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-2 order-2 order-lg-1">
                                        <ul>

                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "'");
                                            $image_num = $image_rs->num_rows;
                                            $img = array();

                                            if ($image_num != 0) {

                                                for ($x = 0; $x < $image_num; $x++) {
                                                    $image_data = $image_rs->fetch_assoc();
                                                    $img[$x] = $image_data["code"];
                                                    ?>

                                                    <li class="image d-flex d-lg-block flex-column justify-content-center align-items-center mb-1 mt-5 d-grid">
                                                        <img src="<?php echo $img["$x"]; ?>" class="img-thumbnail mt-1 mb-1"/>
                                                    </li>

                                                    <?php
                                                }
                                           
                                            }

                                            ?>

                                        </ul>
                                    </div>

                                    <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                        <div class="row">
                                            <div class="col-12 align-items-center border border-1 border-secondary">
                                                <div class="main-img" id="main_img"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 order-3">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row border-bottom border-white">
                                                    <div class="col-12 my-5">
  

                                                        <span class="fs-4 text-white fw-bold"><?php echo $product_data["title"]; ?></span>
                                                    </div>
                                                </div>

                                             
                                                <?php

                                                $price = $product_data["price"];
                                                $adding_price = ($price / 100) * 20;
                                                $new_price = $price + $adding_price;
                                                 

                                                ?>

                                                <div class="row border-bottom border-white">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                        <br/>
                                                        <span class="fs-4 fw-bold text-white">Rs. <?php echo $price; ?> .00</span>
                                                         
                                                    </div>
                                                </div>

                                                <div class="row border-bottom border-white">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-5 text-primary"><b>Return Policy : </b>1 Months Return Policy</span><br />
                                                        <span class="fs-5 text-primary"><b>In Stock : </b><?php echo $product_data["qty"]; ?></span>
                                                    </div>
                                                </div>

                                                

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <div class="row g-2">

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <span class="form-label fw-bold" style="font-size: 20px;">Quantity : </span>  
                                                                            <div class="border border-1 border-secondary rounded overflow-hidden 
                                                                            float-left mt-1 position-relative product-qty">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <input type="text" class="form-control bg-warning" style="height: 50px;  outline: none;" pattern="[0-9]" value="0" id="qty_input" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);'/>
                                                                                        <div class="position-absolute offset-lg-10 qty-buttons col-lg-1" style="width: auto; height: auto;">
                                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                                                border border-1 border-secondary qty-inc">
                                                                                                <i class="bi bi-caret-up-fill text-info" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                                            </div>
                                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                                                border border-1 border-secondary qty-dec">
                                                                                                <i class="bi bi-caret-down-fill text-info fs-6" onclick="qty_dec();"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    

                                                                </div>
                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">
                                                                                <div class="col-4 d-grid">
                                                                                <button class="col-12 buy" type="submit"  id="payhere-payment" onclick="payNow(<?php echo $pid; ?>);">Buy Now</button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="col-12  c2 " onclick="addToCart(<?php echo $product_data['id']; ?>);" >Add to Cart</button> 
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                        <?php

                                                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                                        `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                                                        if ($watchlist_num == 1) {
                                                                                        ?>
                                                                                            <button class="col-12 btn btn-dark border border-info" style="height: 37px;"
                                                                                                onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                                                                                <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
                                                                                            </button>
                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <button class="col-12 btn btn-dark border border-info" style="height: 37px;"
                                                                                                onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                                                                                <i class="bi bi-heart-fill text-info fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
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
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12 text-white"> 
                                                <label class="form-label fs-4 fw-bold ">Product Description : </label>
                                            </div>
                                            <div>
                                                <textarea cols="60" rows="10" class="form-control bg-info" style="margin-bottom: 100px;" readonly><?php echo $product_data["description"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                             
       
                        </div>
                    </div>

                     
                                         
                </div>

                <?php include "footer.php"; ?> 
                
            </div> 
           
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

    </html>

<?php

    }else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>