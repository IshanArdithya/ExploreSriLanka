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


  <title>Mihintale | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide20.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Destinations</a></li>
        <li class="active">Mihintale</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Mihintale</h1>
      <p class="lead mini-lead">Nestled in the district of Anuradhapura, Mihintale stands as a revered pilgrimage site in Sri Lanka, drawing thousands of devotees annually. Rich in history and adorned with ancient ruins, Mihintale is intricately woven into the origins of Buddhism in the country.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/mihintale.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mihintale1.jpeg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mihintale3.jpeg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mihintale2.jpeg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Tracing its roots to the ancient kingdom of Anuradhapura, Mihintale was formerly known as Chethiyagiriya. Its historical significance is chronicled in ancient texts like the Dipavamsa and the Mahavamnsa, highlighting its importance in the spread of Buddhism in Sri Lanka.Legend has it that King Devanampiyatissa of Anuradhapura encountered Mahinda Thero, the son of Emperor Asoka, while on a hunting expedition in Chethiyagiriya. Mahinda Thero, along with his assembly of Arahats, engaged the king in a series of questions to assess his understanding of Buddhism. This encounter led to King Devanampiyatissa embracing Buddhism and subsequently propagating it throughout the island, shaping the course of Sri Lanka's religious identity.</p>

              <p class="content-paragraph"> Renamed Mihintale after the arrival of Mahinda Thero, the locality became synonymous with the introduction of Buddhism to Sri Lanka, earning Mahinda Thero the reverence of the locals as Mihindu Rahathan Vahanse.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN MIHINTALE</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Kantaka Chetiya</h4>
              <p class="content-paragraph">Constructed during the reign of King Suratissa of Anuradhapura, Kantaka Chetiya is a captivating site adorned with intricate Indian-inspired designs, reflecting the rich artistic heritage of Mihintale.</p>

              <h4 class="content-destination-tittle">Naga Pokuna</h4>
              <p class="content-paragraph">Translating to 'snake pond,' Naga Pokuna was built during the reign of King Aggabodhi and serves as a fascinating attraction. This pond, originally known as Nagacatusca, not only captivates visitors but also supplies water to the adjacent Lion Pond.</p>

              <h4 class="content-destination-tittle">The Hospital</h4>
              <p class="content-paragraph">Nestled at the foothills of Mihintale, the remnants of an ancient hospital showcase medicinal baths used for patient treatment. Regarded as one of the oldest hospitals in the world, it offers a glimpse into the healthcare practices of ancient Sri Lanka.</p>

              <h4 class="content-destination-tittle">The Refectory</h4>
              <p class="content-paragraph">Serving as a testament to the daily lives of the resident theros, the refectory is a large quadrangle where Buddhist teachings were shared. Adorned with inscriptions regarding the administration of Mihintale, it provides insight into the religious and social fabric of the era.</p>

              <h4 class="content-destination-tittle">The Cave of Arahat Mahinda</h4>
              <p class="content-paragraph">Known as Mihindu Guhawa, this cave holds immense significance for devout visitors as the dwelling place of Arahat Mahinda Thero. The cave features a flat slab carved out of rock, believed to be where the Thero rested, offering a tranquil space for reflection and prayer. In essence, Mihintale's historical significance and architectural marvels make it a compelling destination for pilgrims and history enthusiasts alike, inviting visitors to explore its sacred sites and unravel its profound heritage.</p>
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
      <a href="Pasikudahnew.php"><div class="owl-caousel-item">  <img src="../destinations/Images/dambullaa.jpg" alt="destination_image"> <h2>Dambulla</h2></div></a>

      <a href="Polonnaruwa.php"><div class="owl-caousel-item ">  <img src="../destinations/Images/vatadage.jpg" alt="destination_image"><h2>Polonnaruwa</h2> </div></a>

      <a href="Kandy.php"><div class="owl-caousel-item">  <img src="../destinations/Images/kandy1.jpg" alt="destination_image"><h2>Kandy</h2> </div></a>

      <a href="Beruwala.php"><div class="owl-caousel-item">  <img src="../destinations/Images/Trincomaleeee.jpg" alt="destination_image"><h2>Beruwala</h2> </div></a>

      <a href="Trincomalee.php"><div class="owl-caousel-item">  <img src="../destinations/Images/tangallee.jpg" alt="destination_image"> <h2>Trincomalee</h2></div></a>
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