<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Sri Lanka</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <!-- Slide -->
    <main>
        <div class="slider-container swiper">
            <div class="slider-content swiper-wrapper">
                <div class="overlay swiper-slide">
                    <img src="./Images/slides/slide-10.jpg" alt="">
                    <div class="img-overlay">
                        <p>Lets Travel around Srilanka with us</p>
                        <h2><span>Discover</span> Sri Lanka</h2>
                        <h2>with Our Guide</h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./Images/slides/slide-8.jpg" alt="">
                    <div class="img-overlay">
                        <p>Escape to the beauty of Sri Lanka's coastline with us</p>
                        <h2><span>Find Your </span>Perfect Beach</h2>
                        <h2>Enjoy Coastal Bliss</h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./Images/slides/slide-9.jpg" alt="">
                    <div class="img-overlay">
                        <p>Escape natural wonders of Sri Lanka's landscapes.</p>
                        <h2>Explore <span>Nature's Retreats</span></h2>
                        <h2>Enveloped in Elegance</h2>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="scroll-arrow">
        <div class="container">
            <div id="scroll-down">
                <a href="#about" class="scroll-down-link">
                    <span><i class="fa-solid fa-angles-down"></i></span>
                </a>
            </div>
        </div>
    </section>

    <!-- <section id="get-started">
    <div class="container">
        <div class="get-started-wrapper">
            <h2 class="headings">Ready to Explore Sri Lanka?</h2>
            <p class="lead">Start planning your adventure today!</p>
            <a href="#" class="primary-btn1">Get Started</a>
        </div>
    </div>
