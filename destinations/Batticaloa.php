<?php
$cityCondition = "'Batticaloa'";
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


  <title>Batticaloa | Explore Srilanka</title>
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
        <li class="active">Batticaloa</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Batticaloa</h1>
      <p class="lead mini-lead">Nestled along Sri Lanka's eastern coast, Batticaloa emerges as a captivating destination renowned for its pristine beaches and tranquil ambiance. Situated a six-hour drive from the bustling capital of Colombo, Batticaloa beckons travelers seeking respite amidst its natural beauty and historical significance.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/batticaloa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Batticaloaa.png" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/bentota-beach.jpg" alt=""> </div>
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

              <p class="content-paragraph">Batticaloa's origins trace back to ancient times, steeped in legend and antiquity. According to chronicles, the region's history predates the arrival of Prince Vijaya, with its inhabitants, the 'Nagas,' laying claim to a civilization rooted in myth and tradition. Over the centuries, Batticaloa's strategic importance grew, particularly during the shift of power from the Polonnaruwa kingdom to the rise of the Jaffna Kingdom.</p>

              <p class="content-paragraph">The colonial era saw Batticaloa become a focal point for European powers vying for control of Sri Lanka's coastal regions. The Portuguese were the first to seize Batticaloa's harbor, signaling the beginning of colonial dominance in the area. Subsequent battles between the Portuguese, Dutch, and native forces underscored the region's economic and geopolitical significance, culminating in Dutch victory and eventual British rule. </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN BATTICALOA</h3>
              <p class="content-paragraph">Batticaloa boasts a wealth of attractions that appeal to history enthusiasts, nature lovers, and cultural explorers alike, offering a diverse range of experiences amidst its serene surroundings.</p>

              <h4 class="content-destination-tittle">Batticaloa Fort</h4>
              <p class="content-paragraph">Originally built by the Portuguese and later fortified by the Dutch, Batticaloa Fort stands as a testament to the region's colonial past. Situated amidst the lagoon and a canal, the fort showcases Dutch naval architecture and offers visitors a glimpse into Batticaloa's maritime history.</p>

              <h4 class="content-destination-tittle">Kallady Bridge</h4>
              <p class="content-paragraph">Spanning the vast Batticaloa lagoon, the Kallady Bridge, also known as Lady Manning Bridge, is a British colonial-era marvel. Offering panoramic views of the surrounding landscape, the bridge serves as both a practical thoroughfare and a scenic attraction for visitors.</p>

              <h4 class="content-destination-tittle">Batticaloa Lighthouse</h4>
              <p class="content-paragraph">Perched along Bar Road, the Muttuwaran Lighthouse dates to 1913 and offers stunning views of the lagoon from its narrow ladder ascent. Surrounded by picturesque scenery, the lighthouse provides a serene setting for leisurely bike rides and strolls.</p>

              <h4 class="content-destination-tittle">Paskiduah/Kalkudah</h4>
              <p class="content-paragraph">Batticaloa is home to two renowned beaches, Passikudah and Kalkudah, known for their crystal-clear waters and pristine sands. Passikudah's sapphire-like waters contrast with Kalkudah's more rugged coastline, offering visitors a choice between idyllic relaxation and adventurous exploration.</p>

              <h4 class="content-destination-tittle">Mamangam Temple</h4>
              <p class="content-paragraph">Located three kilometers from the town center, Mamangam Kovil stands as one of Batticaloa's oldest temples, steeped in legend and folklore. Believed to have origins tied to the tale of Prince Rama and Sita, the temple offers a spiritual retreat amidst Batticaloa's natural splendor.</p>
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