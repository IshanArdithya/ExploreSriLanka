<?php
$cityCondition = "'Kandy'";
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


  <title>Kandy | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide3-1.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Kandy</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Kandy</h1>
      <p class="lead mini-lead">Enveloped in lush greenery and steeped in history, Kandy stands as a testament to Sri Lanka's rich cultural heritage and natural splendor. Nestled amidst hills and adorned with serene lakes, this picturesque city has long been a favorite destination for travelers seeking an authentic Sri Lankan experience. From its ancient temples to its vibrant festivals, Kandy offers a glimpse into the island nation's storied past and vibrant present.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/kandy1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/kandy.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/kandyy.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/kandy1.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Kandy's history dates back centuries, with legends attributing its founding to King Vickramabahu III. However, it was under the rule of King Sena Sammaththa Wickramabahu that Kandy flourished as the administrative capital of the Kandyan Kingdom. Surrounded by mountains and dense forests, Kandy served as a natural fortress, enabling the kingdom to withstand external threats for over 300 years.</p>

              <p class="content-paragraph">Despite its formidable defenses, Kandy faced internal conflicts, particularly struggles between the royal family and nobles, which eventually led to colonial intervention. The Portuguese, Dutch, and British vied for control over the region, each leaving their mark on Kandy's history. The eventual cession of independence to the British in 1815 marked the end of the Kandyan Kingdom's sovereignty. </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN KANDY</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">The Temple of the Tooth Relic</h4>
              <p class="content-paragraph">The Temple of the Tooth Relic, also known as Sri Dalada Maligawa, stands as one of the most sacred sites in Sri Lanka, located in the heart of Kandy. This revered temple is not only a place of worship but also a repository of centuries-old religious and cultural heritage.</p>

              <h4 class="content-destination-tittle">Kandy Lake</h4>
              <p class="content-paragraph">Also known as Kiri Muhuda or Sea of Milk, Kandy Lake is a scenic marvel constructed by King Sri Wickrama Rajasinghe. Surrounded by folklore and mystery, the lake offers tranquil views and is rumored to have been connected to the palace via a secret tunnel.</p>

              <h4 class="content-destination-tittle">National Museum of Kandy</h4>
              <p class="content-paragraph">Housed within the former royal palace, the National Museum of Kandy showcases over 5000 artifacts reflecting the region's rich heritage, including the historic agreement of 1815 that ceded Kandy to the British.</p>

              <h4 class="content-destination-tittle">The Kandy Esala Perehara</h4>
              <p class="content-paragraph">Held annually in August, the Kandy Esala Perehara is a vibrant procession featuring dancers, whip crackers, and adorned elephants. This captivating cultural spectacle attracts both locals and visitors alike.</p>

              <h4 class="content-destination-tittle">Peradeniya Botanical Gardens</h4>
              <p class="content-paragraph">Originally established centuries ago, the Peradeniya Botanical Gardens were meticulously designed by British horticulturist George Gardner. Spanning vast landscaped grounds, the gardens boast a stunning array of rare flora and fauna, making it a must-visit for nature enthusiasts.</p>

              <h4 class="content-destination-tittle">Gadaladeniya, Lankatileke, Embekke</h4>
              <p class="content-paragraph">Located in Gampola, these three temples offer historical and architectural marvels. From the intricate wooden carvings of Embekke Devalaya to the brick construction of Gadaladeniya temple and the rock-based Lankatilaka Viharaya, each site is a testament to Sri Lanka's rich religious and artistic traditions. Embark on a journey through Kandy's captivating landscapes and storied past, where every corner reveals a new layer of history and natural beauty.
              </p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide3.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide25.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide28.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide27.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide26.jpg" alt="destination_image"> </div>
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