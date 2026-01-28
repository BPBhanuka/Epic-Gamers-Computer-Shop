<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Panel | EPIC Gamers Computer</title>

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
                        <div class="col-12 align-items-start bg-dark" style="height: 2700px;">
                            <div class="row g-1 text-center">

                                <div class="col-12 mt-5">
                                    <h4 class="text-white start-text-uppercase"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4>
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

                <div class="col-12 col-lg-10">
                    <div class="row">

                        <div class="text-white fw-bold mb-1 mt-3">
                            <h2 class="fw-bold">Dashboard</h2>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <div class="row g-1">

                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">
                                        <div class="col-12 bg text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span>
                                            <br />
                                            <?php



                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                $f = $f + $invoice_data["qty"]; //total qty

                                                $d = $invoice_data["date"];
                                                $splitDate = explode(" ", $d); //separate date from time
                                                $pdate = $splitDate[0]; //sold date

                                                if ($pdate == $today) {
                                                    $a = $a + $invoice_data["total"];
                                                    $c = $c + $invoice_data["qty"];
                                                }

                                                $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                                $pyear = $splitMonth[0]; //year
                                                $pmonth = $splitMonth[1]; //month

                                                if ($pyear == $thisyear) {
                                                    if ($pmonth == $thismonth) {
                                                        $b = $b + $invoice_data["total"];
                                                        $e = $e + $invoice_data["qty"];
                                                    }
                                                }
                                            }

                                            ?>
                                            <span class="fs-5">Rs. <?php echo $a; ?> .00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg2 text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Earnings</span>
                                            <br />

                                            <span class="fs-5">Rs. <?php echo $b; ?> .00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Today Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $c; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg2 text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $e; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $f; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">
                                        <div class="col-12 bg2 text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Engagements</span>
                                            <br />
                                            <?php

                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                            <span class="fs-5"><?php echo $user_num; ?> Members</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="row">
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">PROCESSORS</label>
                                    </div>
                                    <div class="d7i shadow" style="width: 450px; height: 200px;"></div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='processors' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>
                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">MOTHERBOARDS</label>
                                        <div class="d7ii" style="width: 260px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='motherboards' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">GRAPHIC CARDS</label>
                                        <div class="d7iii" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='graphic cards' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">MONITORS</label>
                                        <div class="d7iv" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='monitors' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">STORAGE DEVICES</label>
                                        <div class="d7v" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='storage devices' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">CASING</label>
                                        <div class="d7vi" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='casing' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">LAPTOPS</label>
                                        <div class="d7vii" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='laptops' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">KEYBOARDS, MOUSE & GAMEPADS</label>
                                        <div class="d7viii" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='Keyboards, Mouse & Gamepads' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">RAM</label>
                                        <div class="d7ix" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='RAM' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="i3 offset-1 col-10 col-lg-3 my-3 rounded-4 bg-dark border border-4 border-warning popup2">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold text-primary text-decoration-underline">POWER SUPPLY</label>
                                        <div class="d7x" style="width: 280px; height: 200px;"></div>
                                    </div>
                                    <label class="fw-bold fs-4 text-center text-danger">Out of items Name</label>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">

                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE  `name`='power supply' ");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();
                                                ?>
                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `qty`='0' AND `category_id`='" . $cdata["id"] . "'");
                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="offset-lg-1 col-12 mt-1 mb-1">
                                                            <div class="row">
                                                                <div class="col-1 py-1">
                                                                    <span class="fw-bold text-info"><i class="bi bi-circle-fill fs-6"></i></span>
                                                                </div>
                                                                <div class="col-9 py-1">
                                                                    <div class="text-start text-white"><?php echo $product_data["title"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 p-3 mt-4" style="margin-bottom: 160px;">
                                <div class="row">
                                    <div class="col-12 col-lg-5 mx-auto d-block border border-2 rounded bg-gradient popup">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <p class="title2">Add New Category.</p>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label text-info fs-4 fw-bold">Category</label>
                                                <input type="email" class="form-control bg-warning" style="border-color: rgb(4, 188, 255); border-width: 4px;" placeholder="category name..." id="category" />
                                            </div>
                                            <div class="col-12 d-grid mt-4 mb-4">
                                                <button class="signInbutton" onclick="addCategory();">Add Category</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 mx-autod-block border border-2 rounded bg-gradient popup">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <p class="title2">Add New Brand.</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label text-info fs-4 fw-bold">Brand</label>
                                                    <div class="input-group col-lg-6">

                                                        <input type="email" class="form-control bg-warning col-lg-6" style="border-color: rgb(4, 188, 255); border-width: 4px;" placeholder="brand name..." id="brand" />

                                                        <select class="form-select bg-warning" id="category2" style="max-width: 250px; font-weight: bold; border-right-width: 
                                                            4px; border-top-width: 4px; border-bottom-width: 4px; border-color: rgb(4, 188, 255);">
                                                            <option value="0">All Categories</option>

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


                                            <div class="col-12 d-grid mt-4 mb-4">
                                                <button class="signInbutton" onclick="addBrand();">Add Brand</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        <div class="col-12 d-none d-lg-block bm-5 b1">
                            <p class="text-center">&copy; 2024 egcomputer.lk || All Rights Reserved</p>
                        </div>
                        <!-- footer -->
                    </div>
                </div>


            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php

} else {
    echo ("You are Not a valid user");
}

?>