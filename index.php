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

    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="Images/logo.png" alt="">
                </div>
                <ul>
                    <div class="btn">
                        <i class="fas fa-times close-btn"></i>
                    </div>
                    <li><a href="#">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="#">Tours</a></li>
                    <li><a href="#">Destination</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div class="sign-in-up-btn">
                    <a href="login.php" class="custom-btn">Sign In Now</a>
                </div>
                <div class="btn">
                    <i class="fas fa-bars menu-btn"></i>
                </div>

            </nav>
        </div>
    </header>

<!-- Slide -->
<main>
    <div class="slider-container swiper">
        <div class="slider-content swiper-wrapper">
            <div class="overlay swiper-slide">
                <img src="Images/slide1.jpg" alt="">
                <div class="img-overlay">
                    <p>Lets Travel around Srilanka with us</p>
                    <h2><span>Discover</span>The Island</h2>
                    <h2>With Our Guide</h2>
                </div>
            </div>
            <div class="overlay swiper-slide">
                <img src="Images/slide2.jpg" alt="">
                <div class="img-overlay">
                    <p>Lets Travel around Srilanka with us</p>
                    <h2><span>Discover</span>The Island</h2>
                    <h2>With Our Guide</h2>
                </div>
            </div>
            <div class="overlay swiper-slide">
                <img src="Images/slide3.jpg" alt="">
                <div class="img-overlay">
                    <p>Lets Travel around Srilanka with us</p>
                    <h2>Discover The Island</h2>
                    <h2>With Our <span>Guide</span></h2>
                </div>
            </div>

        </div>
    </div>
</main>


<!-- Search Location -->

    <section id="location-search">
        <div class="container">
            <div class="form-wrapper">
                <form action="#">
                    <input type="text" placeholder="Where to" class="form-control">
                    <select class="form-control">
                        <option value="Destination">Destination</option>
                        <option value="Destination">Sigiriya</option>
                        <option value="Destination">Down South</option>
                        <option value="Destination">Piliyandala</option>
                        <option value="Destination">Negombo</option>
                    </select>
                    <select class="form-control">
                        <option value="Duration">Duration</option>
                        <option value="5 Days">5 Days Tour</option>
                        <option value="7 Days">7 Days Tour</option>
                        <option value="12 Days">12 Days Tour</option>
                        <option value="14 Days">14 Days Tour</option>
                    </select>

                    <button type="button" class="primary-btn">Search Now</button>
                </form>
            </div>
        </div>
    </section>

<!-- About -->

<section id="about">
    <div class="container">
        <div class="about-content-wrapper">
            <div class="agency-left-side">
                <p class="heading-normal-txt"> THE BEST LOCAL TRAVEL AGENCY</p>
                <h2 class="headings">DISCOVER THE <span>WORLD</span> WITH OUR GUIDE</h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                </p>
                <br/>
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nam dolorem labore dicta natus nesciunt voluptates tempora fugit praesentium? Praesentium odio, corrupti hic earum recusandae esse libero quae voluptatem sunt.
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
                            <p>+94 77 826 6684</p>
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
                <div class="lg-img">
                    <img src="Images/slide1.jpg" alt="">
                    <div class="img-content">
                        <h2>Ancient Ruins Tours</h2>
                        <div class="hidden-content">
                            <span><i class="fa fa-clock"></i>10 Days</span>
                            <span><i class="fa fa-user"></i>12+</span>
                            <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>$2,500</p>
                    </div>
                </div>
            </div>
            <div class="img-right-side">
                <div class="lg-img">
                    <img src="Images/slide2.jpg" alt="">
                    <div class="img-content">
                        <h2>Coastal Tours</h2>
                        <div class="hidden-content">
                            <span><i class="fa fa-clock"></i>10 Days</span>
                            <span><i class="fa fa-user"></i>12+</span>
                            <span><i class="fa fa-location-dot"></i>Galle</span>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>$2,500</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-wise-img">
            <div class="lg-img">
                <img src="Images/slide3.jpg" alt="">
                <div class="img-content">
                    <h2>Ancient Ruins Tours</h2>
                    <div class="hidden-content">
                        <span><i class="fa fa-clock"></i>10 Days</span>
                        <span><i class="fa fa-user"></i>12+</span>
                        <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                    </div>
                </div>
                <div class="price-label">
                    <p>$2,500</p>
                </div>
            </div>
            <div class="lg-img">
                <img src="Images/slide2.jpg" alt="">
                <div class="img-content">
                    <h2>Ancient Ruins Tours</h2>
                    <div class="hidden-content">
                        <span><i class="fa fa-clock"></i>10 Days</span>
                        <span><i class="fa fa-user"></i>12+</span>
                        <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                    </div>
                </div>
                <div class="price-label">
                    <p>$1,500</p>
                </div>
            </div>
            <div class="lg-img">
                <img src="Images/slide1.jpg" alt="">
                <div class="img-content">
                    <h2>Ancient Ruins Tours</h2>
                    <div class="hidden-content">
                        <span><i class="fa fa-clock"></i>10 Days</span>
                        <span><i class="fa fa-user"></i>12+</span>
                        <span><i class="fa fa-location-dot"></i>Anuradhapura</span>
                    </div>
                </div>
                <div class="price-label">
                    <p>$500</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter  -->
