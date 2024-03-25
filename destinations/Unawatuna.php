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


  <title>Desinations - Explore Srilanka</title>
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
        <li class="active">Unawatuna</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Unawatuna</h1>
      <p class="lead mini-lead">Nestled along the vibrant coastline of Galle, Sri Lanka, Unawatuna beckons travelers with its lively atmosphere and sun-kissed shores. Affectionately known as 'Una' by locals, this coastal city has emerged as a sought-after destination for both domestic and international visitors seeking relaxation and adventure.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Unawatuna.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatunaaa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatunaaaa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatun&aaa.jpg" alt=""> </div>
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

              <p class="content-paragraph">Imbued with a rich tapestry of history and myth, Unawatuna holds a special place in Sri Lanka's cultural narrative. According to legend, the city derives its name from an ancient tale in the Ramayana epic, where a portion of a mountain fell to the ground during a journey. This mythological connection adds an intriguing layer to Unawatuna's allure, blending folklore with reality.</p>

              <p class="content-paragraph">Throughout history, Unawatuna has been a focal point of colonial interest, particularly during the European colonial era in Sri Lanka. The strategic significance of its coastal location made it a target for various colonial powers, including the Portuguese and Dutch. Today, remnants of this colonial legacy can still be explored, adding depth to Unawatuna's historical charm. </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN UNAWATUNA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Jungle Beach</h4>
              <p class="content-paragraph">Tucked away in serene seclusion, Jungle Beach offers an idyllic retreat for those seeking solitude amidst nature's beauty. Its pristine shores and calm waters create the perfect setting for a romantic getaway or a peaceful day of relaxation. The tranquil panorama of Jungle Beach captivates visitors, inviting them to immerse themselves in its tranquil ambiance.</p>

              <h4 class="content-destination-tittle">Yatagala Rajamaha Viharaya</h4>
              <p class="content-paragraph">With a history spanning over two millennia, the Yatagala Rajamaha Viharaya stands as a testament to Sri Lanka's ancient heritage. Founded during the reign of King Devanampiyatissa, this sacred site has undergone restoration by successive kingdoms throughout the centuries. Adorned with a reclining statue of Lord Buddha, as well as the first saplings of the Anuradhapura Bodhiya, Yatagala Rajamaha Viharaya holds profound religious significance for devotees and history enthusiasts alike.</p>

              <h4 class="content-destination-tittle">Japanese Peace Pagoda</h4>
              <p class="content-paragraph">Symbolizing peace and harmony, the Japanese Peace Pagoda stands as a majestic tribute to Buddhist teachings and the enduring legend of Hanuman. As a representative of the Mahayana Buddhist tradition, this iconic structure offers a serene sanctuary for spiritual reflection and cultural exploration.</p>

              <h4 class="content-destination-tittle">Swethamalee Chaitya</h4>
              <p class="content-paragraph">Perched atop a gentle hill, the Swethamalee Chaitya holds a sacred place in the hearts of devotees, particularly during the month of Esala. Pilgrims from far and wide gather here to pay homage and offer prayers, with many bringing offerings of produce as tokens of devotion. The serene surroundings of Swethamalee Chaitya inspire reverence and tranquility, providing a serene escape from the hustle and bustle of daily life.</p>

              <h4 class="content-destination-tittle">Eco Excursions</h4>
              <p class="content-paragraph">Unawatuna invites adventurous souls to embark on eco-excursions that showcase the region's natural splendor. Whether exploring the marshy terrain of Rumassala Hill, a haven for birdwatchers, or venturing into the vibrant marine ecosystems off the coast, there are countless opportunities to connect with nature and discover the diverse flora and fauna that call Unawatuna home.</p>
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

                $sql = "SELECT full_name, short_desc, hotel_picture FROM hotels WHERE city = 'Kandy'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<div class="destination-content-container">';
                        echo '<div class="destination-image-container">';
                        $image_location = $row['hotel_picture'];
                        echo '<img src="../' . $image_location . '" alt="">';
                        echo '</div>';
                        echo '<div class="destination-hotel-container">';
                        echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
                        echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                        echo '<p class="content-paragraph">Read more</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No hotels found in Kandy.";
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
  <script src="../js/script.js"></script>

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
</body>