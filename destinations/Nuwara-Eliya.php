<?php
$cityCondition = "'Nuwara Eliya'";
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


  <title>Nuwara-Eliya | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide6.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Nuwara-Eliya</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Nuwara-Eliya</h1>
      <p class="lead mini-lead">Nestled in the lush hill country of Sri Lanka, Nuwara Eliya beckons travelers with its charming landscapes and cool climate reminiscent of England. Often dubbed "Little England," this picturesque town offers a delightful escape from the tropical heat, inviting visitors to immerse themselves in its colonial-era charm.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/nuwara eliya1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/nuwaraeliya.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Nuwara-Eliya.png" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/haputale.jpeg" alt=""> </div>
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

              <p class="content-paragraph">As you step into Nuwara Eliya, you'll feel like you've been transported back in time to a bygone era of British colonial rule. The town is adorned with elegant Victorian-style bungalows, boutique hotels, and quaint cottages, all surrounded by rolling hills and verdant tea plantations. The cool, misty air adds to the allure, making it the perfect destination for a romantic getaway or a tranquil retreat.</p>

              <p class="content-paragraph"> Luxurious accommodations await travelers, from historic bungalows to modern five-star hotels, offering a blend of old-world charm and contemporary comfort. Whether you're strolling through the manicured gardens of Victoria Park, taking a leisurely boat ride on Gregory's Lake, or exploring the bustling Bale Bazaar, Nuwara Eliya promises a memorable experience for visitors of all ages.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN NUWARA-ELIYA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Victoria Park</h4>
              <p class="content-paragraph">Explore the serene beauty of Victoria Park, adorned with colorful flower beds and majestic trees, perfect for leisurely strolls and picnics.</p>

              <h4 class="content-destination-tittle">Gregory's Lake</h4>
              <p class="content-paragraph">Enjoy scenic boat rides and water activities on Gregory's Lake, offering breathtaking views of the surrounding hills and lush landscapes.</p>

              <h4 class="content-destination-tittle">Bale Bazaar</h4>
              <p class="content-paragraph">Immerse yourself in the local culture at Bale Bazaar, where you can shop for warm clothing, handicrafts, and souvenirs, offering a taste of Nuwara Eliya's vibrant market scene.</p>

              <h4 class="content-destination-tittle">Colonial Architecture</h4>
              <p class="content-paragraph">Admire the charming colonial architecture of Nuwara Eliya, characterized by elegant Victorian-style bungalows, cottages, and historic buildings, reflecting the town's colonial heritage.</p>

              <h4 class="content-destination-tittle">Tea Estates</h4>
              <p class="content-paragraph">Explore the verdant tea estates surrounding Nuwara Eliya, where you can learn about the tea-making process and sample some of the finest Ceylon tea, offering an authentic taste of Sri Lanka's tea culture.</p>

              <h4 class="content-destination-tittle">Hakgala Botanical Gardens </h4>
              <p class="content-paragraph">Discover the botanical wonders of Hakgala Botanical Gardens, featuring a diverse collection of flora, including rare orchids, ferns, and exotic plants, set amidst scenic landscapes.</p>

              <h4 class="content-destination-tittle">Horton Plains National Park</h4>
              <p class="content-paragraph">Embark on an adventure to Horton Plains National Park, home to breathtaking landscapes, including World's End, a dramatic cliff with panoramic views, and Baker's Falls, a picturesque waterfall nestled amidst lush forests.</p>


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