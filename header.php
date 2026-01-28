<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="col-12">
        <div class="row mt-1 mb-1">

            
            <nav class="navbar navbar-dark bg-dark fixed-top">

                <div class="offset-lg-1 col-12 col-lg-4 align-self-start mt-2" style="color: #00eaff;">
                    <?php
                    session_start();
                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>
                        <span class="text-lg-start"><b>EPIC Gamers Computer Shop </b></span> |
                        <a class="text-lg-start fw-bold signout text-warning" style="cursor: pointer;" onclick="signout();">Sign Out</a> 
                    <?php
                    } else {
                        ?>
                        <a href="index.php" class="text-decoration-none fw-bold">Sign In or Register</a>  
                        <?php
                    }
                    ?>    
                </div>

                 
                      
                    <!-- <form class="d-flex offset-1" role="search" >
                        <input class="form-control me-2 bg-secondary" type="search" placeholder="bi bi-search" aria-label="Search" id="basic_search_txt">
                        <button class="btn btn-primary " onclick="basicSearch(0);">Search</button>
                        <div class="offset-lg-1 col-4 col-lg-2 text-center ">
                            <a href="advancedSearch.php" class="flex-lg-shrink-0 text-decoration-none fw-bold">Advanced</a>
                        </div>
                    </form> -->
                    
                    
                        
                <button class="offset-lg-4 col-3 col-lg-1 mt-1 align-self-end bg-dark score " id="score" style=" border-color: #00eaff;  
                border-width: 3px; border-radius: 15px; font-weight: bold;" onclick="window.location='cart.php';"><i class="bi bi-cart-fill" style="color:#00eaff; 
                margin-right: 10px;"></i></button>

                <button class="col-5 col-lg-1 mt-1 text-secondary" style="height: 30px;border: none; border-radius: 15px; font-weight: bold; 
                box-shadow: 0px 0px 10px 2px;color: rgb(0, 221, 255); background-color: #00eaff;" onclick="window.location='watchlist.php';">watchlist</button>
                    
                
            
                <a class="navbar-brand"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active fs-4 text-info" aria-current="page" href="home.php">Home</a>
                        </li>
                        <div class="nav-item dropdown">
                            <button class="btn btn-info dropdown-toggle col-lg-8 fs-4 text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Details
                            </button> 
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item fs-4 text-info" href="userProfile.php">My Profile</a></li>
                                <!-- <li><a class="dropdown-item" href="myProducts.php">My Products</a></li> -->
                                <li><a class="dropdown-item fs-4 text-info" href="adminSignin.php" onclick="contactAdmin('<?php echo $_SESSION['u']['email']; ?>');">
                                    Admin Panel
                                </a></li>
                                <li><a class="dropdown-item fs-4 text-info" href="purchasingHistory.php">Purchasing History</a></li>
                                
                            </ul>
                        </div>
                    </ul>
                </div>
                    
            </nav>
                
        </div>

    </div>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
            
</body>