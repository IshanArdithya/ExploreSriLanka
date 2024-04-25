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


  <title>Weligama | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
    <img src="./Images/slide15.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Weligama</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Weligama</h1>
      <p class="lead mini-lead">Nestled along the southern coast of Sri Lanka, Weligama beckons travelers with its sandy shores and vibrant atmosphere. Just a short drive from Colombo, this charming seaside town offers a perfect escape for day-trippers and holidaymakers alike. Translated to "Sandy Village," Weligama lives up to its name, boasting a picturesque shoreline that lures visitors from near and far.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/weliagama.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/weligamaa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/where-weligama.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatunaaa.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Weligama's journey as a tourist destination began to unfold in the early 1980s, but its allure extends beyond its sandy shores. One of its most intriguing attractions is the nearby islet of Taprobane, formerly known as Galduwa or Rock Island. This tiny island, once owned by Count de Mauny, a guest of tea magnate Sir Thomas Lipton, adds a touch of mystique to Weligama's charm. Additionally, Weligama has gained recognition as a surfing hotspot, attracting enthusiasts to its coastline with a variety of breaks suitable for both novice and experienced surfers.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN WELIGAMA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Agrabodhi Vihara</h4>
              <p class="content-paragraph">Steeped in history and spirituality, the Weligama Agrabodhi Raja Maha Viharaya is believed to have been built during the reign of King Devanampiyatissa. Legend has it that the sacred Bo sapling planted here originated from the revered Maha Bodhi, adding to the site's significance for devout pilgrims and curious travelers alike.</p>

              <h4 class="content-destination-tittle">Fisherman on Stilts</h4>
              <p class="content-paragraph">One of the most captivating sights in Weligama is witnessing the fishermen on stilts, a tradition that has endured for generations. Against the backdrop of the rising sun, these skilled fishermen balance precariously on their stilts, casting their nets into the sparkling waters, creating a scene of timeless beauty and cultural authenticity.</p>

              <h4 class="content-destination-tittle">Kushta Raja Gala</h4>
              <p class="content-paragraph">Immersing visitors in the rich tapestry of Weligama's history, the Kushta Raja Gala stands as a testament to the region's storied past. This imposing statue, nearly 10 feet tall, is believed to depict the Leper King, a figure shrouded in myth and legend. According to local lore, the king cured himself of leprosy by consuming coconut pulp and water for three months, leading to the construction of this awe-inspiring monument as an expression of gratitude.</p>

              <h4 class="content-destination-tittle">Taprobane Island</h4>
              <p class="content-paragraph">For a truly unforgettable experience, a visit to Taprobane Island is a must. This idyllic retreat, once graced by the presence of international pop icon Kylie Minogue, exudes an air of exclusivity and luxury. The island's allure is further enhanced by Minogue's own song, "Taprobane (Extraordinary Day)," inspired by her stay here, enticing visitors with the promise of an extraordinary escape.</p>

              <h4 class="content-destination-tittle">Surfing</h4>
              <p class="content-paragraph">Adventurous spirits flock to Weligama's shores to ride the waves and experience the thrill of surfing. With its gentle waters and variety of breaks, Weligama offers the perfect setting for both amateur and seasoned surfers to hone their skills or simply enjoy a day of aquatic adventure. Whether you're a novice looking to catch your first wave or a seasoned pro seeking new challenges, Weligama's surf scene promises an exhilarating experience for all.</p>
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