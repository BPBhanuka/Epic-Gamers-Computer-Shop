<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Products | EPIC Gamers Computer</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["au"])) {
                if (isset($_SESSION["p"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center mt-5">
                            <h2 class="h1 text-primary fw-bold">Update Products</h2>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px; ">Select Product Category</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center bg-warning" id="category" onchange="load_brand();"
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" disabled>
                                                 
                                                <?php
                                                    $product = $_SESSION["p"];

                                                    $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                                    $category_data = $category_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo $category_data["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">Select Product Brand</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center bg-warning"
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" disabled>
                                                
                                                <?php
                                                    $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` IN 
                                                    (SELECT `brand_id` FROM `model_has_brand` WHERE `id`='" . $product["model_has_brand_id"] . "')");
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                    ?>
                                                <option><?php echo $brand_data["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">Select Product Model</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center bg-warning"
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" disabled>
                                                 
                                                <?php
                                                    $model_rs = Database::search("SELECT * FROM `model` WHERE `id` IN 
                                                    (SELECT `model_id` FROM `model_has_brand` WHERE `id`='" . $product["model_has_brand_id"] . "')");
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                <option><?php echo $model_data["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">
                                                Add a Title to your Product
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                            <input type="text" class="form-control bg-warning" id="t" 
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" value="<?php echo $product["title"]; ?>" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-6 border-end border-success">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-info" style="font-size: 20px;">Select Product Color</label>
                                                </div>
                                                <div class="col-12">

                                                    <select class="form-select bg-warning" id="clr"
                                                    style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" disabled>
                                                         

                                                        <?php
                                                        
                                                        $color_rs = Database::search("SELECT * FROM `color` WHERE `id`='".$product["color_id"]."'");
                                                        $color_data = $color_rs->fetch_assoc();
                                                        
                                                        ?>
                                                         
                                                            <option><?php echo $color_data["name"]; ?></option>
                                                        </select>

                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-info" style="font-size: 20px;">Add Product Quantity</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control bg-warning" value="<?php echo $product["qty"]; ?>" min="0" id="q" 
                                                    style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-info" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-left-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">Rs.</span>

                                                        <input type="text" class="form-control bg-warning" id="cost" 
                                                        style=" border-color: rgb(4, 188, 255); border-top-width: 4px; border-bottom-width: 4px;
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)" value="<?php echo $product["price"]; ?>" disabled/>

                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-right-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-right-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">Delivery Cost</label>
                                        </div>
                                        <div class="col-12 col-lg-6 border-end border-success">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label class="form-label text-white">Delivery cost Within Gampaha</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-left-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">Rs.</span>

                                                        <input type="text" class="form-control bg-warning" id="dwga" 
                                                        style=" border-color: rgb(4, 188, 255); border-top-width: 4px; border-bottom-width: 4px;
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)" value="<?php echo $product["delivery_fee_gampaha"]; ?>"/>

                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-right-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-right-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label class="form-label text-white">Delivery cost out of Gampaha</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-left-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">Rs.</span>

                                                        <input type="text" class="form-control bg-warning" id="doga" 
                                                        style=" border-color: rgb(4, 188, 255); border-top-width: 4px; border-bottom-width: 4px;
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)" value="<?php echo $product["delivery_fee_other"]; ?>"/>

                                                        <span class="input-group-text bg-warning"
                                                        style="border-top-right-radius: 20px; border-color: rgb(4, 188, 255); border-bottom-right-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                        border-bottom-width: 4px; border-right-width: 4px; box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control bg-info" id="d"><?php echo $product["description"]; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="offset-lg-4 col-12 col-lg-8">
                                            <?php
                                                
                                                $img = array();
                                                $img [0] = "resource/addproductimg.svg";
                                                

                                                $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$product["id"]."'");
                                                $images_num = $images_rs->num_rows;

                                                for($x = 0;$x < $images_num;$x++){
                                                    $images_data = $images_rs->fetch_assoc();
                                                    $img [$x] = $images_data["code"];
                                                }
                                                
                                            ?>
                                             <div class="row">
                                                <div class="col-12 col-lg-6 border border-primary rounded">
                                                    <img src="<?php echo $img [0]; ?>" class="img-fluid" style="width: 750px;" id="i0" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple  />
                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="updateProduct();">Update Product</button>
                                 </div>

                            </div>
                        </div>

                    </div>
                </div>

                <?php

                    } else {
                        header("Location:myProducts.php");
                    }
                } else {
                header("Location:home.php");
                }

                ?>
 
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>