<section id="static-counter">
    <div class="container">
        <div class="static-wrapper">
            <div class="static-icon">
                <i class="fa fa-plane-departure"></i>
                <p class="numbers" num-count="600">600</p>
                <p class="txt">Flight Bookings</p>
            </div>
            <div class="static-icon">
                <i class="fa fa-home"></i>
                <p class="numbers"num-count="275">275</p>
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
        </div>
    </div>
</section>

<!-- Top Destinations -->

<section id="top-destination">
    <div class="container">
        <p class="heading-normal-txt">TOP DESTINATION</p>
        <h2 class="headings">POPULAR <span>DESTINATION</span></h2>
        <div class="top-destination-wrapper swiper2">
            <div class="swiper-wrapper">
                <div class="carousel swiper-slide">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="carousel-img-overlay">
                        <div class="img-content">
                            <h2><i class="fa fa-location-dot"></i>Down South</h2>
                            <div class="hidden-content-carousel">
                                <span>4 Tours Packages</span>
                                <a href="#"><span>Explore</span><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>15% Off</p>
                    </div>
                </div>
                <div class="carousel swiper-slide">
                    <img src="Images/slide3.jpg" alt="">
                    <div class="carousel-img-overlay">
                        <div class="img-content">
                            <h2><i class="fa fa-location-dot"></i>Down South</h2>
                            <div class="hidden-content-carousel">
                                <span>2 Tours Packages</span>
                                <a href="#"><span>Explore</span><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>$600</p>
                    </div>
                </div>    
                <div class="carousel swiper-slide">
                    <img src="Images/slide1.jpg" alt="">
                    <div class="carousel-img-overlay">
                        <div class="img-content">
                            <h2><i class="fa fa-location-dot"></i>Down South</h2>
                            <div class="hidden-content-carousel">
                                <span>3 Tours Packages</span>
                                <a href="#"><span>Explore</span><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>New</p>
                    </div>
                </div>
                <div class="carousel swiper-slide">
                    <img src="Images/slide2.jpg" alt="">
                    <div class="carousel-img-overlay">
                        <div class="img-content">
                            <h2><i class="fa fa-location-dot"></i>Down South</h2>
                            <div class="hidden-content-carousel">
                                <span>3 Tours Packages</span>
                                <a href="#"><span>Explore</span><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>$100</p>
                    </div>
                </div>    
                <div class="carousel swiper-slide">
                    <img src="Images/slide3.jpg" alt="">
                    <div class="carousel-img-overlay">
                        <div class="img-content">
                            <h2><i class="fa fa-location-dot"></i>Down South</h2>
                            <div class="hidden-content-carousel">
                                <span>3 Tours Packages</span>
                                <a href="#"><span>Explore</span><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>$200</p>
                    </div>
                </div>    
            </div>
        </div>
    </div>    
