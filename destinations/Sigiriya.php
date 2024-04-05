<?php
$cityCondition = "'Matale'";
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


  <title>Sigiriya | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide9-1webp.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Sigiriya</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Sigiriya</h1>
      <p class="lead mini-lead">Located in the heart of Sri Lanka, Sigiriya emerges as a timeless marvel, captivating both the imagination and the senses of all who behold it. Rising majestically from the surrounding landscape, this ancient rock fortress stands as a testament to the ingenuity and ambition of its creators. Often hailed as one of the most intriguing sites in the country, Sigiriya beckons travelers from far and wide to uncover its secrets and marvel at its splendor.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/sigiriya1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/sigiriya.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/sigiriyajpg.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/sigiriya1.jpg" alt=""> </div>
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

              <p class="content-paragraph">Bearing the moniker "Lion Rock," Sigiriya stands as a testament to the enduring legacy of Sri Lanka's ancient civilizations. Steeped in myth and mystery, this UNESCO World Heritage Site beckons visitors to explore its labyrinthine passages, verdant gardens, and towering monuments. Whether scaling its vertiginous heights or marveling at its intricate frescoes, travelers are sure to be entranced by the timeless allure of Sigiriya.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN SIGIRIYA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">The Water Gardens</h4>
              <p class="content-paragraph">Nestled at the base of the Sigiriya rock fortress, the Water Gardens offer a serene oasis amidst the rugged landscape. These meticulously designed gardens boast a series of interconnected pools and fountains, where visitors can imagine the lavish lifestyle of King Kashyapa and his court. Fed by an intricate system of underground conduits, the water gardens provide a refreshing respite and a glimpse into the engineering prowess of ancient Sri Lanka.</p>

              <h4 class="content-destination-tittle">Frescoes</h4>
              <p class="content-paragraph">One of the most captivating features of Sigiriya is its collection of vibrant frescoes, which adorn the walls of a sheltered alcove halfway up the rock face. Dating back over a thousand years, these exquisite paintings depict celestial maidens, known as "apsaras," in various states of grace and beauty. Despite the passage of time, the colors remain remarkably vivid, offering a tantalizing glimpse into the artistic sophistication of the ancient Sinhalese civilization.</p>

              <h4 class="content-destination-tittle">Entrance to Sigiriya</h4>
              <p class="content-paragraph">As visitors approach the towering edifice of Sigiriya, they are greeted by the imposing sight of the Lion Staircase, flanked by two massive carved paws. This iconic entrance, known as the Terrace of the Lion, once served as the gateway to the royal citadel perched atop the rock. Symbolizing strength and power, the lion motif evokes the formidable nature of Sigiriya and sets the stage for the awe-inspiring experience that awaits within.</p>

              <h4 class="content-destination-tittle">The Mirror Wall</h4>
              <p class="content-paragraph">Ascending the steep staircases of Sigiriya, travelers encounter the remarkable Mirror Wall, a gleaming expanse of polished plaster that once reflected the visage of King Kashyapa himself. Carved with ancient graffiti and poetic inscriptions, this mirrored surface bears testament to the admiration and reverence felt by generations of visitors who have passed this way. Despite its humble appearance, the Mirror Wall holds a wealth of historical and cultural significance, offering a tangible link to the past.</p>

              <h4 class="content-destination-tittle">The Boulder Garden</h4>
              <p class="content-paragraph">At the summit of Sigiriya, visitors are greeted by the rugged beauty of the Boulder Garden, a naturalistic landscape dotted with ancient caves and rock formations. This rugged terrain served as a defensive stronghold during the time of King Kashyapa, offering refuge and protection to the inhabitants of the royal citadel. Today, it provides a stunning backdrop for exploration and contemplation, inviting travelers to connect with the rich history and natural beauty of Sigiriya.</p>
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