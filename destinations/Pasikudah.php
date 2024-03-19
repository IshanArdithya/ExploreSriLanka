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
    <!-- <h1 class="headings sub-heading">Destinations</h1> -->
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Destinations</a></li>
        <li class="active">Pasikudah</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Pasikudah</h1>
      <p class="lead mini-lead">An exquisite beach based in the East Coast of Sri Lanka, Pasikudah is the ultimate exotic holiday. One of the most inviting features in the district of Batticaloa is the spectacular shoreline of Pasikudah. The sparkling blue waters of the ocean and the soft marble dust like sand is just what you need to unwind in complete bliss.</p>
    </div>

    <!-- Content -->

    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab2">Itinerary</a></li>
            <li><a href="#tab3">Experiences</a></li>
            <!-- <li><a href="#tab4">Map</a></li> -->
          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">

              </div>
              <div class="text-content">

              </div>

              <p class="content-paragraph">Positioned a little over 30km from the Batticaloa Town, the beautiful beach is paradise on earth. Preserving one of the shallowest coastlines in the world, Pasikudah is one of the friendliest beaches in Sri Lanka. The crystalline waters of the ocean invites the intrepid traveller to plunge in and wade in its kind waves. The bay here is curved in shape and the affable shoreline is 2km in length. However, the waters are best swum in during the period of May - September. But if it’s only an escape to somewhere secluded you seek, then the months between November and April should do.</p>

              <p class="content-paragraph"> Complete with many resorts, Pasikudah provides to be the idyllic beach holiday for native and global holidaymakers.</p>
              <h3 class="content-destination-tittle">ATTRACTIONS IN PASIKUDAH</h3>
              <p class="content-paragraph"> Pasikudah is all about leisure. Just unwind on its shores and spend your vacation in divine happiness! If you want to savour your heavenly retreat a little more, do take to engaging a few aquatic sports. It will be fun!</p>

              <h4 class="content-destination-tittle">Snorkeling & Diving</h4>
              <p class="content-paragraph">Blessed with a range of vivid coral life, Pasikudah is a delicious treat for adventurous traveller. You can dive or snorkel to explore the marine life here. Diving is a specialised affair and requires a license. However, if you do not own a valid diving license, then snorkel up! There are shacks right on the beach that rent the gear and the instructor on an hourly rate.</p>

              <h4 class="content-destination-tittle">Surfing</h4>
              <p class="content-paragraph">The Pasikudah season is for the adrenaline pumped surfer! The sea here boasts of a number of breaks and because of its shallow waters, it’s the ideal breeding ground for an amateur surfer.</p>

              <h4 class="content-destination-tittle">Canoeing</h4>
              <p class="content-paragraph">An ideal cardio for your vacation, canoeing is the way to get your necessary workout. You can also explore the vast and beautiful seascape of Pasikudah by paddling on its sapphire waters.</p>
            </div>
          </div>
        </div>
        <div id="tab2" class="item" data-title="Itinerary">
          <div class="item-content">
            <div class="itinerary-content">

              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>
              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>
              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Pasikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>

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


    <h1 class="headings mini-heading">Wildlife Adventure</h1>


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

</html>