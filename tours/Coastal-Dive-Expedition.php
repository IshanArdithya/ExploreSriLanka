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
        <li class="active">Coastal Dive Expedition</li>
      </ol>
    </div>

    <!-- Heading -->


    <h1 class="mini-heading" style="margin-top: 20px;">Coastal Dive Exploration</h1>
    <p class="lead mini-lead">Experience the ultimate aquatic adventure with our "Coastal Dive Exploration" package in Hikkaduwa. Immerse yourself in the mesmerizing underwater world of the Indian Ocean as you embark on guided diving and snorkeling excursions. Discover vibrant coral reefs, ancient shipwrecks, and an array of marine life, led by experienced instructors who ensure a safe and unforgettable journey. Whether you're a novice or an experienced diver, this package promises excitement, relaxation, and awe-inspiring moments beneath the waves.</p>


    <!-- Content -->

    <div class="owl-carousel owl-theme" id="owl1">
      <div class="owl-caousel-item"> <img src="./Images/coastal3.webp" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/coastal5.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/coastal6.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/coastall4.jpeg" alt=""> </div>

    </div>

    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab2">Hotel</a></li>
            <li><a href="#tab3">Tour Guide</a></li>
            <!-- <li><a href="#tab4">Pricing</a></li> -->
          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">
              </div>
              <div class="text-content">
                <h4 class="content-destination-tittle"> Duration: 3 days / 2 nights</h4>
                <h4 class="content-destination-tittle">City: Hikkaduwa</h4>
                <h4 class="content-destination-tittle">Number of Persons: 6 Persons</h4>

                <p class="content-destinaation-tittle">
                  The "Coastal Dive Exploration" package offers a thrilling 3-day, 2-night adventure in the picturesque coastal town of Hikkaduwa. Begin your journey with a leisurely exploration of the town's vibrant atmosphere before diving into the azure waters for an unforgettable underwater experience. With activities including diving, snorkeling, and optional sunset cruises, this package is designed to immerse you in the natural beauty and serenity of Sri Lanka's coastal treasures. Bid farewell to Hikkaduwa filled with cherished memories and a newfound appreciation for the wonders of the ocean.
                </p>
                <h3 class="content-destination-tittle">Places to Visit:</h3>
                <ul class="package-main-list">

                  <li>Day 1: Arrival in Hikkaduwa
                    <ul class="package-list">
                      <li>Welcome to Hikkaduwa! Your adventure begins as our professional guides pick you up from your designated location. Sit back, relax, and enjoy a comfortable journey to your accommodation in Hikkaduwa, where you'll check-in and unwind before the excitement of your expedition unfolds.</li>
                      <li>Join a yoga session on the beach to rejuvenate your body and mind.</li>
                      <li>Visit the Hikkaduwa National Park for a nature walk and birdwatching.</li>
                    </ul>
                  </li>
                  Day 2: Diving & Snorkeling Adventure
                  <li>
                    <ul class="package-list">
                      <li>Embark on an exhilarating diving and snorkeling expedition off the coast of Hikkaduwa, exploring vibrant coral gardens and encountering diverse marine life beneath the waves.</li>
                      <li>Enjoy a beachside barbecue lunch between diving sessions.</li>
                      <li>Sunset boat cruise to witness the stunning coastal views as the day comes to an end.</li>
                    
                </ul>
                </li>

                <li>Day 3: Departure<ul class="package-list">
                    <li>Spend the morning lounging on the beach, soaking up the sun, and enjoying the tranquil ambiance of Hikkaduwa. </li>
                    <li>Explore the historic Seenigama Muhudu Viharaya, a Buddhist temple located on a small island just off the coast of Hikkaduwa</li>
                    <li>As your expedition comes to a close, our team will arrange for your comfortable transportation to your departure point, ensuring a seamless conclusion to your unforgettable journey through Hikkaduwa.</li>
                  </ul>
                </li>
                </ul>

                <h3 class="content-destination-tittle">Price: LKR 60,000</h3>

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

              $sql = "SELECT name, short_desc, hotel_picture FROM hotels WHERE city IN ('Kandy', 'Colombo')";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="destination-image-container">';
                  $image_location = $row['hotel_picture'];
                  echo '<img src="../' . $image_location . '" alt="">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['name'] . '</h3>';
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

              <?php
              require_once '../config.php';
              $conn = mysqli_connect($hostname, $username, $password, $database);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT full_name, picture, specialty, short_desc, experience FROM tourguide WHERE city IN ('Kandy', 'Colombo')";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="tourguide-image-container">';
                  $image_location = $row['picture'];
                  echo '<img src="../' . $image_location . '" alt="">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
                  echo '<p class="content-paragraph"><b>Specialty: </b>' . $row['specialty'] . '</p>';
                  echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                  echo '<p class="content-paragraph"><b>Years of Experience: </b>' . $row['experience'] . ' Years</p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No tourguides found.";
              }

              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>


      </div>
    </div>


    <h1 class="headings">Related <span>Packages</span></h1>

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>

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
      $('#owl1').owlCarousel({
        items: 4,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });

      $('#owl1').owlCarousel({
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