<?php
$cityCondition = "'Trincomalee'";
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


  <title>Trincomalee | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide11.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Trincomalee</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Trincomalee</h1>
      <p class="lead mini-lead">Nestled along the pristine East Coast of Sri Lanka, Trincomalee beckons travelers with its blend of rich history and breathtaking oceanic vistas. Renowned for its natural harbor and captivating beaches, Trincomalee offers an enchanting escape for those seeking adventure and relaxation alike.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Trincomale.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Trincomalee.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Trincomaleee.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Trincomaleeee.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Trincomalee's storied past dates back centuries, shaped by its strategic deep-water harbor that attracted seafarers from Marco Polo to colonial powers like the Portuguese, Dutch, and British. Known as 'Gokanna' in ancient times, Trincomalee has been a hub of maritime trade and military significance, with its port playing a pivotal role in regional geopolitics.</p>

              <p class="content-paragraph"> Through various colonial periods, Trincomalee witnessed shifts in power and control, each leaving behind traces of their influence on the city's architecture and culture. Even today, Trincomalee remains a vital maritime hub, contributing to international trade and serving as a gateway to the Indian Ocean.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN TRINCOMALEE</h3>
              <p class="content-paragraph">Trincomalee offers a plethora of attractions that cater to history buffs, spiritual seekers, and nature enthusiasts alike, promising a memorable journey through time and culture.</p>

              <h4 class="content-destination-tittle">Koneswaram Temple</h4>
              <p class="content-paragraph">Perched majestically atop Swami Rock, Koneswaram Temple is a testament to Hindu architectural grandeur and spiritual significance. Dating back to medieval times, this temple complex is steeped in legend and lore, offering breathtaking views of the ocean, and serving as a center of religious devotion for pilgrims and visitors alike.</p>

              <h4 class="content-destination-tittle">Kanniya Hot Wells</h4>
              <p class="content-paragraph">Hidden amidst lush greenery, the Kanniya Hot Wells are a collection of seven natural hot springs believed to possess healing properties. Linked to the epic Ramayana, these springs are revered by Hindus and attract visitors seeking rejuvenation and tranquility amidst serene surroundings.</p>

              <h4 class="content-destination-tittle">Thiriyaya Girihandu Seya</h4>
              <p class="content-paragraph">Tucked away amidst verdant landscapes, Thiriyaya Girihandu Seya is revered as one of the oldest Buddhist temples in Sri Lanka. With its origins tracing back to Lord Buddha's time, this sacred site is steeped in myth and legend, offering a serene sanctuary for meditation and reflection.</p>

              <h4 class="content-destination-tittle">British War Cemetery</h4>
              <p class="content-paragraph">A poignant reminder of Trincomalee's role in World War II, the British War Cemetery honors the sacrifice of Allied soldiers who laid down their lives in the line of duty. Set amidst pristine surroundings, this solemn site serves as a poignant tribute to the heroes of the past, inviting visitors to pay their respects and reflect on the cost of freedom.</p>

              <h4 class="content-destination-tittle">Fort Fredrick</h4>
              <p class="content-paragraph">Standing as a testament to Trincomalee's colonial legacy, Fort Fredrick is a historic landmark perched atop Swami Rock. Originally built by ancient kings and fortified by colonial powers, this fortress offers a glimpse into the region's military history, with its sturdy walls and commanding views of the coastline captivating visitors with tales of bygone eras.</p>
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