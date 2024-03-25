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
        <li class="active">Beach Bliss Retreat</li>
      </ol>
    </div>

    <!-- Heading -->
    <h1 class="mini-heading" style="margin-top: 20px;">Beach Bliss Retreat</h1>
    <p class="lead mini-lead"> Indulge in the ultimate beach getaway with our "Beach Bliss Retreat" package. Designed for travelers seeking relaxation and rejuvenation, this package offers an escape to the sun-kissed shores of Sri Lanka's pristine beaches. Whether you're looking to lounge on golden sands, explore vibrant coral reefs, or simply soak up the tropical ambiance, our Beach Bliss Retreat promises an unforgettable experience filled with blissful moments and cherished memories. Embark on a journey of serenity and adventure as you explore the diverse coastal landscapes of Sri Lanka. From the bustling beaches of Negombo to the secluded coves of Mirissa, each destination offers its own unique charm and allure. Immerse yourself in the vibrant marine life of Hikkaduwa, where colorful coral reefs and exotic fish await beneath the crystal-clear waters. Snorkel or dive amidst the kaleidoscopic world beneath the surface, or simply relax on the shore and bask in the beauty of your surroundings. </p>



    <!-- Content -->

    <div class="owl-carousel owl-theme" id="owl1">
      <div class="owl-caousel-item"> <img src="./Images/beach1.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/beach2.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/beach4.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/beach5.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/beach6.avif" alt=""> </div>
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
                <h4 class="content-destination-tittle">City: Trincomalee</h4>
                <h4 class="content-destination-tittle">Number of Persons: 6 Persons</h4>

                <p class="content-destinaation-tittle">
                  Step into paradise with our "Beach Bliss Retreat" package, where tranquility meets adventure on the shores of Trincomalee. Over the course of 3 days and 2 nights, guests will immerse themselves in the beauty of Sri Lanka's coastal paradise, indulging in leisurely beach days, thrilling water sports, and cultural excursions. From surfing along the waves to exploring ancient kovils and savoring delectable seafood delights, this package offers the perfect blend of relaxation and exploration for an unforgettable beach retreat.
                </p>
                <h3 class="content-destination-tittle">Places Visit:</h3>
                <ul class="package-main-list">
                  <li>Day 1: Arrival in Tricomalee
                    <ul class="package-list">
                      <li>Welcome to Trincomalee! Your adventure begins as our professional guides pick you up from your designated location. Sit back, relax, and enjoy a comfortable journey to your accommodation in Trincomalee, where you'll check-in and unwind before the excitement of your expedition unfolds.</li>
                      <li>Check into your hotel and spend the rest of the day at leisure, exploring the nearby beaches or simply relaxing by the ocean.</li>
                    </ul>
                  <li>Explore the cultural richness of Trincomalee by visiting the local Kovils, where you can witness traditional rituals and immerse yourself in the vibrant atmosphere.</li>
                  </li>
                  <li>Day 2: Trincomalee Beach Leisure
                    <ul class="package-list">
                      <li>Wake up to the sound of the waves and enjoy a day of pure relaxation on the beautiful beaches of Trincomalee.</li>
                      <li>Indulge in water activities such as snorkeling, diving, or surfing to experience the thrill of riding the waves.</li>
                      <li>Explore the cultural richness of Trincomalee by visiting the local Kovils, where you can witness traditional rituals and immerse yourself in the vibrant atmosphere.</li>
                      <li>Alternatively, you can opt for a boat tour to explore the nearby islands or go dolphin watching in the sparkling waters of the Indian Ocean.</li>
                      <li>After a day of adventure and exploration, unwind with a leisurely stroll along the beach as you watch the breathtaking sunset over the horizon.</li>
                    </ul>
                  </li>

                  <li>Day 3: Departure
                    <ul class="package-list">
                      <li>Relish your last moments in paradise with a leisurely breakfast overlooking the azure waters.</li>
                      <li>Participate in a yoga or meditation session on the beach to rejuvenate your mind and body before heading back home.</li>
                      <li>Explore nearby attractions such as historical sites or local markets for some last-minute souvenir shopping.</li>
                      <li>As your expedition comes to a close, our team will arrange for your comfortable transportation to your departure point, ensuring a seamless conclusion to your unforgettable journey through Trincomalee.</li>
                    </ul>
                  </li>


                </ul>

                <h3 class="content-destination-tittle">Price: LKR 70,000</h3>

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