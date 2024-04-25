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


  <title>Habarana | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide30.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Habarana</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Habarana</h1>
      <p class="lead mini-lead">Nestled in the heart of the Anuradhapura district, Sri Lanka, Habarana emerges as a tranquil oasis surrounded by natural beauty. With its picturesque landscapes and proximity to renowned historical sites, this charming city offers a perfect blend of adventure and cultural exploration. Centrally located near the Minneriya National Park, Habarana serves as a gateway to thrilling safaris and wildlife encounters, attracting travelers from around the globe.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/habarana.jpeg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/habaranaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/habarana.jpeg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/habaranaa.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Habarana is more than just a scenic retreat; it's a hub of adventure and cultural discovery. Situated just a 4 ½ hour drive from the bustling capital of Colombo, this little city provides a convenient base for exploring the region's diverse attractions. From wildlife safaris to ancient monuments, Habarana offers a myriad of experiences that showcase the rich heritage and natural splendor of Sri Lanka.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN HABARANA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Safari to Minneriya National Park</h4>
              <p class="content-paragraph">Embark on an unforgettable adventure into the Minneriya National Park, located just 10 km from Habarana. Home to a diverse array of wildlife, including a large population of elephants, this national park is a paradise for nature lovers and photographers alike. Explore the park's lush landscapes and pristine wilderness on an exhilarating safari, where you can witness elephants roaming freely in their natural habitat.</p>

              <h4 class="content-destination-tittle">Elephant Back Safari</h4>
              <p class="content-paragraph">Experience the magic of Sri Lanka's wilderness on an elephant back safari, one of the most popular excursions in Habarana. Accompanied by an experienced mahout, you'll traverse through scenic trails and lush forests atop these majestic creatures, immersing yourself in the beauty of the surrounding landscape. This unique adventure offers a rare opportunity to connect with nature and observe wildlife up close.</p>

              <h4 class="content-destination-tittle">Ritigala</h4>
              <p class="content-paragraph">Discover the ancient wonders of Ritigala, located just an hour away from Habarana. This historical and religious site is home to an ancient Buddhist monastery nestled amidst rocky hills and dense forests. Explore the ruins of this sacred site, which dates back to the Anuradhapura era, and marvel at its architectural splendor and spiritual significance.</p>

              <h4 class="content-destination-tittle">Habarana Lake</h4>
              <p class="content-paragraph">Indulge in serenity and tranquility at the sparkling Habarana Lake, one of the most breathtaking attractions in Sri Lanka. Surrounded by lush greenery and teeming with diverse wildlife, this picturesque lake offers a peaceful escape from the hustle and bustle of city life. Take a leisurely stroll along its shores, go birdwatching, or simply soak in the natural beauty of this idyllic oasis.</p>

              <h4 class="content-destination-tittle">Hiriwadunna</h4>
              <p class="content-paragraph">Immerse yourself in the authentic culture and traditions of Sri Lanka with a visit to Hiriwadunna. Experience the everyday life of a local resident with a bullock cart ride to this charming village, where you'll be treated to an authentic culinary experience featuring traditional Sri Lankan cuisine. Savor the flavors of local delicacies served in traditional crockery, and gain insight into the rich cultural heritage of this vibrant community.</p>
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
      <a href="Tangalle.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/tangallee.jpg" alt="destination_image"> <h2>Tangalle</h2> </div> </a>
      <a href="Unawatuna.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/Unawatuna.jpg" alt="destination_image"> <h2>Unawatuna</h2> </div> </a>
      <a href="weligamaa.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/weligamaa.jpg" alt="destination_image"> <h2>weligamaa</h2> </div> </a>
      <a href="Dabulla.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/Dambulla.jpg" alt="destination_image"> <h2>Dambulla</h2> </div> </a>
      <a href="Kalpitiya.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/kalpitiyamain.jpg" alt="destination_image"> <h2>Kalpitiya</h2> </div> </a>
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