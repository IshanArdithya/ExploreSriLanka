<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>Tours | Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slides/slide-13.jpg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
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
                            <option value="">All</option>
                            <option value="Adventure-Expeditions">Adventure </option>
                            <option value="Historical and Cultural Exploration">Historical and Cultural </option>
                            <option value="Beach and Coastal Retreats">Beach and Coastal </option>
                            <option value="Nature Retreats and Scenic Tours">Nature </option>
                            <option value="Northern Exploration">Northern </option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <button id="resetBtnn" class="primary-btn-search" onclick="showAll()" style="display: none; margin-left: 20px;">Reset</button>
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
                        <div class="text-small-legend">Embark on an adrenaline-fueled journey through breathtaking landscapes, offering a perfect blend of excitement and natural beauty.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                            <!-- <button>Find Out More</button> -->
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 4 Persons</span><br>
                    </div>
                </a>
                <a class="item-box" href="tours/Ancient-Cities-Exploration.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/ancienr01.webp" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Ancient Cities Exploration</div>
                        <div class="text-small-legend">Step back in time and immerse yourself in the rich history and cultural heritage of ancient cities, where every corner tells a story of civilizations long past.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 6 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Beach-Bliss-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/beach01.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Beach Bliss Retreat</div>
                        <div class="text-small-legend">Indulge in ultimate relaxation as you sink your toes into powdery sands, bask in the warm sun, and let the rhythmic waves lull you into a state of serenity.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 6 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Coastal-Dive-Expedition.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/coastal01.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Coastal Dive Expedition</div>
                        <div class="text-small-legend">Dive into the vibrant underwater world of coastal regions, where colorful coral reefs and exotic marine life await exploration beneath the azure waters.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 6 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Northern-Discovery.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/north01.avif" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Northern Discovery </div>
                        <div class="text-small-legend">Uncover the untouched northern wilderness, where rugged landscapes, pristine lakes, and enchanting forests offer off-the-beaten-path adventures.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 3 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 4 Days</span><br>
                        <span><i class="fa fa-user"></i> 6 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Rainforest-Adventure-Trek.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/forest01.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend"> Rainforest Adventure Trek</div>
                        <div class="text-small-legend">
                            Explore lush rainforests' heart, where towering trees, cascading waterfalls, and diverse wildlife offer an immersive nature playground.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 6 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Scenic-Hillside-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/hills01.avif" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Scenic Hillside Retreat </div>
                        <div class="text-small-legend">Indulge in hillside hideaways with panoramic views, where nature's tranquility meets luxury for discerning travelers.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 4 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 5 Days</span><br>
                        <span><i class="fa fa-user"></i> 8 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Wildlife-Safari-Adventure.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/safari01.jpg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Wildlife Safari Adventure </div>
                        <div class="text-small-legend">Explore thrilling safaris in untamed wilderness, encountering majestic lions, elephants, and giraffes for unforgettable moments.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 3 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 4 Days</span><br>
                        <span><i class="fa fa-user"></i> 8 Persons</span><br>
                    </div>
                </a>

                <a class="item-box" href="tours/Coastal-Escape-Retreat.php">
                    <div class="img-wrapper">
                        <img src="./tours/Images/escape001.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend"> Coastal Escape Retreat</div>
                        <div class="text-small-legend">Discover coastal luxury in exclusive retreats by pristine shores, where indulgent amenities and perfect sunsets ensure ultimate relaxation.</div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                    <div class="hidden-content-package">
                        <span><i class="fa fa-moon"></i> 2 Nights</span><br>
                        <span><i class="fa fa-clock"></i> 3 Days</span><br>
                        <span><i class="fa fa-user"></i> 8 Persons</span><br>
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

    <script>
document.addEventListener("DOMContentLoaded", function() {
    
    var resetButton = document.getElementById('resetBtnn');
    resetButton.style.display = 'none';

    var categorySelect = document.getElementById("pkg_category");
    var tourItems = document.querySelectorAll(".item-box");

    categorySelect.addEventListener("change", function() {
        var selectedCategory = categorySelect.value;
        tourItems.forEach(function(item) {
            item.style.display = "none";
        });

        // filter function
        if (selectedCategory === "Adventure-Expeditions") {
            showTourItems(["Adventure-Expedition", "Rainforest-Adventure-Trek", "Wildlife-Safari-Adventure"]);
        } else if (selectedCategory === "Historical and Cultural Exploration") {
            showTourItems(["Ancient-Cities-Exploration"]);
        } else if (selectedCategory === "Beach and Coastal Retreats") {
            showTourItems(["Beach-Bliss-Retreat", "Coastal-Dive-Expedition", "Coastal-Escape-Retreat"]);
        } else if (selectedCategory === "Nature Retreats and Scenic Tours") {
            showTourItems(["Scenic-Hillside-Retreat"]);
        } else if (selectedCategory === "Northern Exploration") {
            showTourItems(["Northern-Discovery"]);
        } else if (selectedCategory === "") {
            tourItems.forEach(function(item) {
                item.style.display = "block";
            });
        }

        resetButton.style.display = selectedCategory ? 'none' : 'none';
    });

    function showTourItems(tourItemIds) {
        tourItemIds.forEach(function(itemId) {
            var tourItem = document.querySelector('a[href="tours/' + itemId + '.php"]');
            if (tourItem) {
                tourItem.style.display = "block";
            }
        });
    }

    function showAll() {
        tourItems.forEach(function(item) {
            item.style.display = "none";
        });

        categorySelect.value = "";

        resetButton.style.display = 'none';
    }
});


</script>    
</body>

</html>