<?php
$cityCondition = "'Ratnapura'";
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


  <title>Sinharaja | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide16.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Sinharaja</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Sinharaja</h1>
      <p class="lead mini-lead">Nestled in the heart of Sri Lanka, the Sinharaja Forest reserve stands as a beacon of untouched wilderness and natural beauty. Revered as a UNESCO World Heritage Site, this pristine sanctuary offers a haven for nature lovers and adventurers alike. Encompassing approximately 34 square miles of lush forestry, Sinharaja is a treasure trove of biodiversity, boasting numerous endemic species and serving as a vital refuge for endangered wildlife.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Sinharaja.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Sinharajaa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Sinharajaaaa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/sinharaja1.jpg" alt=""> </div>
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

              <p class="content-paragraph">Meaning "Lion King" when translated, Sinharaja lives up to its majestic name with its awe-inspiring expanse of dense foliage and diverse ecosystems. Home to a multitude of endemic species including birds, amphibians, reptiles, and mammals, the reserve is a sanctuary for Sri Lanka's rich natural heritage. Its ridges stretch between the Kalu Ganga in the North and the Gin Ganga in the South, offering a picturesque landscape for exploration. With four access points to enter the forest, visitors can embark on an adventure into this wilderness, guided by National Guides to ensure a safe and informative experience. Recognized for its outstanding universal value since its designation as a World Heritage Site, Sinharaja Forest continues to captivate visitors with its untouched splendor.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN SINHARAJA</h3>
              <p class="content-paragraph">Discover the wonders of Sinharaja Forest through a variety of captivating attractions that showcase its natural and cultural significance.</p>

              <h4 class="content-destination-tittle">Bird Watching</h4>
              <p class="content-paragraph">Renowned as an Important Bird Area (IBA), Sinharaja Forest is a paradise for bird watchers. With over a hundred species of birds, including endemic treasures like the Ceylon Lorikeet and Layard’s Parakeet, enthusiasts can marvel at the diverse avian population that calls this sanctuary home.</p>

              <h4 class="content-destination-tittle">Trekking</h4>
              <p class="content-paragraph">Immerse yourself in the wilderness of Sinharaja through exhilarating treks that offer an up-close encounter with its rich flora and fauna. While traversing the forest trails, adventurers can observe a plethora of wildlife, from colorful birds to elusive mammals. However, be prepared for encounters with leeches and equip yourself accordingly for a safe and enjoyable trekking experience.</p>

              <h4 class="content-destination-tittle">Photography</h4>
              <p class="content-paragraph">Capture the essence of Sinharaja's pristine beauty through the lens of a camera. Whether you're an amateur enthusiast or a seasoned photographer, the reserve's unique ecosystem and scenic landscapes provide endless opportunities for stunning wildlife and nature photography. Make sure to use a camera suitable for the environment to capture vibrant and captivating images.</p>

              <h4 class="content-destination-tittle">Kolawenigama Temple</h4>
              <p class="content-paragraph">Embark on a cultural excursion to Kolawenigama Temple, located just half an hour from Sinharaja. This historical temple, constructed by King Buwanekabahu VII, offers insight into Sri Lanka's rich heritage and architectural splendor. Resembling the iconic Dalada Maligawa in Kandy, the temple provides a tranquil retreat amidst the wilderness of Sinharaja Forest.</p>
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