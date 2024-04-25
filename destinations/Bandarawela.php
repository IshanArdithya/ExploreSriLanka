<?php
$cityCondition = "'Badulla'";
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


  <title>Bandarawela | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide27.jpg" alt="destination_image">

  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Bandarawela</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Bandarawela</h1>
      <p class="lead mini-lead">Nestled amidst the picturesque Hill Country of Sri Lanka's Badulla district, Bandarawela stands as a tranquil retreat for travelers seeking solace amidst lush greenery and refreshing cool winds. As an integral part of the tea-producing province, Bandarawela boasts numerous tea plantations, adding to its scenic charm and contributing to the region's rich heritage.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Bandarawela.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Bandarawelaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Bandarawelaaa.jpg" alt="destination_image"> </div>

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

              <p class="content-paragraph">Bandarawela's significance dates to ancient times, with folklore attributing its importance to King Walagamba's strategic organization of armies before battle during the Anuradhapura period. However, it was during the British Colonial Era that Bandarawela's prominence began to rise, fueled by the conducive climate of the Hill Country for tea cultivation. Today, Bandarawela stands as one of Sri Lanka's primary tea-producing regions, with its exquisite architecture reminiscent of old English cottages and manors. Additionally, during World War II, Bandarawela experienced a significant influx of migrants from Colombo, leading to the establishment of prestigious schools such as Royal College, St Thomas’s College, and Vishaka Vidyala in the area.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN BANDARAWELA</h3>
              <p class="content-paragraph">Bandarawela offers a diverse range of attractions that appeal to both native and international travelers, showcasing the region's rich history, cultural heritage, and natural beauty.</p>

              <h4 class="content-destination-tittle">Dowa Rock Temple</h4>
              <p class="content-paragraph">Located just a few kilometers from Bandarawela Town, the Dowa Rock Temple houses a large unfinished statue of Lord Buddha, believed to have been sculpted by King Walagamba himself. Serving as a testament to Bandarawela's historical significance, this ancient temple offers visitors a glimpse into the region's past and the sanctuary it provided for King Walagamba.</p>

              <h4 class="content-destination-tittle">St Anthony’s Church</h4>
              <p class="content-paragraph">Renowned for its architectural beauty, St Anthony’s Church is a striking landmark in Bandarawela. Constructed using materials such as rock and granite, the church exudes a rustic charm reminiscent of a cozy village parish. With a history spanning six decades, this church serves as both a place of worship and a visual delight for visitors, offering a serene atmosphere amidst the verdant landscapes of Bandarawela.</p>

              <h4 class="content-destination-tittle">Fresh Vegetables</h4>
              <p class="content-paragraph">For culinary enthusiasts, Bandarawela's thriving vegetable market is a must-visit attraction. The region's cold weather provides ideal conditions for the cultivation of fresh vegetables such as beetroot, carrots, cabbage, and cauliflower. Visitors can explore the bustling vegetable stalls to sample locally sourced produce or stock up on supplies for their stay, immersing themselves in the vibrant flavors and aromas of Bandarawela's culinary delights.</p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/beruwala.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/colombo.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Dambulla.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Ella.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/galle.jpg" alt="destination_image"> </div>
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