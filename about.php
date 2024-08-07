<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>About | Explore Srilanka</title>

    <style>
        /* About */

        .about-content-wrapper {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 2rem;
            margin: 3rem 0;
        }

        .about-content-wrapper h2 span {
            color: var(--primary-color);
            font-family: "ubuntu";
        }

        .about-content-wrapper ul {
            list-style: none;
        }

        .about-content-wrapper ul .icons {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .about-content-wrapper ul .icons i {
            background: var(--primary-color);
            padding: 0.8rem;
            border-radius: 50%;
            color: var(--white-color);
        }

        .about-content-wrapper ul p {
            margin-left: 1rem;
        }

        .agency-right-side img {
            width: 100%; 
            height: 80%; 
            object-fit: cover;
            display: block;
        }

        .agency-right-side {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-section {
            margin-bottom: 3rem; 
        }

        .content-mob{
            height: 90%;
        }

        .ceo-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .services {
            display: flex;
            width: 80%;
            justify-content: center;
            align-items: center;
        }

        @media(max-width: 1430px) {
            .services {
                width: 90%;
            }
        }

        @media(max-width: 1350px) {
            .services {
                flex-direction: column;
                width: 60%;
                gap: 1.2rem;
            }

            .ceo-details img {
                width: 30%;
            }
        }

        @media(max-width: 1250px) {
            .ceo-details {
                flex-direction: column;
            }

            .ceo-details img {
                width: 35%;
            }
        }
        @media(max-width: 1000px) {
            .about-content-wrapper {
            
            grid-template-columns: repeat(1, 1fr);
            grid-column-gap: 1rem;
            margin: 1rem 0;
        }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slides/slide-25.jpg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/ExploreSriLanka/index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">About</li>
            </ol>
        </div>

        <div class="container">
            <h1 class="headings mini-heading">ABOUT US</h1>
            <p class="lead mini-lead" style="text-align: center;"></p>

            <!---about us-->

            <div class="about-section">
                <div class="container">

                    <div class="content-section">
                        <div class="content content-mob">
                            <h1 class="headings"> OUR <span>STORY</span></h1>
                            <br>
                            <p class="lead">
                                Explore Sri Lanka is established in 2020, as the oldest mercantile establishment in Sri Lanka.
                                Explore Sri Lanka is a pioneer in the Travel and Tourism Industry and over the years, has won many
                                awards and accolades while establishing strong relationships with many entities in the travel trade.
                                Enhanced with local knowledge and experience,
                                Explore Sri Lanka is one of the best in the industry today. Join us as we write the next chapter in our storied history, where every moment becomes a cherished memory.
                            </p>
                        </div>
                    </div>
                </div>
                <!--------------- Our Vision Section -->

                <div class="content-section vision">
                    <div class="about-content-wrapper">
                        <div class="content content-mob">
                            <h1 class="secondary-headings" style="text-align: center; text-decoration: underline;"> OUR VISION</h1>
                            <p class="lead">
                                <i class="fa-solid fa-quote-left"></i>
                                Our vision at Explore Sri Lanka is to inspire wanderlust and facilitate unforgettable
                                journeys across the captivating landscapes and rich cultural tapestry of Sri Lanka.With a commitment to
                                authenticity, sustainability, and unparalleled hospitality, we strive to curate immersive experiences that leave
                                a lasting impact while preserving the natural beauty and cultural heritage of this enchanting island nation.
                                Join us as we embark on a voyage of discovery, where every moment is an opportunity to create cherished memories and forge
                                meaningful connections with the people and places that make Sri Lanka truly special."
                                <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                        <div class="agency-right-side">
                            <img src="./Images/slides/about4.jpg" alt="Image for Our Vision" >
                        </div>
                    </div>
                </div>

                <!-- Our Mission Section -->
                <div class="content-section mission">
                    <div class="about-content-wrapper">
                        <div class="agency-right-side">
                            <img src="./Images/slides/about5.jpg" alt="Image for Our Mission">
                        </div>
                        <div class="content content-mob">
                            <h1 class="secondary-headings" style="text-align: center; text-decoration: underline;"> OUR MISSION</h1>
                            <p class="lead">
                                <i class="fa-solid fa-quote-left"></i>
                                Our mission is to uphold an unwavering dedication to the highest standards of business ethics,
                                ensuring the continued preservation of the Company's esteemed reputation. We strive to embody integrity,
                                transparency, and accountability in all aspects of our operations, fostering trust and confidence among our clients, partners, and
                                stakeholders. By consistently delivering exceptional service and exceeding expectations, we aim to establish ourselves as the premier
                                destination management company in Sri Lanka. Through our steadfast commitment to excellence, innovation, and customer satisfaction,
                                as their trusted partner in experiencing the unparalleled beauty and hospitality of Sri Lanka.
                                <i class="fa-solid fa-quote-right"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="content-section ceo">
                    <div class="content content-mob">
                        <h2 class="secondary-headings">MEET OUR CEO </h2>
                        <div class="ceo-details">
                            <img src="Images/about/CEO.jpeg" alt="CEO Image">
                            <div class="ceo-info">
                                <h1 class="mini-headings" style="letter-spacing: 5px;">THUSHARA D. <span>PATHIRAGE</span></h1>
                                <p class="heading-normal-txt" style="margin-bottom: 10px; color: black; ">CEO, Explore Sri Lanka</p><br>
                                <p class="lead">Thushara D. Pathirage is a seasoned travel industry professional with over 20 years of experience.
                                    He began his career as a tour guide, where he developed a deep passion for showcasing
                                    the beauty and culture of Sri Lanka to visitors from around the world. His dedication
                                    and commitment to excellence led him to climb the ranks within the industry, eventually
                                    becoming the CEO of Explore Sri Lanka.<br>
                                    Under Mr. Pathirage's leadership, Explore Sri Lanka has expanded its offerings to include
                                    sustainable tourism initiatives and community engagement programs. Mr. Pathirage believes in
                                    the power of travel to transform lives and is committed to ensuring that every
                                    traveler who experiences Sri Lanka with Explore Sri Lanka leaves with unforgettable memories
                                    and a deeper appreciation for the country's rich heritage and natural beauty.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-section">
                    <div class="our-services">
                        <div class="title">
                            <h1>OUR SERVICES</h1>
                        </div>
                        <div class="services">
                            <div class="card-about-page">
                                <div class="about-overlay"></div>
                                <div class="icon">
                                    <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
                                </div>
                                <h2>HOTEL BOOKINGS</h2>
                                <p>"Experience seamless hotel bookings with Explore Sri Lanka.
                                    Our user-friendly platform allows you to browse & reserve accommodations
                                    tailored to your preferences & budget"</p>
                            </div>
                            <div class="card-about-page">
                                <div class="about-overlay"></div>
                                <div class="icon">
                                    <i class="fa-solid fa-map-location-dot" style="color: #ffffff;"></i>
                                </div>
                                <h2>TOUR <br>GUIDES</h2>
                                <p>"Embark on an unforgettable journey with Explore Sri Lanka's expert tour guides.
                                    Our experienced guides are passionate showcasing the rich cultural heritage,
                                    breathtaking landscapes."</p>
                            </div>
                            <div class="card-about-page">
                                <div class="about-overlay"></div>
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                                </div>
                                <h2>ATTRACTIVE PLACES</h2>
                                <p>"Discover the enchanting allure of Sri Lanka's top attractions with Explore Sri Lanka.
                                    From ancient ruins to pristine beaches,hill sides our curated selection promises
                                    unforgettable experiences."</p>
                            </div>
                            <div class="card-about-page">
                                <div class="about-overlay"></div>
                                <div class="icon">
                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                </div>
                                <h2>IN-BUILT <br> SHOP</h2>
                                <p> "Browse through a diverse range of products & souvenirs, carefully curated to enhance your journey
                                    through Sri Lanka. Shop with ease and take home a piece of the island's charm."</p>
                            </div>
                        </div>
                    </div>
                </div>
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
