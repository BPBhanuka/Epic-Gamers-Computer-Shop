<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | EPIC Gamers Computer</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="d4"2>

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["au"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center mt-5">
                            <h2 class="h1 text-primary fw-bold">Add New Product</h2>
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
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">
                                                <option value="0">Select Category</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
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
                                            <select class="form-select text-center bg-warning" id="brand"
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">
                                                <option value="0">Select Brand</option>
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($y = 0; $y < $brand_num; $y++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
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
                                            <select class="form-select text-center bg-warning" id="model"
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">
                                                <option value="0">Select Model</option>
                                                <?php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($z = 0; $z < $model_num; $z++) {
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
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
                                            <input type="text" class="form-control bg-warning" id="title" 
                                            style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"/>
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
                                                    <label class="form-label fw-bold text-info" style="font-size: 20px;">Select Product Colour</label>
                                                </div>
                                                <div class="col-12">

                                                    <select class="form-select bg-warning" id="clr"
                                                    style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)">
                                                        <option value="0">Select Colour</option>

                                                        <?php

                                                        $clr_rs = Database::search("SELECT * FROM `color`");
                                                        $clr_num = $clr_rs->num_rows;

                                                        for ($a = 0; $a < $clr_num; $a++) {
                                                            $clr_data = $clr_rs->fetch_assoc();
                                                        ?>

                                                            <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>

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
                                                    <input type="number" class="form-control bg-warning" value="0" min="0" id="qty" 
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
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)"/>

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
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)"/>

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
                                                        box-shadow: 0px 0px 5px 0px;color: rgb(84, 84, 84)"/>

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
                                            <textarea cols="30" rows="15" class="form-control bg-info" id="desc"></textarea>
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
                                            <div class="row">
                                                <div class="col-6 border border-primary rounded">
                                                    <img src="resource/addproductimg.svg" class="img-fluid" style="width: 850px;" id="i0" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="addProduct();">Save Product</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php

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