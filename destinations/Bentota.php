<?php
$cityCondition = "'Galle'";
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


  <title>Bentota | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide28.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Bentota</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Bentota</h1>
      <p class="lead mini-lead">Nestled within easy reach of Colombo, Sri Lanka, Bentota emerges as a convenient holiday haven, just a short drive away from the bustling capital. Renowned for its pristine beaches and vibrant water sports scene, Bentota has cemented its status as one of the country's premier vacation destinations.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/bentota-beach.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/bentota-beachh.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/pasikudah.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/batticaloa.jpg" alt=""> </div>
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

              <p class="content-paragraph">Bentota's palm-fringed beaches stretch for miles, providing visitors with ample opportunities for sunbathing, swimming, and water sports. The warm waters of the Indian Ocean are ideal for activities such as snorkeling, diving, and jet-skiing, catering to both adrenaline junkies and leisure seekers. In addition to its stunning coastline, Bentota is home to the tranquil Bentota River, where boat safaris offer glimpses of exotic wildlife and picturesque mangrove forests. Visitors can embark on scenic river cruises or explore the surrounding area by kayak, immersing themselves in the natural beauty of the region.</p>

              <p class="content-paragraph"> For those interested in culture and history, Bentota boasts several attractions, including the Brief Garden, a lush tropical paradise created by renowned landscape architect Bevis Bawa. The nearby Galapata Vihara, an ancient Buddhist temple dating back to the 12th century, offers insight into Sri Lanka's rich cultural heritage.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN BENTOTA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Galapatha Raja Maha Vihara</h4>
              <p class="content-paragraph">Located near the tranquil Benthara River, the Galapatha Raja Maha Vihara temple offers a glimpse into Sri Lanka's ancient history, tracing its roots back to the early Anuradhapura Kingdom. Built under the patronage of King Saddhatissa, this temple holds significant religious importance as the repository of the tooth relic of Arahat Maha Kassapa Thera, a revered disciple of Lord Buddha.</p>

              <h4 class="content-destination-tittle">The Bentota Beach</h4>
              <p class="content-paragraph">Synonymous with leisure and relaxation, the Bentota Beach beckons international holidaymakers and locals alike with its golden sands and welcoming shores. A paradise for sun-seekers, this idyllic stretch of coastline invites visitors to unwind amidst the soothing sound of the waves and bask in the warmth of the tropical sun.</p>

              <h4 class="content-destination-tittle">Brief Garden</h4>
              <p class="content-paragraph">A sanctuary for the artistic soul, Brief Garden, owned by Bewis Bawa, offers a captivating blend of natural beauty and creative expression. The sprawling gardens, characterized by their rustic charm and lush foliage, provide a picturesque backdrop for leisurely strolls. Within the garden, Bewis Bawa's house showcases a treasure trove of artworks, adding to the allure of this enchanting retreat.</p>

              <h4 class="content-destination-tittle">The Bentota River</h4>
              <p class="content-paragraph">For thrill-seekers and adventure enthusiasts, the Bentota River serves as the ultimate playground, offering a host of exhilarating water-based activities. From heart-pounding banana boat rides to serene kayaking adventures, the river beckons visitors to embark on memorable escapades amidst its gentle ripples and scenic surroundings.</p>

              <h4 class="content-destination-tittle">Lunuganga</h4>
              <p class="content-paragraph">A testament to architectural brilliance and natural splendor, Lunuganga stands as the former country estate of renowned architect Geoffrey Bawa. Influenced by Renaissance architecture, the meticulously landscaped gardens showcase Bawa's visionary genius, offering visitors a tranquil respite from the hustle and bustle of everyday life. Explore winding pathways, serene water features, and verdant greenery, and immerse yourself in the timeless beauty of Lunuganga.</p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/habarana.jpeg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/haputalee.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/hikkaduwa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/HortonPlains.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/induruwa.jpg" alt="destination_image"> </div>
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