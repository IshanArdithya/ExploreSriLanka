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


  <title>Kalutara - Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Destinations</a></li>
        <li class="active">Kalutara</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Kalutara</h1>
      <p class="lead mini-lead">Nestled within easy reach of Colombo, Kalutara beckons travelers with its blend of coastal charm, cultural heritage, and natural beauty. As a popular day-trip destination, this coastal town offers a delightful escape from the bustling city life, promising relaxation, and exploration in equal measure.mJoin us on a journey through the enchanting streets of Kalutara, where history meets modernity, and natural wonders await around every corner.
      </p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/kalutara.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kalutara1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kalutara2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kalutara3.png" alt=""> </div>


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

              <p class="content-paragraph">Kalutara, formerly known as ‘Kalathiththa’, boasts a rich history intertwined with Sri Lanka’s colonial past and ancient heritage. During the reign of King Parakaramabahu II, the region witnessed the cultivation of coconut plantations, marking its early significance. However, the course of history changed with the arrival of the Portuguese, who erected a fort in Kalutara. Subsequent colonial powers, including the Dutch and the British, left their marks on the region, shaping its architectural landscape and cultural heritage to this day.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN KALUTARA</h3>
              <p class="content-paragraph">Kalutara's allure lies not only in its historical significance but also in its diverse attractions that cater to travelers of all interests.</p>

              <h4 class="content-destination-tittle">Richmond Castle</h4>
              <p class="content-paragraph">Adorned with grandeur and elegance, Richmond Castle stands as a testament to the opulence of bygone eras. Once the residence of Mudaliyar Don Arthur de Silva Wijesinghe Siriwardena, this majestic mansion boasts intricate Burmese imported window frames and state-of-the-art ventilation systems, offering visitors a glimpse into the lavish lifestyle of the past.</p>

              <h4 class="content-destination-tittle">Thudugala Waterfall</h4>
              <p class="content-paragraph">Tucked away amidst the lush greenery of Dodangoda, the Thudugala Waterfall provides a serene retreat from the hustle and bustle of urban life. Nestled within a rubber estate, this breathtaking cascade invites travelers to immerse themselves in its natural beauty and cool waters, making it an ideal spot for relaxation and rejuvenation.</p>

              <h4 class="content-destination-tittle">Kalutara Bodhiya</h4>
              <p class="content-paragraph">With roots tracing back to ancient Anuradhapura, the Kalutara Bodhiya holds sacred significance as a descendant of the Jaya Sri Maha Bodhiya. Revered for its spiritual aura and historical importance, this ancient tree stands as a symbol of enlightenment and serves as a tranquil sanctuary for meditation and reflection.</p>

              <h4 class="content-destination-tittle">Kalutara Chaitya</h4>
              <p class="content-paragraph">Unique in its design and spiritual essence, the Kalutara Chaitya stands as the world's only hollow Buddhist shrine. Adorned with vibrant murals depicting the life of Lord Buddha, this sacred site offers visitors an immersive journey into Buddhist teachings and principles, fostering a sense of peace and introspection.</p>

              <h4 class="content-destination-tittle">Fa Hien Caves</h4>
              <p class="content-paragraph">Delve into the depths of history at the Fa Hien Caves, where evidence of prehistoric human habitation dates back over 37,000 years. Named after the renowned Mahayana Buddhist priest Fa Hien, who visited the caves in the 5th century, this archaeological site offers a fascinating glimpse into Sri Lanka's ancient past, with relics and artifacts that continue to intrigue visitors to this day.</p>

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
                    echo '<img src="../' . $image_location . '" alt="">';
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
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
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