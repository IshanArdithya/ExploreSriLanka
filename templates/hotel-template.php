<?php
$cityCondition = "'Anuradhapura'";
$hotel_id = 'H00006';

require_once '../config.php';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch hotel details based on hotel_id
    $stmt = $pdo->prepare("SELECT name, short_desc, hotel_picture FROM hotels WHERE hotel_id = ?");
    $stmt->execute([$hotel_id]);
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}


?>

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


    <title>Anuradhapura | Explore Srilanka</title>
</head>

<body>

    <!-- Header -->
    <?php
    include '../components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slide1-1.jpg" alt="destination_image">
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li><a href="../hotel.php">Hotel</a></li>
                <li class="active"><?php echo $hotel['name']; ?></li>
            </ol>
        </div>

        <div class="container">
            <h1 class="headings mini-heading"><?php echo $hotel['name']; ?></h1>
            <p class="lead mini-lead">Discover unparalleled comfort, exceptional service, and unforgettable experiences at our exquisite hotel. Indulge in the epitome of luxury and hospitality, where you can immerse yourself in a world of elegance, comfort, and impeccable service. Your perfect retreat starts with us.</p>
        </div>

        <div class="tab-package">
            <div class="tabbed-content">
                <nav class="tabs">
                    <ul>
                        <li><a href="#tab1" class="active">Overview</a></li>
                        <li><a href="#tab3">Rooms</a></li>

                    </ul>
                </nav>

                <div id="tab1" class="item active" data-title="Overview">
                    <div class="item-content">
                        <div class="overview-content">
                            <div class="heading-text">

                            </div>
                            <div class="text-content">

                            </div>

                            <!-- Our Mission Section -->
                            <div class="content-section mission">
                                <div class="about-content-wrapper">
                                    <div class="agency-right-side">
                                        <img src="../<?php echo $hotel['hotel_picture']; ?>" alt="Hotel">
                                    </div>
                                    <div class="content content-mob">
                                        <h1 class="secondary-headings" style="text-align: center; text-decoration: underline;"><?php echo $hotel['name']; ?></h1>
                                        <p class="lead">
                                            <i class="fa-solid fa-quote-left"></i>
                                            <?php echo $hotel['short_desc']; ?>
                                            <i class="fa-solid fa-quote-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="item" data-title="Rooms">
                    <div class="item-content">
                        <div class="places-content">
                            <div class="place-details-wrap">
                                <?php
                                require_once '../config.php';

                                try {
                                    $stmt = $pdo->prepare("SELECT * FROM hotelrooms WHERE hotel_id = ?");
                                    $stmt->execute([$hotel_id]);
                                    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if ($rooms) {
                                        foreach ($rooms as $room) {
                                            echo '<div class="destination-content-container">';
                                            echo '<div class="destination-image-container">';
                                            echo '<img src="../' . $room['room_picture'] . '" alt="Room Image">';
                                            echo '</div>';
                                            echo '<div class="destination-hotel-container">';
                                            echo '<h3 class="content-title">' . $room['name'] . '</h3>';
                                            echo '<p class="content-paragraph">' . $room['description'] . '</p>';
                                            echo '<p class="content-paragraph">Room Type: ' . $room['room_type'] . '</p>';
                                            echo '<p class="content-paragraph">Guests: ' . $room['guests'] . '</p>';
                                            echo '<p class="content-paragraph">Price: LKR ' . $room['price'] . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo "No rooms found for this hotel.";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <h1 class="headings mini-heading">Similar Hotels</h1>

        <div class="owl-carousel owl-theme destinations-images">
            <?php
            require_once '../config.php';

            // Fetch the last 6 hotels from the database
            try {
                $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM hotels ORDER BY registered DESC LIMIT 6");
                $stmt->execute();
                $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($hotels as $hotel) {
                    echo '<a href="../hotels/' . $hotel['hotel_url'] . '">';
                    echo '<div class="owl-caousel-item">';
                    echo '<img src="../' . $hotel['hotel_picture'] . '" alt="Hotel Image">';
                    echo '<h2>' . $hotel['name'] . '</h2>';
                    echo '</div>';
                    echo '</a>';
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
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

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();

        });

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 5,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
        });
    </script>

    <button id="toTop" class="fa fa-arrow-up"></button>
    <script src="../js/script.js"></script>
</body>

</html>