<?php
$cityCondition = "'Kegalle'";
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


  <title>Kitugala | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide17-1.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Kitulgala</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Kitulgala</h1>
      <p class="lead mini-lead">Nestled amidst the lush greenery of Sri Lanka's wet zone, Kitulgala beckons adventurers with its pristine beauty and thrilling activities. Situated just three hours away from Colombo, this charming town is best known as the ultimate destination for white water rafting enthusiasts.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/kithulgala.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kithulgalajpg.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kithulgala.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kithulgalajpg.jpg" alt=""> </div>

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

              <p class="content-paragraph">Kitulgala's journey as an adventure hub began to take shape in the early nineties, earning fame primarily for its exhilarating white water rafting experiences. Its cinematic allure was further enhanced by its feature in the Hollywood blockbuster "The Bridge on the River Kwai," starring renowned actors such as William Holden, Alec Guinness, and Jack Hawkins. This iconic film catapulted Kitulgala into the spotlight, showcasing its natural splendor to audiences worldwide.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN KITULGALA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">White Water Rafting</h4>
              <p class="content-paragraph">Kitulgala is synonymous with white water rafting, offering adrenaline-pumping experiences for both seasoned adventurers and first-time rafters. Navigate through thrilling rapids under the guidance of experienced instructors, immersing yourself in the breathtaking beauty of the Kelani River.</p>

              <h4 class="content-destination-tittle">Bird Watching</h4>
              <p class="content-paragraph">For nature enthusiasts, Kitulgala offers the perfect opportunity to observe a diverse array of bird species in their natural habitat. Explore the tranquil surroundings of Mankandawa Forest Reserve, home to endemic birds such as the Sri Lankan Orange-Billed Babbler and Chestnut-Backed Owlet.</p>

              <h4 class="content-destination-tittle">The Belilena Cave</h4>
              <p class="content-paragraph">Delve into the fascinating history of Kitulgala with a visit to the Belilena Cave, a site of great anthropological significance. Discover ancient skeletal remains, including those of the Balangoda Man, dating back over 16,000 years, offering insights into prehistoric life in Sri Lanka.</p>

              <h4 class="content-destination-tittle">Cycling in Kitulgala</h4>
              <p class="content-paragraph">Explore the scenic landscapes of Kitulgala on two wheels, embarking on thrilling cycling adventures through its vast terrains. Pedal your way through lush greenery, charming villages, and alongside the tranquil lake, soaking in panoramic views of the surrounding wilderness.</p>
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
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide17.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide10.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide16.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide15.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item">  <img src="../destinations/Images/slide14.jpg" alt="destination_image"> </div>
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