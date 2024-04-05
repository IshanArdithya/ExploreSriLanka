<?php
$cityCondition = "'Polonnaruwa'";
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


  <title>Polonnaruwa | Explore Srilanka</title>
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
        <li><a href="../tours.php">Destinations</a></li>
        <li class="active">Polonnaruwa</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Polonnaruwa</h1>
      <p class="lead mini-lead">Situated in Sri Lanka, Polonnaruwa stands as a testament to the country's rich history and cultural heritage. Located just over five hours from Colombo, this ancient city beckons travelers with its fascinating relics and architectural wonders. As the second city after Anuradhapura to boast ancient architecture, Polonnaruwa offers a captivating journey through time, drawing visitors from around the globe to explore its storied past.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/polonnaruwaa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Polonnaruwa.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/polonnaruwa1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/vatadage.jpg" alt=""> </div>
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

              <p class="content-paragraph">Following the decline of the Anuradhapura Kingdom, Polonnaruwa emerged as the capital of a new empire. With the Anuradhapura Kingdom weakened by Chola invasions, King Vijayabahu chose Polonnaruwa as the new seat of power. The city had already been developed by previous rulers, making it a logical choice for the capital. Despite facing internal strife, notable rulers like King Vijayabahu and King Parakramabahu I contributed significantly to Polonnaruwa's legacy, enriching its heritage with their accomplishments. However, the kingdom eventually succumbed to internal conflicts and external invasions, leading to its eventual demise.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN POLONNARUWA </h3>
              <p class="content-paragraph">Polonnaruwa boasts an array of attractions that showcase the artistry and architectural prowess of its ancient inhabitants. From grand religious monuments to intricate sculptures, visitors can immerse themselves in the city's rich cultural tapestry.</p>

              <h4 class="content-destination-tittle">Gal Vihara</h4>
              <p class="content-paragraph">Dating back to the reign of King Parakramabahu I, Gal Vihara is a marvel of ancient craftsmanship. Carved from granite, the site features exquisite representations of Lord Buddha in various poses, including reclining, standing, and seated. Additionally, visitors can admire inscriptions detailing a code of conduct aimed at purifying the Buddhist clergy, adding a layer of historical significance to this sacred site.</p>

              <h4 class="content-destination-tittle">Vatadage</h4>
              <p class="content-paragraph">Constructed during the reigns of King Parakramabahu and King Nishankamalla, the Vatadage serves as a protective enclosure for the stupa within. Intricately designed Moonstones, or Sankada Pahana, adorn the entrance, showcasing the city's architectural finesse and attention to detail.</p>

              <h4 class="content-destination-tittle">Statue of King Parakramabahu I</h4>
              <p class="content-paragraph">As a tribute to one of Polonnaruwa's greatest rulers, the Statue of King Parakramabahu I stands as a symbol of his magnificence and leadership. Erected during his reign, this well-preserved statue offers a glimpse into the grandeur of ancient times, captivating visitors with its historical significance.</p>

              <h4 class="content-destination-tittle">Kumara Pokuna</h4>
              <p class="content-paragraph">As a tribute to one of Polonnaruwa's greatest rulers, the Statue of King Parakramabahu I stands as a symbol of his magnificence and leadership. Erected during his reign, this well-preserved statue offers a glimpse into the grandeur of ancient times, captivating visitors with its historical significance.</p>

              <h4 class="content-destination-tittle">Medirigiri Vatadage</h4>
              <p class="content-paragraph">Built during the Anuradhapura era, the Medirigiri Vatadage exemplifies the city's continuous development under successive rulers. Housing a massive reclining Buddha statue, this monument serves as a testament to Polonnaruwa's religious and cultural significance, captivating international travelers with its historical and architectural splendor.</p>
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