<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Purchasing History | EPIC Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php";
            require "connection.php";

            if (isset($_SESSION["u"])) {
                $umail = $_SESSION["u"]["email"];

                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $umail . "'");
                $invoice_num = $invoice_rs->num_rows;

            ?>

                <div class="col-12 text-center mb-3 mt-5">
                    <span class="fs-1 text-primary fw-bold">Purchasing History</span>
                </div>

                <?php
                if ($invoice_num == 0) {
                ?>
                    <div class="offset-lg-1 col-10 bg-light text-center" style="height: 450px;">
                        <span class="fs-1 fw-bolder text-warning d-block" style="margin-top: 200px;">
                            You have not purchased any product yet...
                        </span>
                    </div>
                <?php
                } else {
                ?>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 d-none d-lg-block">
                                <div class="row">
                                    <div class="col-1 bg-info">
                                        <label class="form-label fw-bold">No:</label>
                                    </div>
                                    <div class="col-5 bg-warning">
                                        <label class="form-label fw-bold">Order Details</label>
                                    </div>
                                    <div class="col-2 bg-info text-end">
                                        <label class="form-label fw-bold">Quantity</label>
                                    </div>
                                    <div class="col-2 bg-warning text-end">
                                        <label class="form-label fw-bold">Amount</label>
                                    </div>
                                    <div class="col-2 bg-info text-end">
                                        <label class="form-label fw-bold">Purchased Date & Time</label>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div> 
                                </div>
                            </div>

                            <?php
                            for ($x = 0; $x < $invoice_num; $x++) {
                                $invoice_data = $invoice_rs->fetch_assoc();
                            ?>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-1 bg-info text-center text-lg-start">
                                            <label class="form-label text-white fs-6 py-5"><?php echo $invoice_data["id"]; ?></label>
                                        </div>
                                        <div class="col-12 col-lg-5  bg-warning">
                                            <div class="row">
                                                <div class="card mx-0 mx-lg-1 my-2 bg-info" style="max-width: 550px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-3">
                                                            <?php
                                                            $pid = $invoice_data["product_id"];
                                                            $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "' ");
                                                            $image_data = $image_rs->fetch_assoc();
                                                            ?>
                                                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="height: 100px;"/>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <?php
                                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                                                $product_data = $product_rs->fetch_assoc();

                                                                $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "' ");
                                                                $seller_data = $seller_rs->fetch_assoc();
                                                                ?>
                                                                <h5 class="card-title"><?php echo $product_data["title"]; ?></h5>
                                                                <p class="card-text"><b>Buyer : </b><?php echo $seller_data["fname"] . " " . $seller_data["fname"]; ?></p>
                                                                <p class="card-text"><b>Price : </b>Rs. <?php echo $product_data["price"]; ?> .00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-2 text-center text-lg-end bg-info">
                                            <label class="form-label fs-4 py-5"><?php echo $invoice_data["qty"]; ?></label>
                                        </div>
                                        <div class="col-12 col-lg-2 text-center text-lg-end bg-warning">
                                            <label class="form-label fs-5 py-5 text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</label>
                                        </div>
                                        <div class="col-12 col-lg-2 text-center text-lg-end bg-info">
                                            <label class="form-label fs-5 px-3 py-5"><?php echo $invoice_data["date"]; ?></label>
                                        </div>
                                        

                                         

                                    </div>
                                </div>
                                 <div class="col-12">
                                        <hr />
                                    </div> 

                            <?php
                            }
                            ?>

                            



                        </div>
                    </div>

            <?php
                }
            }
            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>