</section>

<!-- video background -->

<section id="video-cover">
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
</section>

<!-- Tour Details  -->

<section id="travel-areas">
    <div class="container">
        <p class="heading-normal-txt">MOST POPULAR</p>
        <h2 class="headings">TRAVEL <span>PACKAGES</span></h2>

        <!-- package 1 -->
        <div class="travel-areas-wrapper">
            <div class="areas-content">
                <h2 class="secondary-headings">TRINCOMALEE</h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                </p>
                <ul>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i>Marble Beach</li>
                        <li><i class="fa fa-location-dot"></i>Koneshwaram </li>
                        <li><i class="fa fa-location-dot"></i>Nilaveli Beach</li>
                    </div>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i> Natural Harbour</li>
                        <li><i class="fa fa-location-dot"></i>Kanniya Hot Springs</li>
                        <li><i class="fa fa-location-dot"></i>Pigeon Island</li>
                    </div>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i> Natural Harbour</li>
                        <li><i class="fa fa-location-dot"></i>Kanniya Hot Springs</li>
                        <li><i class="fa fa-location-dot"></i>Pigeon Island</li>
                    </div>
                </ul>
                <button type="button" class="primary-btn"> All Tours <i class="fa fa-arrow-right"></i></button>
            </div>
            <div class="slider-content-wrapper swiper3">
                <div class="swiper-wrapper">
                    <div class="carousel swiper-slide">
                        <img src="Images/seashore.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/slide2.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/slide1.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/counter.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
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
                        <img src="Images/seashore.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/slide2.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/slide1.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>
                    <div class="carousel swiper-slide">
                        <img src="Images/counter.jpg" alt="">
                        <div class="carousel-img-overlay">
                            <div class="img-content">
                                <h2>Marble Beach</h2>
                                <div class="hidden-content-carousel">
                                    <span><i class="fa fa-clock"></i>2 Days</span>
                                    <span><i class="fa fa-user"></i>10+</span>
                                    <span><i class="fa fa-location-dot"></i>Trincomalee</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-label">
                            <p>$1500</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="areas-content">
                <h2 class="secondary-headings">GALLE</h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                </p>
                <ul>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i>Unawatuna Beach</li>
                        <li><i class="fa fa-location-dot"></i>Jungle Beach </li>
                        <li><i class="fa fa-location-dot"></i>Galle Dutch Fort</li>
                    </div>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i>Old Dutch Hospital</li>
                        <li><i class="fa fa-location-dot"></i>Maritime Museum</li>
                        <li><i class="fa fa-location-dot"></i>Pigeon Island</li>
                    </div>
                    <div class="place-names">
                        <li><i class="fa fa-location-dot"></i>Whale Watching</li>
                        <li><i class="fa fa-location-dot"></i>Kanniya Hot Springs</li>
                        <li><i class="fa fa-location-dot"></i>Pigeon Island</li>
                    </div>
                </ul>
                <button type="button" class="primary-btn"> All Tours <i class="fa fa-arrow-right"></i></button>
            </div>
   
            </div>
        </div>
    </div>
</section>

