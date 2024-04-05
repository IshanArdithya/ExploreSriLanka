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


  <title>Arugam Bay | Explore Srilanka</title>
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
        <li class="active">Arugam-Bay</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Arugam-Bay</h1>
      <p class="lead mini-lead">Arugam Bay, situated along Sri Lanka's east coast in the bustling city of Pottuvil, is renowned globally for its exceptional surf breaks. Drawing surfers from around the world, this coastal gem offers pristine beaches, vibrant culture, and a thriving hospitality scene. With a range of restaurants and hotels catering to international travelers, Arugam Bay has firmly established itself as a premier destination for surf enthusiasts and adventure seekers alike.
      </p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Arugam Bay1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Arugam Bay2.jpg" alt=""> </div>

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

              <p class="content-paragraph">The history of Arugam Bay is intertwined with the rich heritage of the Ampara district, where it is located. Believed to have been inhabited by Aryan migrants centuries ago, the area holds significance dating back to the era of the Anuradhapura Kingdom. Over the past few decades, Arugam Bay has emerged as a haven for adventurous travelers, attracting visitors with its friendly shores and abundance of aquatic activities. With its growing popularity, Arugam Bay has become synonymous with surfing, snorkeling, diving, and windsurfing, offering an exhilarating experience for all who visit.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN ARUGAM-BAY</h3>
              <p class="content-paragraph">Beyond its reputation as a surfing paradise, Arugam Bay boasts a variety of attractions that cater to diverse interests, from ancient temples to pristine forests.</p>

              <h4 class="content-destination-tittle">Magul Maha Vihara</h4>
              <p class="content-paragraph">Dating back over two thousand years, the Magul Maha Vihara is steeped in legend and history. Believed to have been built by King Kavantisssa for his wife Queen Devi, the temple holds a captivating tale of love and devotion. Visitors can explore the ancient ruins and immerse themselves in the mystical ambiance of this revered site.</p>

              <h4 class="content-destination-tittle">Lahugala Forest</h4>
              <p class="content-paragraph">Located near the Magul Maha Vihara, Lahugala Forest is the smallest reserve in Sri Lanka, yet it boasts a diverse array of wildlife, including elephants, leopards, peacocks, sloths, and deer. Nature lovers can embark on a safari or hike through the forest, soaking in the breathtaking scenery and encountering its inhabitants along the way.</p>

              <h4 class="content-destination-tittle">Kudumbigala Monastery</h4>
              <p class="content-paragraph">Escape the surf scene and delve into spirituality at the Kudumbigala Monastery, one of the oldest in Sri Lanka. Built by King Devanampiyatissa, the complex features over two hundred rock caves, each with its own history and significance. Visitors can explore the tranquil surroundings and discover the ancient relics and inscriptions that adorn the monastery.</p>

              <h4 class="content-destination-tittle">Sangamankandy Pilliyar Kovil</h4>
              <p class="content-paragraph">Immerse yourself in the cultural heritage of Arugam Bay by visiting the Sangamankandy Pilliyar Kovil. Nestled within the town of Pottuvil, this ancient temple is steeped in history and mythology, offering a fascinating glimpse into the region's religious traditions. Whether you're a native or a traveler, the kovil promises a captivating and enriching experience.</p>

              <h4 class="content-destination-tittle">Surfing</h4>
              <p class="content-paragraph">Attracting surfers of all levels, Arugam Bay is famed for its superior surf breaks, including the renowned "Main Point" in the south and Whiskey Point and Pottuvil Point in the north. Hosting the first international surf contest in 2010, the bay continues to be a mecca for surf enthusiasts. For those looking to learn, numerous surf schools offer lessons and guidance to help riders catch their first waves.</p>
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