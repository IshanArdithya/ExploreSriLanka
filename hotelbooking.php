<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Hotel | Explore Sri Lanka</title>
    <link rel="stylesheet" href="css/hotelbooking.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.js" crossorigin="anonymous">
    </script>
</head>


<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slides/slide-22.jpg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Hotel</li>
            </ol>
        </div>

        <div class="container">
            <h1 class="headings mini-heading">Hotels to Stay</h1>
            <p class="lead mini-lead"></p>

            <div class="list-container">
                <div class="left-col">
                    <p>50+ Options</p>
                    <h1>Recommended Places to Stay</h1>
                    <div class="house">
                        <div class="house-img">
                            <img src="images/Hotel1.jpg">
                        </div>
                        <div class="house-info" id="house-info">
                            <p>Private Villa in Pasikudah</p>
                            <h3>Deluxe Queen Room With Street View</h3>
                            <p>1 Bedroom / 1 Bathroom / Wifi / Kitchen</p>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-regular fa-star-half-stroke" id="star"></i>
                            <i class="fa-regular fa-star" id="star"></i>
                            <div class="house-price">
                                <p>2 Guest</p>
                                <h4>$ 100 <span1>/ day</span1>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="house">
                        <div class="house-img">
                            <img src="images/Hotel2.jpg">
                        </div>
                        <div class="house-info" id="house-info">
                            <p>Private Villa in Pasikudah</p>
                            <h3>Deluxe Queen Room With Street View</h3>
                            <p>1 Bedroom / 1 Bathroom / Wifi / Kitchen</p>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-regular fa-star-half-stroke" id="star"></i>
                            <i class="fa-regular fa-star" id="star"></i>
                            <div class="house-price">
                                <p>2 Guest</p>
                                <h4>$ 100 <span1>/ day</span1>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="house">
                        <div class="house-img">
                            <img src="images/Hotel3.jpg">
                        </div>
                        <div class="house-info" id="house-info">
                            <p>Private Villa in Pasikudah</p>
                            <h3>Deluxe Queen Room With Street View</h3>
                            <p>1 Bedroom / 1 Bathroom / Wifi / Kitchen</p>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-solid fa-star" id="star"></i>
                            <i class="fa-regular fa-star-half-stroke" id="star"></i>
                            <i class="fa-regular fa-star" id="star"></i>
                            <div class="house-price">
                                <p>2 Guest</p>
                                <h4>$ 100 <span1>/ day</span1>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-col">
                    <div class="sidebar">
                        <h2>Select Filters</h2>
                        <h3>Property Type</h3>
                        <div class="filter">
                            <input type="checkbox">
                            <p>House</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Hostal</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Flat</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Villa</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Guest Suite</p> <span>(0)</span>
                        </div>
                        <h3>Amenities</h3>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Air Conditioning</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>wifi</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Gym</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Pool</p> <span>(0)</span>
                        </div>
                        <div class="filter">
                            <input type="checkbox">
                            <p>Kitchen</p> <span>(0)</span>
                        </div>

                        <div class="sidebar-link">
                            <a href="#">View More > </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination">
        <img src="images/left.png">
        <span3 class="current">1</span3>
        <span3>2</span3>
        <span3>3</span3>
        <span3>4</span3>
        <span3>5</span3>
        <span3> &middot; &middot; &middot; &middot; </span3>
        <span3>20</span3>
        <img src="images/right.png">
    </div>


    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>

<button id="toTop" class="fa fa-arrow-up"></button>

</body>
<script src="js/script.js"></script>

</html>