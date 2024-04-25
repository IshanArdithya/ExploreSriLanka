<?php
$cityCondition = "'Puttalam'";
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


  <title>Kalpitiya | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/kalpitiya.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Kalpitiya</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Kalpitiya</h1>
      <p class="lead mini-lead">Nestled along the scenic shores of the Puttalam district in Sri Lanka, Kalpitiya beckons travelers with its blend of natural beauty, rich history, and vibrant culture. Situated amidst the azure waters of the Indian Ocean, this coastal paradise offers an idyllic escape for those seeking adventure and relaxation alike. From its ancient trade routes to its colonial forts, Kalpitiya's strategic significance has shaped its captivating past, while its pristine beaches and thriving marine life continue to enchant visitors from around the globe. Whether you're exploring the remnants of Dutch colonial rule or immersing yourself in the tranquility of its coastal landscape, Kalpitiya promises an unforgettable journey filled with discovery and wonder.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/kalpitiya.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Trincomale.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissa1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissa.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Nestled in the picturesque coastal region of the Puttalam district, Kalpitiya emerges as a haven for travelers seeking adventure and relaxation. With its stunning beaches and rich maritime history, Kalpitiya offers a unique blend of natural beauty and cultural heritage. From ancient trade routes to colonial forts, the region's strategic importance has shaped its fascinating past, making it a captivating destination for history enthusiasts and beach lovers alike.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN KALPITIYA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">The Dutch Fort</h4>
              <p class="content-paragraph">Among the few Dutch forts preserved entirely in Sri Lanka, the Kalpitiya Dutch Fort stands as a testament to the region's colonial heritage. Constructed with yellow bricks imported from Holland, this imposing structure provides a glimpse into Kalpitiya's tumultuous history and architectural grandeur.</p>

              <h4 class="content-destination-tittle">The Dutch Church</h4>
              <p class="content-paragraph">Located between the fort and Kalpitiya village, the Dutch Church is a historic landmark that reflects the region's colonial legacy. As one of the oldest Protestant Churches in the country, it features remnants such as old tombstones, baptismal sites, and church bells, offering visitors a fascinating journey into the past.</p>

              <h4 class="content-destination-tittle">St Anne’s Church</h4>
              <p class="content-paragraph">Situated in Thalawila, St Anne’s Church holds significant cultural and religious importance in Sri Lanka. With its mystical beginnings and heritage, this sacred site attracts thousands of devotees and international travelers annually, providing a serene oasis for spiritual reflection and exploration.</p>

              <h4 class="content-destination-tittle">Kalpitiya Harbour</h4>
              <p class="content-paragraph">Embark on an informative stroll through Kalpitiya and visit the bustling Kalpitiya Fisheries Harbour. Serving as the region's primary hub for fishing, the harbor offers a glimpse into the local economy and maritime traditions, providing an intriguing experience for adventurous holidaymakers.</p>

              <h4 class="content-destination-tittle">The Elephant Tree</h4>
              <p class="content-paragraph">Discover the natural beauty of Kalpitiya with a boat ride through its enchanting lagoon, where the highlight of the excursion is the Elephant Tree. Nestled amidst the mangroves, this ancient and majestic tree serves as a captivating sight for day-trippers seeking to immerse themselves in the tranquility of Kalpitiya's coastal landscape.</p>
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

  <div class="owl-carousel owl-theme destinations-images">
     <a href="Galle.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/slide13.jpg" alt="destination_image"> <h2>Galle</h2> </div> </a>
    <a href="Negombo.php">  <div class="owl-caousel-item">  <img src="../destinations/Images/negombo.jpg" alt="destination_image"> <h2>Negombo</h2> </div> </a>
    <a href="Mirissa.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/mirissa.jpg" alt="destination_image"> <h2>Miissa</h2> </div> </a>
     <a href="Matara.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/matara.jpg" alt="destination_image"> <h2>Matara</h2> </div> </a>
     <a href="Kalutara.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/kalutara2.jpg" alt="destination_image"> <h2>Kalutara</h2> </div> </a>
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