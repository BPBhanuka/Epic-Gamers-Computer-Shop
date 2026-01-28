<?php

session_start();
require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) == 0) {
    $query = " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id`='" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "'";
}
 

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
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
                        <div class="col-2 col-lg-1 bg-info py-2 text-end">
                            <span class="fs-5 fw-bold text-white"><?php echo $selected_data["id"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-warning py-2" onclick="viewProductModal('<?php echo $selected_data['id']; ?>');">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $selected_data["id"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            
                            <img src="<?php echo $image_data["code"]; ?>" style="height: 80px;" />
                            

                        </div>
                        <div class="col-4 bg-info py-2">
                            <span class="fs-5 fw-bold text-white"><?php echo $selected_data["title"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-warning py-2">
                            <span class="fs-5 fw-bold">Rs. <?php echo $selected_data["price"]; ?> .00</span>
                        </div>
                        <div class="col-1 d-none d-lg-block bg-info py-2">
                            <span class="fs-5 fw-bold text-white"><?php echo $selected_data["qty"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-warning py-2">
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
                                    <span class="fs-5">Rs.  <?php echo $selected_data["price"]; ?> .00</span><br /><br />
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
                <!-- mod
            
            <?php

            }
            ?>

            

        </div>
    </div>
    <!  -->
     
            <!--  -->
</div>