<!-- Travel Blogs -->
<section id="travel-blog">
    <div class="container">
        <p class="heading-normal-txt">TRAVEL BLOG</p>
        <h2 class="headings">TRAVEL <span>EXPERIENCE</span></h2>
        <div class="top-destination-wrapper swiper2">
            <div class="swiper-wrapper">
                <div class="swiper-slide blog">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="blog-img-overlay">
                        <div class="blog-img-content">
                            <h2>Tours</h2>
                            <p class="lead">Small Group Tours With Flights From USA</p>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>15 Nov</p>
                    </div>
                </div>
                <div class="swiper-slide blog">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="blog-img-overlay">
                        <div class="blog-img-content">
                            <h2>Tours</h2>
                            <p class="lead">Small Group Tours With Flights From USA</p>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>2 Dec</p>
                    </div>
                </div>
                <div class="swiper-slide blog">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="blog-img-overlay">
                        <div class="blog-img-content">
                            <h2>Tours</h2>
                            <p class="lead">Small Group Tours With Flights From USA</p>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>1 Jan</p>
                    </div>
                </div>
                <div class="swiper-slide blog">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="blog-img-overlay">
                        <div class="blog-img-content">
                            <h2>Tours</h2>
                            <p class="lead">Small Group Tours With Flights From USA</p>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>17 Jan</p>
                    </div>
                </div>
                <div class="swiper-slide blog">
                    <img src="Images/seashore.jpg" alt="">
                    <div class="blog-img-overlay">
                        <div class="blog-img-content">
                            <h2>Tours</h2>
                            <p class="lead">Small Group Tours With Flights From USA</p>
                        </div>
                    </div>
                    <div class="price-label">
                        <p>17 Jan</p>
                    </div>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Impedit ratione maxime illo temporibus voluptas, odit aliquid! Harum
                          provident velit debitis dolores odit necessitatibus officia excepturi aliquam nobis cupiditate,
                           voluptate animi?
                           <i class="fa-solid fa-quote-right"></i>
                    </p>
                    <div class="review-img">
                        <img src="./Images/about.jpg" alt="">
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Impedit ratione maxime illo temporibus voluptas, odit aliquid! Harum
                          provident velit debitis dolores odit necessitatibus officia excepturi aliquam nobis cupiditate,
                           voluptate animi?
                           <i class="fa-solid fa-quote-right"></i>
                    </p>
                    <div class="review-img">
                        <img src="./Images/about.jpg" alt="">
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                         Impedit ratione maxime illo temporibus voluptas, odit aliquid! Harum
                          provident velit debitis dolores odit necessitatibus officia excepturi aliquam nobis cupiditate,
                           voluptate animi?
                           <i class="fa-solid fa-quote-right"></i>
                    </p>
                    <div class="review-img">
                        <img src="./Images/about.jpg" alt="">
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
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<footer id="footer">
    <div class="container">
        <div class="footer-content">
            <div class="ft-content">
                <div class="icon">
                    <i class="fa fa-phone-volume"></i>
                </div>
                <div class="content">
                    <p class="lead"> Call Us</p>
                    <p>+94-712-858-489</p>
                </div>
            </div>
            <div class="ft-content">
                <div class="icon">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <div class="content">
                    <p class="lead"> Write For Us</p>
                    <p>admin@exploresrilanka.com</p>
                </div>
            </div>
            <div class="ft-content">
                <div class="icon">
                    <i class="fa fa-map-location"></i>
                </div>
                <div class="content">
                    <p class="lead"> Address</p>
                    <p>18/A Flower Road, Colombo 03</p>
                </div>
            </div>
        </div>
        
<!-- Footer content -->
        <div class="footer-wraper">
            <div class="about">
                <div class="img-logo">
                    <img src="Images/logo.png" alt="">
                </div>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    uis ipsum suspendisse ultrices gravida.
                    Risus commodo viverra maecenas accumsan lacus vel facilisis.
                </p>
                <div class="social-icons">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-pinterest"></i>
                </div>
            </div>
                <div class="links">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#">Tours</a></li>
                        <li><a href="#">Destination</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="subscribe">
                    <h2>Subscribe</h2>
                    <p class="lead">Join With Us As A Tour Guide</p>
                    <form action="#">
                        <input type="text" placeholder="Email Address">
                        <button type="button" class="button">Send</button>
                    </form>
                </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024 Innovative Software Solutions. All Right Reserved</p>
        </div>
    </div>
</footer>

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
        }
    </script>
</body>
</html>