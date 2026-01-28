<?php

require "connection.php";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users | Admins | EPIC Gamers Computer</title>

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
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-warning">Search User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-12 col-lg-10 mt-3 mb-3">
                <div class="text-center">
                    <label class="form-label text-primary fw-bold fs-1">Manage All Users</label>
                </div>
                <div class="row">
                    <div class="col-lg-1 bg-info py-2 text-end">
                        <span class="fs-5 fw-bold text-white">No:</span>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-lg-2 col-lg-2 bg-info py-2">
                        <span class="fs-5 fw-bold text-white">User Name</span>
                    </div>
                    <div class="col-lg-2 col-lg-3 d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Email</span>
                    </div>
                    <div class="col-lg-1 d-none d-lg-block bg-info py-2">
                        <span class="fs-5 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-5 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-lg-1 col-lg-1 bg-info">
                        <span class="fs-5 fw-bold">User block & Unblock</span>
                    </div>
                </div> 

                <?php


                $query = "SELECT * FROM `user`";
                $pageno;

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $user_rs = Database::search($query);
                $user_num = $user_rs->num_rows;

                $results_per_page = 20;
                $number_of_pages = ceil($user_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <div class="col-12 mt-3 mb-3">
                        <div class="row">
                            <div class="col-lg-1 bg-info py-2 text-end">
                                <span class="fs-4 text-dark fw-bold"><?php echo $x + 1; ?></span>
                            </div>
                            <div class="col-lg-2 d-none d-lg-block bg-warning py-2" onclick="viewMsgModal('<?php echo $selected_data['email']; ?>');">
                                <?php
                                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");
                                $image_num = $image_rs->num_rows;
                                if ($image_num == 0) {
                                ?>
                                    <img src="resource/new_user.svg" style="height: 50px;margin-left: 50px;" />
                                <?php
                                } else {
                                    $image_data = $image_rs->fetch_assoc();
                                ?>

                                    <img src="<?php echo  $image_data["path"]; ?>" class="img-fluid" style="height: 50px; margin-left: 50px;" />

                                <?php
                                }

                                ?>



                            </div>
                            <div class="col-lg-2 bg-info py-2">
                                <span class="fs-6 text-dark"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                            </div>
                            <div class="col-lg-3 d-lg-block bg-warning py-2">
                                <span class="fs-6 "><?php echo $selected_data["email"]; ?></span>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block bg-info py-2">
                                <span class="fs-6 text-dark"><?php echo $selected_data["mobile"]; ?></span>
                            </div>
                            <div class="col-lg-2 d-none d-lg-block bg-warning py-2">
                                <span class="fs-6 "><?php echo $selected_data["joined_date"] ?></span>
                            </div>
                            <div class="col-lg-1 bg-info py-2 d-grid">
                                <?php

                                if ($selected_data["status_id"] == 1) {
                                ?>
                                    <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>
                                <?php
                                } else {
                                ?>
                                    <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-success" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Unblock</button>
                                <?php

                                }

                                ?>

                            </div>
                        </div>
                    </div>


                    <!-- msg modal -->
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
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>