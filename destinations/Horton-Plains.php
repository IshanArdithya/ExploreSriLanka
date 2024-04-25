<?php
$cityCondition = "'Nuwara Eliya'";
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


  <title>Horton Plains | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide32.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Horton-Plains</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Horton-Plains</h1>
      <p class="lead mini-lead">Nestled amidst the breathtaking landscapes of Sri Lanka's central province, Horton Plains National Park beckons to the adventurous spirit within every traveler. This pristine sanctuary, situated amidst the majestic mountains of Kirigalpotta and Thotupala Kanda, offers an unparalleled opportunity to immerse oneself in the wonders of nature. With its lush forests, cascading waterfalls, and rolling plains, Horton Plains National Park promises an unforgettable journey into the heart of Sri Lanka's wilderness.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/HortonPlains.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Horton-Plains.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/HortonPlains.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Horton-Plains.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Nestled amidst the breathtaking landscapes of Sri Lanka's central province, Horton Plains National Park stands as a testament to the island's rich natural heritage and biodiversity. Spanning over 30 square kilometers of pristine wilderness, this majestic sanctuary captivates the imagination with its rugged terrain, lush forests, and cascading waterfalls. Renowned as a UNESCO World Heritage Site, Horton Plains National Park offers a sanctuary for a diverse array of flora and fauna, making it a paradise for nature enthusiasts and adventurers alike.</p>

              <p class="content-paragraph">At the heart of Horton Plains lies a landscape of unparalleled beauty, characterized by mist-covered plains, rolling hills, and dramatic escarpments that soar into the sky. The park's cool climate and elevation, ranging from 1,200 to 2,300 meters above sea level, create a unique microclimate that supports a rich and diverse ecosystem. Here, visitors can explore a variety of habitats, from cloud forests and grasslands to montane forests and wetlands, each teeming with life and natural wonders waiting to be discovered. One of the park's most iconic attractions is the legendary World's End, a sheer cliff that plunges over 800 meters into the valley below, offering breathtaking panoramic views of the surrounding landscape. Nearby, Baker's Falls enchants visitors with its tranquil beauty, as its cascading waters tumble over moss-covered rocks amidst a lush green backdrop.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN HORTON-PLAINS</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Baker's Falls</h4>
              <p class="content-paragraph">Marvel at the majestic beauty of Baker's Falls, a picturesque waterfall nestled within the heart of Horton Plains. Surrounded by lush vegetation and moss-covered rocks, this cascading waterfall offers a tranquil oasis amidst the park's rugged terrain. Visitors can enjoy a refreshing dip in the cool waters or simply bask in the serene ambiance of this natural wonder.</p>

              <h4 class="content-destination-tittle">World's End</h4>
              <p class="content-paragraph">Experience the awe-inspiring vistas of World's End, a sheer cliff that plunges over 800 meters into the valley below. Perched on the edge of the escarpment, visitors can enjoy panoramic views of the surrounding plains and distant mountains, creating a breathtaking backdrop for unforgettable moments and stunning photographs.</p>

              <h4 class="content-destination-tittle">Mini World's End</h4>
              <p class="content-paragraph">Discover the hidden gem of Mini World's End, a lesser-known viewpoint that offers equally stunning views of the surrounding landscape. With its rugged terrain and dramatic vistas, Mini World's End provides a unique perspective on the natural beauty of Horton Plains National Park, making it a must-visit destination for nature enthusiasts and photographers alike.</p>

              <h4 class="content-destination-tittle">Thotupola Kanda</h4>
              <p class="content-paragraph">Ascend to the summit of Thotupola Kanda, the second-highest mountain in Sri Lanka, and revel in the sweeping panoramas of Horton Plains National Park below. From its lofty heights, visitors can gaze out across the rolling plains, dense forests, and mist-covered valleys, immersing themselves in the untamed beauty of this remarkable wilderness.</p>

              <h4 class="content-destination-tittle">Sambar Deer</h4>
              <p class="content-paragraph">Encounter the majestic Sambar Deer, one of the park's most iconic residents, as they graze peacefully amidst the grassy plains and forested slopes. With their graceful movements and striking appearance, these elusive creatures offer a glimpse into the rich diversity of wildlife that calls Horton Plains National Park home.</p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/tangallee.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Unawatuna.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/weligamaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Dambulla.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/kalpitiyamain.jpg" alt="destination_image"> </div>
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