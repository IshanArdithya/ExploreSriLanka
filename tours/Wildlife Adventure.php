<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />


    <title>About - Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include '../components/header.php';
    ?>

    <div class="top-image">
        <!-- <h1 class="headings sub-heading">Wildlife Adventure</h1>
        <h2 class="heading-normal-txt-mini">Tours</h2> -->
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li><a href="../tours.php">Tours</a></li>
                <li class="active">Wildlife Adventure</li>
            </ol>
        </div>

        <!-- Heading -->
        <h1 class="mini-heading" style="margin-top: 20px;">Wildlife Adventure</h1>
        <p class="lead mini-lead"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque corporis repellat incidunt ex, libero accusantium eum quia sed praesentium, odit itaque! Aliquam possimus veritatis, repudiandae vel, temporibus debitis eos reiciendis voluptates recusandae maiores autem nostrum dignissimos voluptatibus libero distinctio sed veniam exercitationem? Facilis fuga dignissimos perferendis vel ullam eius cumque.</p>

        <div class="owl-carousel owl-theme">
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
        </div>

        <!-- Content -->

        <div class="tab-package">
            <div class="tabbed-content">
                <nav class="tabs">
                    <ul>
                        <li><a href="#tab1" class="active">Overview</a></li>
                        <li><a href="#tab2">Hotel</a></li>
                        <li><a href="#tab3">Tour Guide</a></li>
                        <li><a href="#tab4">Pricing</a></li>
                    </ul>
                </nav>

                <div id="tab1" class="item active" data-title="Overview">
                    <div class="item-content">
                        <div class="overview-content">
                            <div class="heading-text">
                            </div>
                            <div class="text-content">
                                <ul>
                                    <li>En-suite spa treatment at The River House (full body massage – 45 minutes).</li>
                                    <li>Morning visit to the market with a local chef followed by a cookery demonstration.</li>
                                    <li>Yoga session on the river deck (2 hours).</li>
                                    <li>Boat ride (Including visits to a Cinnamon Plantation, temple, etc.).</li>
                                    <li>Cycle tour to a village guided by a local trekker.</li>
                                    <li>Candlelit dinner by the pool at The River House.</li>
                                    <li>Tuk Tuk transfer to Shinagawa.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="item" data-title="Hotel">
                    <div class="item-content">
                        <div class="itinerary-content">

                        <?php
                require_once '../config.php';
                $conn = mysqli_connect($hostname, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT full_name, short_desc, hotel_picture FROM hotels WHERE city IN ('Kandy', 'Colombo')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<div class="destination-content-container">';
                        echo '<div class="destination-image-container">';
                        $image_location = $row['hotel_picture'];
                        echo '<img src="../' . $image_location . '" alt="">';
                        echo '</div>';
                        echo '<div class="destination-hotel-container">';
                        echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
                        echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                        echo '<p class="content-paragraph">Read more</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No hotels found in Kandy.";
                }

                mysqli_close($conn);
              ?>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="item" data-title="Tour Guides">
                    <div class="item-content">
                        <div class="itinerary-content">
                            <div class="destination-content-container">
                                <div class="tourguide-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                            <div class="destination-content-container">
                                <div class="tourguide-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                            <div class="destination-content-container">
                                <div class="tourguide-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab4" class="item" data-title="Pricing">
                    <div class="item-content">
                        <div class="itinerary-content">

                            <div class="destination-content-container">
                                <div class="destination-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                            <div class="destination-content-container">
                                <div class="destination-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                            <div class="destination-content-container">
                                <div class="destination-image-container">
                                    <img src="../Images/slide1.jpg" alt="">
                                </div>
                                <div class="destination-hotel-container">
                                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                                    <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                                    <p class="content-paragraph">Read more</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <h1 class="headings">Related <span>Tours</span></h1>

        <div class="owl-carousel-1 owl-theme">
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
            <div> <img src="../Images/about.jpg" alt=""> </div>
        </div>
    </div>

    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tabs = document.querySelectorAll('.tabs a');
            tabs.forEach(function(tab) {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    var targetTab = this.getAttribute('href').slice(1);
                    var activeTab = document.querySelector('.item.active');
                    if (activeTab) {
                        activeTab.classList.remove('active');
                    }
                    document.getElementById(targetTab).classList.add('active');
                    document.querySelector('.tabs a.active').classList.remove('active');
                    this.classList.add('active');
                });
            });
        });
    </script>





    <!-- Footer -->
    <?php
    include '../components/footer.php';
    ?>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../js/script.js"></script>

    <script>
$(document).ready(function() {
    // First Owl Carousel with 4 items per view
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
    });

    // Second Owl Carousel with 3 items per view
    var owl1 = $('.owl-carousel-1');
    owl1.owlCarousel({
        items: 3,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
    });
});

    </script>
</body>

</html>