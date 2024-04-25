<?php
$cityCondition = "'Kalutara'";
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


  <title>Beruwala - Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide18.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Beruwala</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Beruwala</h1>
      <p class="lead mini-lead">Nestled along the scenic coastline of Kalutara district, Beruwala emerges as a serene haven for beach enthusiasts seeking tranquility and relaxation. With its inviting shores and warm waters, this charming city offers an ideal retreat just over an hour's drive from the bustling metropolis of Colombo. Renowned for its impressive infrastructure and accessibility, Beruwala stands as a premier holiday destination in Sri Lanka, captivating visitors with its natural beauty and vibrant culture.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/beruwala.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/bentota-beachh.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/pasikudah.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/batticaloa.jpg" alt="destination_image"> </div>
    </div>

    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab3">Related Hotels</a></li>

          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">

              </div>
              <div class="text-content">

              </div>

              <p class="content-paragraph">Beruwala's history is deeply intertwined with its strategic position as a hub of trade since ancient times. Dating back to the arrival of Arab traders, the city served as one of the earliest settlements in Sri Lanka, with many of its inhabitants tracing their lineage to these early merchants. The legacy of trade continues to shape Beruwala's identity, with the gem business playing a prominent role in the local culture. Over the centuries, Beruwala has evolved into a thriving coastal city, preserving its rich heritage while embracing modernity.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN BERUWALA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Kechimalai Mosque</h4>
              <p class="content-paragraph">Standing as a testament to Beruwala's cultural diversity, the Kechimalai Mosque is among the oldest mosques in Sri Lanka, with a history spanning over a thousand years. Adorned with its distinctive white exterior and green doorways, this beautiful structure reflects the architectural elegance of Islamic design, inviting visitors to explore its sacred premises and immerse themselves in its spiritual ambiance.</p>

              <h4 class="content-destination-tittle">Barberyn Lighthouse</h4>
              <p class="content-paragraph">Perched on an offshore island, the Barberyn Lighthouse adds a touch of maritime charm to Beruwala's landscape. Erected in 1889, this towering beacon stands over 100 feet tall, guiding ships safely along the coast. Offering panoramic views of the surrounding seascape, the lighthouse serves as both a historical landmark and a scenic attraction, drawing visitors to its picturesque location.</p>

              <h4 class="content-destination-tittle">Beruwala Harbour</h4>
              <p class="content-paragraph">Venture into the heart of Beruwala's maritime heritage at the bustling Beruwala Harbour. Located just a short distance from the town center, this vibrant port comes alive in the early morning hours as fishermen haul in their daily catch. Visitors can witness the lively activity of trawlers and boats, providing an authentic glimpse into the local fishing industry and maritime culture.</p>

              <h4 class="content-destination-tittle">Kande Viharaya</h4>
              <p class="content-paragraph">Escape to the serene city of Aluthgama and discover the tranquil beauty of Kande Viharaya. Dating back to 1734, this sacred temple complex is adorned with intricate architecture and spiritual artifacts, including a large seated statue of Lord Buddha and a revered Bo tree. The tranquil surroundings of Kande Viharaya offer a peaceful retreat for meditation and reflection, inviting visitors to experience the serenity of Buddhist tradition.</p>

              <h4 class="content-destination-tittle">The China Fort Gem Market</h4>
              <p class="content-paragraph">Delve into the vibrant world of gem trading at the bustling China Fort Gem Market. With roots dating back to Beruwala's early settlement, this vibrant marketplace showcases a dazzling array of precious and semi-precious stones, attracting gem enthusiasts from near and far. Certified valuation experts are on hand to assist visitors in evaluating their purchases, ensuring a rewarding and authentic gem-buying experience.</p>
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


    <h1 class="headings mini-heading">Similar Destinations</h1>



    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide6.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide9-1webp.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide5.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide8-1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide7.jpg" alt="destination_image"> </div>
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