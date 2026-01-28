<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Products | Admins | EPIC Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2">
                <div class="row">
                    <div class="col-12 align-items-start bg-dark">
                        <div class="row g-1 text-center">

                            <div class="col-12 mt-5">

                                <hr class="border border-1 border-white" />
                            </div>
                            <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                <nav class="nav flex-column">
                                    <a class="adminButton mb-3" href="adminPanel.php">Dashboard</a>
                                    <a class="adminButton mb-3" href="manageUsers.php">Manage Users</a>
                                    <a class="adminButton mb-3" href="manageProduct.php">Manage Products</a>
                                </nav>
                            </div>
                            <div class="col-12 mt-5">
                                <hr class="border border-1 border-white" />
                                <h4 class="text-white fw-bold">Products Update & Add</h4>
                                <hr class="border border-1 border-white" />
                            </div>
                            <div class="col-12 mt-3 d-grid">
                                <a href="myProducts.php" class="btn btn-info">Update Products & Add Products</a>
                                <hr class="border border-1 border-white mb-3" />
                                <a href="Home.php" class="btn btn-info">Home</a>
                                <hr class="border border-1 border-white mb-3" />
                                <a href="adminProfile.php" class="btn btn-info">My Profile</a>
                                <hr class="border border-1 border-white mb-3" />
                            </div>
                            <h4 class="text-white fw-bold">Categories</h4>
                            <hr class="border border-1 border-white mt-3" />

                            <div class="offcanvas-body">
                                <a href="category1.php">
                                    <button class="i5 ">PROCESSORS</button>
                                </a>

                                <a href="category2.php">
                                    <button class="i5 ">MOTHERBOARDS</button>
                                </a>

                                <a href="category3.php">
                                    <button class="i5">GRAPHIC CARDS</button>
                                </a>

                                <a href="category4.php">
                                    <button class="i5">MONITORS</button>
                                </a>

                                <a href="category5.php">
                                    <button class="i5">STORAGE DEVICES</button>
                                </a>

                                <a href="category6.php">
                                    <button class="i5">CASING</button>
                                </a>

                                <a href="category7.php">
                                    <button class="i5">LAPTOPS</button>
                                </a>

                                <a href="category8.php">
                                    <button class="i5">KEYBOARDS, MOUSE & GAMEPADS</button>
                                </a>

                                <a href="category9.php">
                                    <button class="i5">RAM</button>
                                </a>

                                <a href="category10.php mb-3">
                                    <button class="i5 mb-3">POWER SUPPLY</button>
                                </a>

                            </div>
                            <hr class="border border-1 border-white mb-3 mt-3" />
                            <h4 class="text-white fw-bold mb-32">Selling History</h4>
                            <hr class="border border-1 border-white" />
                            <a href="sellingHistory.php" class="btn btn-info mb-3">Selling History</a>
                            <hr class="border border-1 border-white mb-3" />
                        </div>
                    </div>
                </div>
            </div>


            

            <!-- <div class="col-12 mt-3">
                <div class="row">
                    <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="input-group mt-3 mb-3">
                                <input type="text" id="basicProduct_search_txt" class="form-control " placeholder="Search..." aria-label="Text input with dropdown button" 
                                style="border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                border-bottom-width: 4px; border-right-width: 4px;">

                                
                            </div>
                            <div class="col-lg-2 d-grid anime">
                                <button class="mainSearch mt-3 mb-3" onclick="productSearch(0);">Search</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-12 col-lg-10 mt-2 mb-3">
                <div class="text-center">
                    <label class="form-label text-primary fw-bold fs-1 mb-3">All Products</label>
                </div>
                <div class="row"> 
                    <div class="col-lg-1 bg-info py-2 text-end">
                        <span class="fs-5 fw-bold text-white">No:</span>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Product Image</span>
                    </div>
                    <div class="col-lg-3  bg-info py-2">
                        <span class="fs-5 fw-bold text-white">Title</span>
                    </div>
                    <div class="col-lg-3 col-lg-2 d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Price</span>
                    </div>
                    <div class="col-lg-1 d-none d-lg-block bg-info py-2">
                        <span class="fs-5 fw-bold text-white">Quantity</span>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Registered Date</span>
                        <!-- </div>
                    <div class="col-3 col-lg-2 bg-info">
                        <span class="fs-5 fw-bold">Products Block & Unblock</span>
                    </div> -->
                    </div>
                </div>

                <?php


                $query = "SELECT * FROM `product`";
                $pageno;

                require "connection.php";

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $product_rs = Database::search($query);
                $product_num = $product_rs->num_rows;

                $results_per_page = 10;
                $number_of_pages = ceil($product_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>

                    <div class="col-12 mt-3 mb-3" id="basicSearchResult">
                        <div class="row">
                            <div class="col-lg-1 bg-info py-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php echo $selected_data["id"]; ?></span>
                            </div>
                            <div class="col-lg-2 d-none d-lg-block bg-warning py-2" onclick="viewProductModal('<?php echo $selected_data['id']; ?>');">
                                <?php

                                $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $selected_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>

                                <img src="<?php echo $image_data["code"]; ?>" style="height: 80px;" />


                            </div>
                            <div class="col-lg-3 bg-info py-2">
                                <span class="fs-5 fw-bold text-white"><?php echo $selected_data["title"]; ?></span>
                            </div>
                            <div class="col-lg-3 d-lg-block bg-warning py-2">
                                <span class="fs-5 fw-bold">Rs. <?php echo $selected_data["price"]; ?> .00</span>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block bg-info py-2">
                                <span class="fs-5 fw-bold text-white"><?php echo $selected_data["qty"]; ?></span>
                            </div>
                            <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                                <span class="fs-5 fw-bold"><?php echo $selected_data["datetime_added"]; ?></span>
                            </div>

                        </div>
                    </div>

                    <!-- modal 01 -->
                    <div class="modal" tabindex="-1" id="viewProductModal<?php echo $selected_data["id"]; ?>">
                        <div class="modal-dialog ">
                            <div class="modal-content i4">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold text-success"><?php echo $selected_data["title"]; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="offset-4 col-4">
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $selected_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();
                                        ?>
                                        <img src="<?php echo $image_data["code"]; ?>" style="height: 150px;" />

                                    </div>
                                    <div class="col-12">
                                        <span class="fs-5 fw-bold">Price :</span>&nbsp;
                                        <span class="fs-5">Rs. <?php echo $selected_data["price"]; ?> .00</span><br /><br />
                                        <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                                        <span class="fs-5"> <?php echo $selected_data["qty"]; ?></span><br /><br />
                                        <span class="fs-5 fw-bold">Description :</span>&nbsp;
                                        <span class="fs-5"><?php echo $selected_data["description"]; ?></span><br /><br />
                                    </div>
                                </div>
                                <div class="modal-footer">;
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal 01 -->

                <?php

                }

                ?>

                <!--  -->
                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link bg-warning" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {
                            ?>
                                    <li class="page-item active">
                                        <a class="page-link bg-warning" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link bg-warning" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link bg-warning" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--  -->


            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
</body>

</html>