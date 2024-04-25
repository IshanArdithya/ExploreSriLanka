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


  <title>Induruwa | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide26.jpg" alt="">

  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Induruwa</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Induruwa</h1>
      <p class="lead mini-lead">Nestled along the southwestern coast of Sri Lanka lies the tranquil seaside haven of Induruwa, beckoning travelers with its pristine beaches and laid-back charm. Situated within easy reach of Bentota and just over two hours from the bustling commercial capital of Colombo, Induruwa offers an idyllic escape for those seeking sun, sea, and relaxation.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/induruwa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/pasidudahh.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/batticaloa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatuna.jpg" alt=""> </div>
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

              <p class="content-paragraph">Induruwa emerges as a hidden gem among Sri Lanka's picturesque beaches, captivating visitors with its warm sands and inviting waters. The expansive coastline of Induruwa provides a serene retreat for beach lovers, where one can spend leisurely days lounging on deck chairs, sipping on refreshing King Coconut water, and soaking up the tropical sun. Whether cooling off with a dip in the gentle waves or strolling hand in hand along the shore, the tranquil ambiance of Induruwa sets the stage for a truly rejuvenating getaway.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN INDURUWA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Induruwa Beach</h4>
              <p class="content-paragraph">The crown jewel of this coastal paradise, Induruwa Beach boasts a pristine shoreline that stretches as far as the eye can see. Perfect for unwinding and soaking up the sun, this tranquil haven offers a sense of seclusion and serenity, making it ideal for couples seeking a romantic escape or families in search of fun-filled beach days.</p>

              <h4 class="content-destination-tittle">Romantic Sunset Strolls</h4>
              <p class="content-paragraph">Indulge in the ultimate romantic experience as you and your loved one take a leisurely stroll along the endless coastal stretch of Induruwa Beach. Watch in awe as the sky transforms into a canvas of vibrant hues during sunset, casting a golden glow over the rippling waves and creating unforgettable memories.</p>

              <h4 class="content-destination-tittle">Family Fun Activities</h4>
              <p class="content-paragraph">Induruwa welcomes families with open arms, offering a host of exciting activities to keep both children and adults entertained. From building sandcastles and playing beach ball to simply running along the shoreline, there's no shortage of fun-filled moments to be had on this sun-kissed coast.</p>

              <h4 class="content-destination-tittle">Local Bistros and Cafes</h4>
              <p class="content-paragraph">Explore the culinary delights of Induruwa with its charming bistros and cafes, serving up a tantalizing array of local and international cuisine. Sample fresh seafood dishes, indulge in tropical fruit smoothies, or simply savor a cup of Ceylon tea as you soak in the laid-back ambiance of this coastal retreat.</p>

              <h4 class="content-destination-tittle">Accommodation Options</h4>
              <p class="content-paragraph">Whether you're seeking a luxury resort or a cozy guesthouse, Induruwa offers a range of accommodation options to suit every taste and budget. From beachfront villas to quaint boutique hotels, you'll find the perfect home away from home amidst the scenic beauty of this coastal paradise.</p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/Anuradhapura.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Arugam Bay1.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/Bandarawela.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/batticaloa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/bentota-beach.jpg" alt="destination_image"> </div>
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