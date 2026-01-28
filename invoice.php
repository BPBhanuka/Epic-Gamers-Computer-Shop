<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | EPIC Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="mt-2 d4">

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {
                $umail = $_SESSION["u"]["email"];
                $oid = $_GET["id"];
            ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 btn-toolbar justify-content-end mt-5">
                    <button class="btn btn-info me-2"><i class="bi bi-printer-fill" onclick="printInvoice();"></i> Print</button> 
                </div>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage"></div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-primary text-decoration-underline text-end">
                                    <h2>EPIC Gamers Computer</h2>
                                </div>
                                <div class="col-12 fw-bold text-end">
                                    <span class="text-light">Minuwangoda, Gampaha 110/11, Sri Lanka</span><br />
                                    <span class="text-light">+9477 72233634</span><br />
                                    <span class="text-light">EGcomputer@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-2 border-success" />
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                            <?php
                            
                            $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$umail."'");
                            $address_data =$address_rs->fetch_assoc();
                            
                            ?>

                                <div class="col-6">
                                    <h5 class="fw-bold text-primary">INVOICE TO :</h5>
                                    <h2 class="text-light"><?php echo $_SESSION["u"]["fname"]." ".$_SESSION["u"]["lname"]; ?></h2>
                                    <span class="text-light"><?php echo $address_data["line 1"]." ".$address_data["line 2"]; ?></span><br />
                                    <span class="text-light"><?php echo $umail; ?></span>
                                </div>

                                <?php
                                
                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='".$oid."'");
                                $invoice_data = $invoice_rs->fetch_assoc();
                                
                                ?>

                                <div class="col-6 text-end mt-4">
                                    <h1 class="text-primary">INVOICE <?php echo $invoice_data["id"]; ?></h1>
                                    <span class="fw-bold text-light">Data & Time of Invoice : </span>&nbsp;
                                    <span class="fw-bold text-light"><?php echo $invoice_data["date"]; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th class="text-info">No :</th>
                                        <th class="text-warning">Order ID & Product</th>
                                        <th class="text-end text-info ">Unit Price</th>
                                        <th class="text-end text-warning">Quantity</th>
                                        <th class="text-end text-info">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="bg-info text-white fs-3"><?php echo $invoice_data["id"]; ?></td>
                                        <td class="bg-warning">
                                            <span class="fw-bold text-primary text-decoration-underline p-2"><?php echo $oid; ?></span><br />
                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$invoice_data["product_id"]."'");
                                            $product_data = $product_rs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-primary fs-3 p-2"><?php echo $product_data["title"]; ?></span>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-info text-white">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-warning"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-info text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php
                                    
                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$address_data["city_id"]."'");
                                    $city_data = $city_rs->fetch_assoc();
                                    
                                    $delivery = 0;
                                    if($city_data["district_id"] == 4){
                                        $delivery = $product_data["delivery_fee_colombo"];
                                    }else{
                                        $delivery = $product_data["delivery_fee_other"];
                                    }

                                    $t = $invoice_data["total"];
                                    $g = $t - $delivery;
                                    
                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                        <td class="text-end text-white">Rs. <?php echo $g; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary">Delivery Fee</td>
                                        <td class="text-end border-primary text-white">Rs. <?php echo $delivery; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-4 text-center" style="margin-top: -100px;">
                            <span class="fs-1 fw-bold text-success">Thank You !</span>
                        </div>

                        <div class="offset-lg-1 col-10 mt-3 mb-3 border-0 border-start border-5 border-primary rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-2">
                                    <label class="form-label fs-5 fw-bold">NOTICE : </label>
                                    <br />
                                    <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-info fw-bold">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label>
                        </div>

                    </div>
                </div>

            <?php
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>