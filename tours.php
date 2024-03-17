<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>About - Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <h1 class="headings sub-heading">Destinations</h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumbs-list lead">
                <li class="breadcrumbs-item">
                    <a href="index.php" class="breadcrumbs-link"><i class="fa-solid fa-home"></i> Home</a>
                </li>
                <li class="breadcrumbs-item">
                    <a href="" class="breadcrumbs-link-active">Tours</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h1 class="headings mini-heading">Tours</h1>
        <p class="lead mini-lead"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque corporis repellat incidunt ex, libero accusantium eum quia sed praesentium, odit itaque! Aliquam possimus veritatis, repudiandae vel, temporibus debitis eos reiciendis voluptates recusandae maiores autem nostrum dignissimos voluptatibus libero distinctio sed veniam exercitationem? Facilis fuga dignissimos perferendis vel ullam eius cumque.</p>
    </div>

    <!-- search  -->
    <div class="container">
        <div class="category-contain">
            <form method="post" id="package_filter_form" class="form">
                <div class="form-group">
                    <label for="pkg_category">Category</label>
                    <select aria-label="Title" class="form-control" name="pkg_category" id="pkg_category">
                        <option value="">Please Select</option>
                        <option value="ayurvedic-tours">Ayurvedic tours</option>
                        <option value="beach-holidays">Beach holidays</option>
                        <option value="cultural-tours">Cultural tours</option>
                        <option value="hill-country-tours">Hill country tours</option>
                        <option value="honeymoon-tours">Honeymoon tours</option>
                        <option value="luxury-tours">Luxury tours</option>
                        <option value="sports-tours">Sports tours</option>
                        <option value="wildlife-adventure-tours">Wildlife &amp; Adventure tours</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pkg_destination">Destinations</label>
                    <select aria-label="Destination" class="form-control" name="pkg_destination" id="pkg_destination">
                        <option value="">Please Select</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Bentota">Bentota</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Dambulla">Dambulla</option>
                        <option value="Ella">Ella</option>
                        <option value="Galle">Galle</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalpitiya">Kalpitiya</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kithulgala">Kithulgala</option>
                        <option value="Negombo">Negombo</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Wilpattu">Wilpattu</option>
                        <option value="Yala">Yala</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pkg_nights">Number of Nights</label>
                    <select aria-label="Number of Nights" class="form-control" name="pkg_nights" id="pkg_nights">
                        <option value="">Please Select</option>
                        <option value="2">2</option>
                        <option value="7">7</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <button type="button" id="pkg_filter_btn" name="signup" class="primary-btn-search">Search Now</button>
                    <button id="reserBtnn" class="primary-btn btn-new-btn" onclick="showAll()" style="display: none; margin-left: 10px;">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="tour-items-wrapper row-wise-img">
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Tusker Elephant in the Jungle">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Wildlife Experience</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
                <div class="hidden-content-package">
                    <span><i class="fa fa-clock"></i>10 Days</span><br>
                    <span><i class="fa fa-user"></i>12+</span><br>
                    <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                </div>

            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Tusker Elephant in the Jungle">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Wildlife Experience</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Tusker Elephant in the Jungle">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Wildlife Experience</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>
            <a class="item-box" href="#">
                <div class="img-wrapper">
                    <img src="Images/counter.jpg" alt="Nature in Hiriwaduna Village">
                </div>
                <div class="text-item-box tour-item-box">
                    <div class="heading-legend">Sri Lanka in Style</div>
                    <div class="text-small-legend"></div>
                    <div class="btn-wrapper-common">
                        <span>Find Out More</span>
                    </div>
                </div>
            </a>

        </div>
    </div>



 <!-- Footer -->
 <?php
include 'components/footer.php';
?>

<script src="../js/script.js"></script>

</body>

</html>