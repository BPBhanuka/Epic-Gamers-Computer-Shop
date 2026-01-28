<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | EPIC Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-body mb-2">
                <?php include "header.php"; ?>
            </div>

            <div class="col-12 bg-info" style="margin-top: 60px;" >
                <div class="row">
                    <div class="offset-lg-2 col-12 col-lg-8">
                        <div class="row">
                            <div class="offset-lg-4 col-4">
                                <div class="offset-lg-1 mt-2 mb-2 logo  text-center" style="height: 150px;"></div>
                            </div>
                            <div class="offset-lg-1 col-10 text-center">
                                <p class="fs-1 fw-bold mt-3 pt-2 b6">Advanced Search</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 bg-secondary rounded mb-2" style="margin-top: 30px;">
                <div class="row">

                <div class="offset-lg-1 col-12 col-lg-10">                                                                                                                                                                                                          
                    <div class="row">
                        <div class="col-12 col-lg-10 mt-2 mb-1">
                            <input type="text" class="form-control bg-warning" placeholder="Type Keyword to search..." id="t"
                            style="border-top-left-radius: 20px; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                            box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"/>
                        </div>
                        <div class="col-12 col-lg-2 mt-2 mb-1 d-grid">
                            <button class="mainSearch text-dark" onclick="advancedSearch(0);">Search</button>
                        </div>
                        <div class="col-12">
                            <hr class="border border-3 border-primary"/>
                        </div>
                    </div>
                </div>

                <div class="offset-lg-1 col-12 col-lg-10">
                    <div class="row">

                    <div class="col-12">
                        <div class="row">

                        <div class="col-12 col-lg-4 mb-2">
                            <select class="form-select" id="c1">
                                <option value="0">Select Category</option>

                                <?php
                                require "connection.php";
                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for($x = 0;$x < $category_num;$x++){
                                    $category_data = $category_rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                    <?php
                                }
                                ?>
                                
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mb-2">
                            <select class="form-select" id="b">
                                <option value="0">Select Brand</option>
                                
                                <?php
                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                $brand_num = $brand_rs->num_rows;

                                for($x = 0;$x < $brand_num;$x++){
                                    $brand_data = $brand_rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mb-2">
                            <select class="form-select" id="m">
                                <option value="0">Select Model</option>

                                <?php
                                $model_rs = Database::search("SELECT * FROM `model`");
                                $model_num = $model_rs->num_rows;

                                for($x = 0;$x < $model_num;$x++){
                                    $model_data = $model_rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                    <?php
                                }
                                ?>
                               
                            </select>
                        </div>

                      
                        <div class="col-12 col-lg-12 mb-2">
                            <select class="form-select" id="c3">
                                <option value="0">Select Colour</option>

                                <?php
                                $color_rs = Database::search("SELECT * FROM `color`");
                                $color_num = $color_rs->num_rows;

                                for($x = 0;$x < $color_num;$x++){
                                    $color_data = $color_rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
                                    <?php
                                }
                                ?>
                               
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mb-2">
                            <input type="text" class="form-control" placeholder="Price From..." id="pf"/>
                        </div>

                        <div class="col-12 col-lg-4 mb-2">
                            <input type="text" class="form-control" placeholder="Price To..." id="pt"/>
                        </div>
                        
                        <div class="col-12 col-lg-4 mb-2">
                            <button class="clearButton" onclick="clearsort();">Clear All</button>
                        </div>


                        </div>
                    </div>

                    </div>
                </div>

                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 bg-secondary rounded mb-2">
                <div class="row">
                    <div class="offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row" id="view_area">
                            <div class="offset-5 col-2 mt-5">
                                <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span>
                            </div>
                            <div class="offset-3 col-6 mt-3 mb-5">
                                <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>