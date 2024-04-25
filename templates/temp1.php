<?php
$cityCondition = "'Anuradhapura'";
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
        <li class="active">Hotel Name</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Hotel Name</h1>
      <p class="lead mini-lead"></p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="../Images/anuradhapura1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="../Images/anuradhapuraaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="../Images/Anuradhapura.jpg" alt="destination_image"> </div>
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
                            <img src="/Images/slides/about5.jpg" alt="Image for Our Mission">
                        </div>
                        <div class="content content-mob">
                            <h1 class="secondary-headings" style="text-align: center; text-decoration: underline;"> HOTEL NAME</h1>
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
            </div>
          </div>
        </div>
        <div id="tab3" class="item" data-title="Experiences">
          <div class="item-content">
            <div class="places-content">
              <div class="place-details-wrap">

                <?php
                require_once '../config.php';
                $conn = mysqli_connect($hostname, $username, $password, $database);

                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT name, short_desc, hotel_picture, distance, district, hotel_url FROM hotels WHERE district IN ($cityCondition) AND active = 1";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {

                    echo '<div class="destination-content-container">';
                    echo '<div class="destination-image-container">';
                    $image_location = $row['hotel_picture'];
                    echo '<img src="../' . $image_location . '" alt="destination_image">';
                    echo '</div>';
                    echo '<div class="destination-hotel-container">';
                    echo '<h3 class="content-title">' . $row['name'] . '</h3>';
                    echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                    echo '<p class="content-paragraph">' . $row['distance'] . ' km away from ' . $row['district'] . '.</p>';
                    echo '<p class="content-paragraph"><a href="../hotels/' . $row['hotel_url'] . '">Read more</a></p>';
                    echo '</div>';
                    echo '</div>';
                  }
                } else {
                  echo "No hotels found in $cityCondition.";
                }

                mysqli_close($conn);
                ?>


              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


    <h1 class="headings mini-heading">Similar Hotels</h1>


    <div class="owl-carousel owl-theme destinations-images">
      <a href="Pasikudahnew.php">
        <div class="owl-caousel-item"> <img src="../destinations/Images/dambullaa.jpg" alt="destination_image">
          <h2>Dambulla</h2>
        </div>
      </a>

      <a href="Polonnaruwa.php">
        <div class="owl-caousel-item "> <img src="../destinations/Images/vatadage.jpg" alt="destination_image">
          <h2>Polonnaruwa</h2>
        </div>
      </a>

      <a href="Kandy.php">
        <div class="owl-caousel-item"> <img src="../destinations/Images/kandy1.jpg" alt="destination_image">
          <h2>Kandy</h2>
        </div>
      </a>

      <a href="Beruwala.php">
        <div class="owl-caousel-item"> <img src="../destinations/Images/Trincomaleeee.jpg" alt="destination_image">
          <h2>Beruwala</h2>
        </div>
      </a>

      <a href="Trincomalee.php">
        <div class="owl-caousel-item"> <img src="../destinations/Images/tangallee.jpg" alt="destination_image">
          <h2>Trincomalee</h2>
        </div>
      </a>
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