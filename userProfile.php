<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | Epic Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <br/>
            <br/>

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];


                $details_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN `province` ON 
                district.province_id=province_id WHERE `user_email`='" . $email . "'");


                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();


            ?>

                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-10 offset-1  bg-secondary rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resource/new_user.svg" class="rounded-circle mt-5" style="width: 150px;" id="viewImg"/>
                                        <?php

                                        } else {

                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewImg"/>
                                        <?php

                                        }

                                        ?>



                                        <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile Image</label>

                                    </div>
                                </div>

                                <div class="col-md-8 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" value="<?php echo $data["fname"]; ?>" id="fname"/>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" value="<?php echo $data["lname"]; ?>" id="lname"/>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" value="<?php echo $data["mobile"]; ?>" id="mobile"/>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label" >Password</label>
                                                <div class="input-group"  >
                                                    <input type="password" class="form-control bg-info" style="border-top-left-radius: 20px; border-color: #faac1b; border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                                                    border-bottom-width: 4px; " readonly value="<?php echo $data["password"]; ?>" />
                                                    
                                                    <span class="input-group-text bg-primary" style="max-width: 250px; font-weight: bold;
                                                    border-top-right-radius: 20px; border-color: #faac1b; border-bottom-right-radius: 20px; border-right-width: 
                                                    4px; border-top-width: 4px; border-bottom-width: 4px;" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control bg-info" style="border-radius:15px ; border-color: #faac1b; border-radius: 20px; border-width: 4px; 
                                                box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control bg-info"  style="border-radius:15px ; border-color: #faac1b ; border-radius: 20px; border-width: 4px; 
                                                box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"readonly value="<?php echo $data["joined_date"]; ?>" />
                                            </div>

                                            <?php

                                            if (!empty($address_data["line 1"])) {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" value="<?php echo $address_data["line 1"]; ?>" id="line1"/>
                                                </div>

                                            <?php

                                            } else {
                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" id="line1"/>
                                                </div>

                                            <?php
                                            }

                                            if (!empty($address_data["line 2"])) {

                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control bg-warning" 
                                                    style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"value="<?php echo $address_data["line 2"]; ?>" id="line2"/>
                                                </div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control bg-warning"style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" id="line2"/>
                                                </div>
                                            <?php
                                            }

                                       
                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            ?>

                                            <div class="col-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-select bg-warning"style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"id="province">
                                                    <option value="0">Select Province</option>
                                                    <?php
                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["province_id"])) {

                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $province_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">District</label>
                                                <select class="form-select bg-warning"style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" id="district">
                                                    <option value="0" >Select District</option>
                                                    <?php
                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>><?php echo $district_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">City</label>
                                                <select class="form-select bg-warning"style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" id="city">
                                                    <option value="0" >Select City</option>
                                                    <?php
                                                    $city_rs = Database::search("SELECT * FROM `city`");
                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                            if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                        ?>selected<?php
                                                                                                            }
                                                                                                        }
                                                                            ?>><?php echo $city_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php

                                            if (!empty($address_data["postal_code"])) {
                                            ?>
                                                <div class="col-6">
                                                    <label class="form-label">Postal-Code</label>
                                                    <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)"value="<?php echo $address_data["postal_code"]; ?>" id="pcode"/>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-6">
                                                    <label class="form-label">Postal-Code</label>
                                                    <input type="text" class="form-control bg-warning" style="border-radius:15px ; border-color: rgb(4, 188, 255); border-radius: 20px; border-width: 4px; 
                                                    box-shadow: 0px 0px 10px 5px;color: rgb(84, 84, 84)" id="pcode"/>
                                                </div>
                                            <?php
                                            }

                                            ?>
 

                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                               
                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/epicgamerscomputershop/home.php");
            }

            ?>



            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>