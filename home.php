<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | EPIC Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="d4">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <hr />

            <div class="col-12 justify-content-center">
                <div class="row" style="margin-top: 50px;">
 
                    
                    <div class="offset-lg-4 col-12 col-lg-4 d-none d-lg-block">
                        <div class="row">
                                        
                            <div class="col-12 col-lg-4 logo" style="height: 200px;" ></div>
                                        
                            <div class="col-8 text-center">
                                <p class="fs-1 text-warning fw-bold mt-3 pt-2">Epic Gamers Computer</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="offset-0 offset-lg-2 col-12 col-lg-6 anime">

                        <div class="input-group mt-3 mb-3">
                            <input type="text" id="basic_search_txt" class="form-control " placeholder="Search..." aria-label="Text input with dropdown button" 
                            style="border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-left-width: 4px; border-top-width: 4px;
                             border-bottom-width: 4px; border-right-width: 4px;">

                            <select class="form-select" id="basic_search_select" style="max-width: 250px; font-weight: bold; 
                            border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-right-width: 
                            4px; border-top-width: 4px; border-bottom-width: 4px;">
                                <option value="0">All Categories</option>
                                
                                <?php

                                require "connection.php";
                                

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

                    <div class="col-12 col-lg-2 d-grid anime">
                        <button class="mainSearch mt-3 mb-3" onclick="basicSearch(0);">Search</button>
                    </div>

                    <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start anime">
                        <a href="advancedSearch.php" class="link-info text-decoration-none fw-bold">Advanced</a>
                    </div>

                </div>
            </div>

             


            <div class="col-12" id="basicSearchResult">

                <div class="row">

                        
                    <!-- carousel -->

                    <div class="col-12 d-none d-lg-block anime" style="margin-top: 80px; animation-delay: 2s;">

                        <div class="row">
                            

                            <div  id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/slider images/posterimg.jpg" class="d-block poster-img-1"/>
                                        <div class="carousel-caption d-none d-md-block poster-caption">
                                            <h5 class="poster-title">Welcome to EPIC Gamers Computer Shop</h5>
                                            <p class="poster-txt">The World's Best Computer Shop.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg2.jpg" class="d-block poster-img-1"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg3.jpg" class="d-block poster-img-1"/>
                                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                                            <h5 class="poster-title2">Be Free...</h5>
                                            <p class="poster-txt">Experience the Lowest Delivery Costs With Us.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- carousel -->        
                </div>

            </div>
            <div class="col-12 d-lg-grid">
                <div class="row gap-2 offset-lg-1 mt-5 anime" style="margin-top: 100px; animation-delay: 4s;">
                    <a class="e1 col-lg-4 " href="category1.php" style="text-decoration: none; margin-top:50px ;"> 
                    
                        <button  class="e1 d5 d7i d5i popup" >PROCESSORS</button>
                    </a>
                    <br/>
                    <a class="e1  offset-lg-3 col-lg-4 " href="category2.php" style="text-decoration: none; margin-top:50px ;"> 
                        <button  class="e1 d5 d7ii  d5i popup">MOTHERBOARD</button>
                    </a>
                </div>
                <br/>
                <br/>
                <br/>
                <div class="row gap-2 offset-lg-1 anime" style="animation-delay: 5s;">
                    <a class="e1 col-lg-4 " href="category3.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7iii popup">GRAPHIC CARD</button>
                    </a> 
                    <br/>
                    <a class="e1 offset-lg-3 col-lg-4" href="category4.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7iv popup">MONITORS</button>
                    </a>
                </div>

                <br/>
                <br/>
                <br/>
                <div class="row gap-2 offset-lg-1 anime" style="animation-delay: 6s;">
                    <a class="e1 col-lg-4 " href="category5.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7v popup">STORAGE DEVICES</button>
                    </a> 
                    <br/> 
                    <a class="e1 offset-lg-3 col-lg-4 " href="category6.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7vi popup">CASING</button>
                    </a>
                </div>

                <br/>
                <br/>
                <br/>
                <div class="row gap-2 offset-lg-1 anime" style="animation-delay: 7s;">
                    <a class="e1 col-lg-4" href="category7.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7ix popup">RAM</button>
                    </a>
                    <br/>
                    <a class="e1 offset-lg-3 col-lg-3 " href="category8.php" style="text-decoration: none; margin-bottom: 50px;"> 
                        <button  class="e1 d5 d5i d7x popup">POWER SUPPLY</button>
                    </a>
                </div>

                <div class="row gap-2 offset-lg-1 anime" style="animation-delay: 8s;">
                    <a class="e1 col-lg-4" href="category7.php" style="text-decoration: none;"> 
                        <button  class="e1 d5 d5i d7vii popup">LAPTOPS</button>
                    </a>
                    <br/>
                    <a class="e1 offset-lg-3 col-lg-3 " href="category8.php" style="text-decoration: none; margin-bottom: 50px;"> 
                        <button  class="e1 d5 d5i d7viii popup">KEYBOARDS, MOUSE & GAMEPADS</button>
                    </a>
                </div>
            </div>
            <?php include "footer.php"; ?> 

        </div>
    </div>
                            
    

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    
    <script src="bootstrap.bundle.js"></script>
</body>

</html>