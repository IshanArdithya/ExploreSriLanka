<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>Tour - Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Tours</li>
            </ol>
        </div>

        <div class="container">
            <h1 class="headings mini-heading">Tours</h1>
            <p class="lead mini-lead"> Explore our extensive collection of mesmerizing tour packages, each crafted to showcase the diverse beauty and rich heritage of Sri Lanka. Embark on exhilarating adventures through rugged landscapes, ancient ruins, and pristine beaches, or delve into the tranquil charm of scenic hillside retreats and wildlife safaris. Our carefully curated selection caters to all tastes and preferences, whether you're seeking adrenaline-pumping expeditions, cultural immersions, or leisurely escapes. With options ranging from exploring historic cities like Anuradhapura to diving into coastal paradises like Hikkaduwa, there's something for every traveler. Utilize our intuitive filtering system to tailor your journey according to category, destination, and duration. Start your exploration of Sri Lanka's wonders today and create unforgettable memories that will last a lifetime.</p>
        </div>

        <!-- search  -->
        <div class="container">
            <div class="category-contain">
                <form method="post" id="package_filter_form" class="form">
                    <div class="form-group">
                        <label for="pkg_category">Category</label>
                        <select aria-label="Title" class="form-control" name="pkg_category" id="pkg_category">
                            <option value="">Please Select</option>
                            <option value="Adventure-Expedition">Adventure-Expedition</option>
                            <option value="Ancient-Cities-Exploration">Ancient-Cities-Exploration</option>
                            <option value="Beach-Bliss-Retreat">Beach-Bliss-Retreat</option>
                            <option value="Coastal-Dive-Expedition">Coastal-Dive-Expedition</option>
                            <option value="Nothern-Discovery">Nothern-Discovery</option>
                            <option value="Rainforest-Adventure-Trek">Rainforest-Adventure-Trek</option>
                            <option value="Scenic-Hillside-Retreat">Scenic-Hillside-Retreat</option>
                            <option value="Coastal-Escape-Retreat">Coastal-Escape-Retreat</option>
                            <option value="Wildlife-Safari-Adventure">Wildlife-Safari-Adventure</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pkg_destination">Destinations</label>
                        <select aria-label="Destination" class="form-control" name="pkg_destination" id="pkg_destination">
                            <option value="">Please Select</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Ella">Ella</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalpitiya">Sinharaja</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Hikkaduwa">Hikkaduwa</option>
                            <option value="Yala">Yala</option>
                            <option value="Nuwara-Eliya">Nuwara-Eliya</option>
                            <option value="Unawatuna">Unawatuna</option>
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
                <a class="item-box" href="tours/Adventure-Expedition.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/adventure001.jpeg" alt="">
                    </div>
                    <div class="text-item-box ">
                        <div class="heading-legend">Adventure Expedition</div>
                        <div class="text-small-legend">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus, perspiciatis?</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                            <!-- <button>Find Out More</button> -->
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 9 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 10 Days</span><br>
                        <span><i class="fa fa-user"></i> 12+</span><br>
                    </div>
                </a>
                <a class="item-box" href="tours/Ancient-Cities-Exploration.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/ancienr01.webp" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Ancient Cities Exploration</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Beach-Bliss-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/beach01.jpeg" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Beach Bliss Retreat</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Coastal-Dive-Expedition.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/coastal01.jpeg" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Coastal Dive Expedition</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Northern-Discovery.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/north01.avif" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Northern Discovery </div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Rainforest-Adventure-Trek.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/forest01.jpeg" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend"> Rainforest Adventure Trek</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Scenic-Hillside-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/hills01.avif" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Scenic Hillside Retreat </div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Wildlife-Safari-Adventure.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/safari01.jpg" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Wildlife Safari Adventure </div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="tours/Coastal-Escape-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/escape001.jpeg" alt="Nature in Hiriwaduna Village">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend"> Coastal Escape Retreat</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>

<button id="toTop" class="fa fa-arrow-up"></button>


    <script src="js/script.js"></script>

</body>

</html>