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


  <title>Pasikudah | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide7-1.png" alt="">
    <!-- <h1 class="headings sub-heading">Destinations</h1> -->
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Pasikudah</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Pasikudah</h1>
      <p class="lead mini-lead">Nestled along the captivating East Coast of Sri Lanka, Pasikudah stands as a testament to exotic beauty and tranquility. Situated in the district of Batticaloa, this breathtaking beach boasts a shoreline that beckons travelers from far and wide. With its soft, marble-like sands and mesmerizing blue waters, Pasikudah offers the perfect backdrop for an unforgettable holiday experience.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/pasidudahh.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/pasikudah.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissa1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/bentota-beachh.jpg" alt=""> </div>
    </div>

    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab3">Related Hotels</a></li>
            <!-- <li><a href="#tab3">Experiences</a></li>
            <li><a href="#tab4">Map</a></li> -->
          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">

              </div>
              <div class="text-content">

              </div>

              <p class="content-paragraph">Just over 30 kilometers from Batticaloa Town, Pasikudah is a true paradise on earth. Renowned for preserving one of the shallowest coastlines globally, it welcomes visitors with open arms. The crystalline waters of the ocean invite travelers to immerse themselves and bask in the gentle waves. With its curved bay and 2-kilometer shoreline, Pasikudah offers a friendly and inviting atmosphere.</p>

              <p class="content-paragraph"> While swimming is best enjoyed from May to September, the beach remains a secluded escape throughout the months of November to April, catering to both local and international holidaymakers with its array of resorts.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN PASIKUDAH</h3>
              <p class="content-paragraph">Pasikudah epitomizes leisure, offering a haven for travelers to unwind and revel in pure happiness. For those seeking to enhance their retreat, engaging in aquatic sports adds an extra dimension of fun and adventure.</p>

              <h4 class="content-destination-tittle">Snorkeling & Diving</h4>
              <p class="content-paragraph">Pasikudah’ s underwater world teems with vivid coral life, enticing adventurous travelers to explore its depths. Whether diving or snorkeling, visitors can immerse themselves in the mesmerizing marine life. While diving requires a specialized license, snorkeling offers a more accessible option. Beachfront shacks provide gear rental and expert instruction, ensuring a safe and thrilling experience for all.</p>

              <h4 class="content-destination-tittle">Surfing</h4>
              <p class="content-paragraph">Surf enthusiasts flock to Pasikudah during its peak season, drawn by the adrenaline rush of its waves. With numerous breaks along its shores and shallow waters ideal for beginners, it's a haven for surfers of all skill levels. Whether riding the waves for the first time or seeking the perfect break, Pasikudah promises an exhilarating experience amidst its azure waters.</p>

              <h4 class="content-destination-tittle">Canoeing</h4>
              <p class="content-paragraph">For a unique and refreshing adventure, canoeing along Pasikudah's serene waters offers the perfect escape. As travelers paddle through the picturesque seascape, they not only enjoy a workout but also immerse themselves in the beauty of their surroundings. Whether solo or with a companion, canoeing provides a tranquil and rejuvenating experience amidst Pasikudah's paradisiacal setting.</p>
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
        <!-- <div id="tab2" class="item" data-title="Itinerary">
          <div class="item-content">
            <div class="itinerary-content">

              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>
              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>
              <div class="destination-content-container">
                <div class="destination-image-container">
                  <img src="../Images/slide1.jpg" alt="">
                </div>
                <div class="destination-hotel-contntents">
                  <h3 class="content-title">MAALU MAALU RESORT</h3>
                  <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                  <p class="content-paragraph">Read more</p>
                </div>
              </div>

            </div>
          </div>
        </div> -->
        <!-- <div id="tab3" class="item" data-title="Experiences">
          <div class="item-content">
            <div class="places-content">
              <div class="place-details-wrap">

                <div class="destination-content-container">

                  <div class="destination-image-container">
                    <img src="../Images/slide1.jpg" alt="">
                  </div>
                  <div class="destination-hotel-contntents">
                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                    <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                    <p class="content-paragraph">Read more</p>
                  </div>
                </div>
                <div class="destination-content-container">
                  <div class="destination-image-container">
                    <img src="../Images/slide1.jpg" alt="">
                  </div>
                  <div class="destination-hotel-contntents">
                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                    <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                    <p class="content-paragraph">Read more</p>
                  </div>
                </div>
                <div class="destination-content-container">
                  <div class="destination-image-container">
                    <img src="../Images/slide1.jpg" alt="">
                  </div>
                  <div class="destination-hotel-contntents">
                    <h3 class="content-title">MAALU MAALU RESORT</h3>
                    <p class="content-paragraph">The intrinsic splendour of Passikudah, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be seamless connection between the ocean and hotel.</p>
                    <p class="content-paragraph">Read more</p>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div> -->
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