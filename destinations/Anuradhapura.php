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


  <title>Anuradhapura | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
    <img src="./Images/slide1-1.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Anuradhapura</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Anuradhapura</h1>
      <p class="lead mini-lead">Nestled in the heart of Sri Lanka's North Central Province, Anuradhapura stands as a timeless testament to the island's rich cultural heritage and storied past. As one of the ancient capitals of Sri Lanka, this sacred city holds profound significance for Buddhists worldwide, revered as the cradle of Sinhalese civilization and the birthplace of Buddhism on the island. With its sprawling ruins, monumental stupas, and sacred relics, Anuradhapura beckons travelers to embark on a journey through time, where legends merge with reality and ancient marvels await exploration.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/anuradhapura1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/anuradhapuraaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Anuradhapura.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Anuradhapura, one of the ancient capitals of Sri Lanka, stands as a testament to the island's rich history and cultural heritage. Located in the North Central Province, this sacred city served as the political and religious center of the island for over a millennium, making it a UNESCO World Heritage Site. Steeped in legend and myth, Anuradhapura is revered by Buddhists worldwide as the birthplace of Sinhalese civilization. The city's sprawling ruins and monumental dagobas (stupas) offer glimpses into its glorious past, with structures dating back to the 4th century BC. As you wander through its sacred grounds, you'll encounter ancient monasteries, palaces, and intricately carved stone sculptures, all reflecting the grandeur of Anuradhapura's bygone era. Moreover, Anuradhapura's lush surroundings, dotted with serene lakes and vibrant flora, create a tranquil atmosphere that transports visitors to another time.</p>

              <p class="content-paragraph">Today, Anuradhapura remains a vital pilgrimage site for Buddhists, drawing devotees from around the world to pay homage to its revered relics, including the sacred Bodhi tree, believed to be a sapling of the original tree under which the Buddha attained enlightenment. Beyond its religious significance, Anuradhapura beckons travelers with its archaeological wonders, offering a fascinating journey through Sri Lanka's storied past. </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN ANURADHAPURA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Sri Maha Bodhiya</h4>
              <p class="content-paragraph">Pay homage to the sacred Sri Maha Bodhiya, a revered fig tree believed to have grown from a cutting of the original Bodhi tree in India, making it one of the oldest historically authenticated trees in the world.</p>

              <h4 class="content-destination-tittle">Ruwanwelisaya Dagoba</h4>
              <p class="content-paragraph">Marvel at the grandeur of the Ruwanwelisaya Dagoba, an ancient stupa renowned for its imposing architecture and spiritual significance, attracting pilgrims and tourists alike with its serene ambiance.</p>

              <h4 class="content-destination-tittle">Jetavanaramaya</h4>
              <p class="content-paragraph">Explore the towering Jetavanaramaya, once the tallest stupa in the ancient world, standing as a testament to the architectural prowess of Anuradhapura's craftsmen and the religious devotion of its inhabitants.</p>

              <h4 class="content-destination-tittle">Abhayagiri Monastery</h4>
              <p class="content-paragraph">Discover the ruins of Abhayagiri Monastery, a sprawling complex that served as a center of Buddhist learning and monastic life, featuring intricately carved pillars, moonstones, and the iconic Samadhi Buddha statue.</p>

              <h4 class="content-destination-tittle">Isurumuniya Temple </h4>
              <p class="content-paragraph">Admire the ancient rock carvings and serene surroundings of Isurumuniya Temple, offering a tranquil retreat for meditation and reflection amidst its picturesque setting.</p>

              <h4 class="content-destination-tittle">Mihintale</h4>
              <p class="content-paragraph">Embark on a pilgrimage to Mihintale, the sacred mountain where Buddhism was first introduced to Sri Lanka, offering breathtaking views and spiritual insights for travelers seeking enlightenment.</p>

              <h4 class="content-destination-tittle">Kuttam Pokuna (Twin Ponds)</h4>
              <p class="content-paragraph">Explore the ancient hydraulic engineering marvels of Kuttam Pokuna, twin bathing ponds renowned for their sophisticated design and architectural elegance, reflecting the ingenuity of Anuradhapura's engineers.</p>
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