</section> -->
    <!-- About -->

    <section id="about">
        <div class="container">
            <div class="about-content-wrapper">
                <div class="agency-left-side">
                    <p class="heading-normal-txt"> THE BEST LOCAL TRAVEL AGENCY</p>
                    <h2 class="headings">EXPLORE <span>SRI LANKA</span> WITH OUR GUIDE</h2>
                    <p class="lead">
                        At Explore Sri Lanka, we're passionate about showcasing the beauty and culture of our island nation to travelers from around the globe. With over 20 years of experience in the travel industry, we've curated unforgettable journeys that immerse you in the rich tapestry of Sri Lankan life.
                    </p>
                    <br />
                    <p class="lead">
                        Our team of knowledgeable guides and travel experts are dedicated to providing you with personalized experiences tailored to your interests and preferences. Whether you're seeking adventure in the lush jungles, tranquility on pristine beaches, or insight into ancient history and vibrant traditions, we have the expertise to make your dream vacation a reality.
                    </p>
                    <ul>
                        <li>
                            <div class="icons">
                                <i class="fa fa-check"></i>
                                <p>20 Years of Experience</p>
                            </div>
                        </li>
                        <li>
                            <div class="icons">
                                <i class="fa fa-check"></i>
                                <p>150 Tour Destination</p>
                            </div>
                        </li>
                        <li>
                            <div class="icons">
                                <i class="fa fa-phone-volume"></i>
                                <p>+94 71 285 8489</p>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="agency-right-side">
                    <img src="Images/about.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Popular locations -->

    <section id="choose-place">
        <div class="container">
            <p class="heading-normal-txt">CHOOSE YOUR PLACE</p>
            <h2 class="headings">POPULAR <span>TRAVELS</span></h2>
            <div class="choose-wrapper">
                <div class="img-left-side">
                    <a href="./tours/Adventure-Expedition.php">

                        <div class="lg-img">
                            <img src="Images/ella1.jpg" style="aspect-ratio: 16/9;" alt="">
                            <div class="img-content">
                                <h2>Adventure-Expedition</h2>
                                <div class="hidden-content">
                                    <span><i class="fa fa-clock"></i>3 Days</span>
                                    <span><i class="fa fa-user"></i>4 Persons</span>
                                    <span><i class="fa fa-location-dot"></i>Ella</span>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="img-right-side">
                    <a href="./tours/Ancient-Cities-Exploration.php">
                        <div class="lg-img">

                            <img src="Images/packagenew3.jpg" alt="">
                            <div class="img-content">
                                <h2>Ancient-Cities-Exploration</h2>
                                <div class="hidden-content">
                                    <span><i class="fa fa-clock"></i>3 Days</span>
                                    <span><i class="fa fa-user"></i>6 Persons</span>
                                    <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.60,000</p>
                            </div>

                        </div>
                    </a>
                </div>
            </div>

            <div class="row-wise-img">
                <a href="./tours/Beach-Bliss-Retreat.php">
                    <div class="lg-img">

                        <img src="Images/packagenew1.jpg" alt="">
                        <div class="img-content">
                            <h2>Beach-Bliss-Retreat</h2>
                            <div class="hidden-content">
                                <span><i class="fa fa-clock"></i>3 Days</span>
                                <span><i class="fa fa-user"></i>6 Persons</span>
                                <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>Rs.70,000</p>
                        </div>

                    </div>
                </a>
                <a href="./tours/Wildlife-Safari-Adventure.php">
                    <div class="lg-img">

                        <img src="Images/packagenew4.jpg" alt="">
                        <div class="img-content">
                            <h2>Wildlife-Safari-Adventure</h2>
                            <div class="hidden-content">
                                <span><i class="fa fa-clock"></i>4 Days</span>
                                <span><i class="fa fa-user"></i>8 Persons</span>
                                <span><i class="fa fa-location-dot"></i>Yala</span>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>Rs.60,000</p>
                        </div>

                    </div>
                </a>
                <a href="./tours/Scenic-Hillside-Retreat.php">
                    <div class="lg-img">

                        <img src="Images/home12.jpg" alt="">
                        <div class="img-content">
                            <h2>Scenic-Hillside-Retreat</h2>
                            <div class="hidden-content">
                                <span><i class="fa fa-clock"></i>5 Days</span>
                                <span><i class="fa fa-user"></i>8 Persons</span>
                                <span><i class="fa fa-location-dot"></i>Nuwara Eliya</span>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>Rs.100,000</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Counter  -->
    <section id="static-counter">
        <div class="container">
            <div class="static-wrapper">
                <div class="static-icon">
                    <i class="fa fa-home"></i>
                    <p class="numbers" num-count="275">275</p>
                    <p class="txt">Amazing Tours</p>
                </div>
                <div class="static-icon">
                    <i class="fa fa-hotel"></i>
                    <p class="numbers" num-count="1778">1778</p>
                    <p class="txt">Hotel Bookings</p>
                </div>
                <div class="static-icon">
                    <i class="fa fa-location"></i>
                    <p class="numbers" num-count="100">100</p>
                    <p class="txt">Destinations</p>
                </div>
                <div class="static-icon">
                    <i class="fa fa-plane-departure"></i>
                    <p class="numbers" num-count="600">100</p>
                    <p class="txt">Tour Guide Bookings</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Destinations -->

    <section id="top-destination">
        <div class="container">
            <p class="heading-normal-txt">TOP DESTINATIONS</p>
            <h2 class="headings">POPULAR <span>DESTINATIONS</span></h2>
            <div class="top-destination-wrapper swiper2">
                <div class="swiper-wrapper">
                    <a href="./destinations/Anuradhapura.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/anuradhapura1.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Anuradhapura</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="./destinations/Arugam-Bay.php" class="carousel swiper-slide ">
                        <img src="./destinations/Images/Arugam Bay1.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Arugam-Bay</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="./destinations/Batticaloa.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/batticaloa.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Batticaloa</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="./destinations/Colombo.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/colombo.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Colombo</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>

                    </a>
                    <a href="./destinations/Ella.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/Ella.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Ella</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="./destinations/Galle.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/galle.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Galle</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="./destinations/Sigiriya.php" class="carousel swiper-slide">
                        <img src="./destinations/Images/sigiriya.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2><i class="fa fa-location-dot"></i>Sigiriya</h2>
                                <div class="hidden-content-carousel">
                                    <span>More Details</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- video background -->

    <!-- <section id="video-cover">
        <div class="video-bg">
            <video autoplay loop muted preload="auto">
                <source src="Images/video.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container">
            <div class="video-content">
                <h2>Explore Sri Lanka</h2>
                <span><i class="fa fa-clock"></i>10 Days</span>
                <span><i class="fa fa-user"></i>10+</span>
                <span><i class="fa fa-location"></i>10 Sri Lanka</span>
            </div>
        </div>
    </section> -->

    <!-- Tour Details  -->

    <section id="travel-areas">
        <div class="container">
            <p class="heading-normal-txt">MOST POPULAR</p>
            <h2 class="headings">TRAVEL <span>PACKAGES</span></h2>

            <!-- package 1 -->
            <div class="travel-areas-wrapper">
                <div class="areas-content">
                    <h2 class="secondary-headings">ADVENTURE EXPEDITION</h2>
                    <p class="lead">
                        Introducing our thrilling Adventure Expedition package! Brace yourself for an adrenaline-fueled journey through the rugged terrain of Sri Lanka's picturesque town of Ella. This 3-day, 2-night adventure is packed with exhilarating activities and breathtaking scenery, promising an unforgettable experience for thrill-seekers and nature enthusiasts alike.
                    </p>
                    <ul>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i>Nine Arch Bridge</li>
                            <li><i class="fa fa-location-dot"></i>Little Adam's Peak</li>
                            <li><i class="fa fa-location-dot"></i>Ella Adventure Swing</li>
                        </div>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i> Ravana Falls</li>
                            <li><i class="fa fa-location-dot"></i>Ella Rock</li>
                            <li><i class="fa fa-location-dot"></i>Ella Spice Garden</li>
                        </div>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i> Tea Plantations</li>
                            <li><i class="fa fa-location-dot"></i>Zip-lining</li>
                            <li><i class="fa fa-location-dot"></i>Bambaragama Falls</li>
                        </div>
                    </ul>
                    <a href="./tours.php"><button type="button" class="primary-btn"> All Tours <i class="fa fa-arrow-right"></i></button></a>
                </div>
                <div class="slider-content-wrapper swiper3">
                    <div class="swiper-wrapper">

                        <div class="carousel swiper-slide">

                            <img src="Images/package6.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Ella Adventure Swing</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Ella</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>

                        </div>

                        <div class="carousel swiper-slide">
                            <img src="Images/adams-peak.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Little Adam's Peak</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Ella</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/ella2.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Nine Arch Bridge</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Ella</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/counter.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Tea Plantations</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Ella</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/Ravana-Falls.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Ravana Falls</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Ella</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.80,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- package 2 -->
            <div class="travel-areas2-wrapper">
                <div class="slider-content-wrapper swiper3">
                    <div class="swiper-wrapper">
                        <div class="carousel swiper-slide">
                            <img src="Images/package203.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Nilaveli Beach</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.70,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/package201.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Koneswaram Temple</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.70,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/package205.jpeg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Whale Watching</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.70,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/package204.jpg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Fort Frederick</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.70,000</p>
                            </div>
                        </div>
                        <div class="carousel swiper-slide">
                            <img src="Images/home3.jpeg" alt="">
                            <div class="carousel-img-overlay">
                                <div class="img-content">
                                    <h2>Marble Beach</h2>
                                    <div class="hidden-content-carousel">
                                        <span><i class="fa fa-clock"></i>3 Days</span>
                                        <span><i class="fa fa-user"></i>6 Persons</span>
                                        <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-label">
                                <p>Rs.70,000</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="areas-content">
                    <h2 class="secondary-headings">BEACH BLISS RETREAT</h2>
                    <p class="lead">

                        Indulge in the serenity of Sri Lanka's sun-kissed shores with our exclusive 'Beach Bliss Retreat' package. From lounging on golden sands to exploring vibrant coral reefs, immerse yourself in ultimate relaxation and adventure. Make cherished memories in this tropical paradise that will last a lifetime.
                    </p>
                    <ul>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i>Pigeon Island</li>
                            <li><i class="fa fa-location-dot"></i>Nilaveli Beach </li>
                            <li><i class="fa fa-location-dot"></i>Marble Beach</li>
                        </div>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i>Koneswaram Temple</li>
                            <li><i class="fa fa-location-dot"></i>Fort Frederick</li>
                            <li><i class="fa fa-location-dot"></i> Whale Watching</li>
                        </div>
                        <div class="place-names">
                            <li><i class="fa fa-location-dot"></i>Lovers Leap</li>
                            <li><i class="fa fa-location-dot"></i>Uppuveli Beach </li>
                            <li><i class="fa fa-location-dot"></i>Fishing Villages</li>
                        </div>
                    </ul>
                    <a href="./tours.php"><button type="button" class="primary-btn"> All Tours <i class="fa fa-arrow-right"></i></button></a>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!-- review -->
    <section id="review">
        <div class="container">
            <p class="heading-normal-txt client-review">CLIENT REVIEW</p>
            <h2 class="headings">WHAT <span>CLIENTS</span> SAY</h2>
            <div class="review-wrapper swiper4">
                <div class="swiper-wrapper">
                    <div class="review-content swiper-slide">
                        <p class="lead">
                            <i class="fa-solid fa-quote-left"></i>
                            I had an amazing experience with this company! The service was exceptional and the guides were knowledgeable. The guides were passionate about sharing their knowledge, and I left with a deeper understanding and appreciation of the culture. I highly recommend their services to anyone looking for a memorable travel experience.
                            <i class="fa-solid fa-quote-right"></i>
                        </p>
                        <div class="review-img">
                            <img src="./Images/user.jpg" alt="">
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p>Jonathan Brown</p>
                            <p class="guest">Guest Review</p>
                        </div>
                    </div>

                    <div class="review-content swiper-slide">
                        <p class="lead">
                            <i class="fa-solid fa-quote-left"></i>
                            The trip was well-organized and exceeded my expectations. I particularly enjoyed the cultural experiences and the local cuisine. From the breathtaking landscapes to the rich cultural experiences, every moment was truly unforgettable. I would not hesitate to book with them again in the future.
                            <i class="fa-solid fa-quote-right"></i>
                        </p>
                        <div class="review-img">
                            <img src="./Images/user1.jpg" alt="">
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p>Emily Rodriguez</p>
                            <p class="guest">Guest Review</p>
                        </div>
                    </div>

                    <div class="review-content swiper-slide">
                        <p class="lead">
                            <i class="fa-solid fa-quote-left"></i>
                            The tour guides were friendly and informative. I learned a lot about the local history and culture during my trip. The guides were knowledgeable and friendly, providing valuable insights into the destination's history and culture. Overall, it was an unforgettable experience, and I would highly recommend this agency to anyone looking for a memorable vacation.
                            <i class="fa-solid fa-quote-right"></i>
                        </p>
                        <div class="review-img">
                            <img src="./Images/user2.jpg" alt="">
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p>Michael Johnson</p>
                            <p class="guest">Guest Review</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <button id="toTop" class="fa fa-arrow-up"></button>

    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/swiper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        };

        // Check if login_success parameter is present
        if (getUrlParameter('login_success') === '1') {
            // Display toast notification
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Signed in successfully"
            });
        };

        if (getUrlParameter('hotelregister') === '1') {
            Swal.fire({
                title: "Success",
                text: "Registration successful! You'll receive an email once your account is approved.",
                icon: "success"
            });
        };
    </script>
</body>

</html>