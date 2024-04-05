<?php
$cityCondition = "'Matara'";
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


  <title>Mirissa | Explore Srilanka</title>
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
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Mirissa</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Mirissa</h1>
      <p class="lead mini-lead">Nestled in the coastal district of Matara, Sri Lanka, Mirissa beckons travelers with its stunning beaches and vibrant aquatic life. Situated approximately 240 km away from Colombo, the commercial capital, Mirissa has emerged as a beloved destination for both local and international visitors seeking relaxation and adventure by the sea.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/mirissa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissa1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Trincomale.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Mirissa_coconut-hill.jpg" alt=""> </div>
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

              <p class="content-paragraph">Nestled along the captivating coastline of Sri Lanka's Matara district, Mirissa epitomizes the essence of a tropical paradise. This charming coastal town situated approximately 240 km south of Colombo, the capital city, beckons travelers with its pristine beaches, azure waters, and vibrant marine life. Mirissa's allure lies in its seamless blend of relaxation and adventure, making it a coveted destination for beach lovers and thrill-seekers alike. The region's tranquil beaches provide the perfect backdrop for leisurely strolls, sunbathing sessions, and serene moments of contemplation against the rhythmic backdrop of crashing waves.</p>

              <p class="content-paragraph"> For those seeking adventure, Mirissa offers an array of exhilarating activities to satisfy every adrenaline junkie. From heart-pounding whale and dolphin watching expeditions to thrilling surfing sessions on the rolling waves, there's no shortage of excitement to be found in Mirissa's waters.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN MIRISSA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Whale Watching</h4>
              <p class="content-paragraph">Mirissa is renowned worldwide for its whale and dolphin watching excursions. During selected seasons, typically between November and April, as well as July and October, these majestic marine creatures grace the waters of Mirissa, offering visitors a rare opportunity to witness them in their natural habitat.</p>

              <h4 class="content-destination-tittle">Surfing</h4>
              <p class="content-paragraph">Embraced by both beginners and seasoned surfers, the shores of Mirissa present ideal conditions for surfing enthusiasts. With gentle breaks suitable for novices, as well as more challenging waves for experienced riders, Mirissa promises an exhilarating surfing experience against the backdrop of its picturesque coastline.</p>

              <h4 class="content-destination-tittle">Snorkelling</h4>
              <p class="content-paragraph">Dive into the crystal-clear waters off Mirissa Beach and explore the vibrant marine life thriving beneath the surface. The shallow areas near the shore provide perfect conditions for snorkeling, allowing enthusiasts to observe colorful fish and coral reefs in their natural habitat with ease.</p>

              <h4 class="content-destination-tittle">Fishing</h4>
              <p class="content-paragraph">Embrace the coastal lifestyle and embark on a fishing adventure from the bustling port of Mirissa. Whether you're a seasoned angler or a novice, the waters surrounding Mirissa offer ample opportunities for a rewarding fishing experience. Rent a boat and join a local fisherman to cast your line and reel in your own catch of the day.</p>

              <h4 class="content-destination-tittle">Sightseeing</h4>
              <p class="content-paragraph">While Mirissa's main allure lies in its pristine beaches and aquatic activities, the region also boasts cultural and historical attractions worth exploring. For the curious wanderer, Mirissa is home to several temples of interest, including the Ratnagiri Temple, Bandaramulla Temple, and the Ancient Mirissa Bodhiya, providing insights into the region's rich heritage and spiritual traditions.</p>
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