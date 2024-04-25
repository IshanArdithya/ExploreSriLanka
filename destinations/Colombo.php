<?php
$cityCondition = "'Colombo'";
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


  <title>Colombo | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide12.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Colombo</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Colombo</h1>
      <p class="lead mini-lead">Sri Lanka’s Commercial Capital. Home to nearly six million people, the commercial capital of Sri Lanka, Colombo is an intriguing metropolis. Considered to be the cultural hub of the country, Colombo encapsulates its visitors with its history and evolving cityscape.
      </p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/colombo.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Colombooo.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/colomboo.jpg" alt="destination_image"> </div>


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

              <p class="content-paragraph">With a history spanning over two millennia, Colombo stands as a testament to the island's rich and diverse heritage. Originally referred to as 'Kalanpu' by the famed traveler Ibn Battuta, the city's modern name is believed to have originated from 'Kolon Thota,' signifying its role as a port on the Kelani River. Throughout history, Colombo's natural harbor and strategic location made it a crucial hub for trade along the East-West sea routes. This significance attracted the attention of colonial powers, including the Portuguese, Dutch, and English, each leaving their indelible mark on the city's cultural landscape. From the Portuguese establishment of Colombo as a strategic stronghold to the Dutch monopolization of cinnamon lands, and finally, the British declaration of Colombo as the capital of Ceylon, the city's history reflects a tapestry of colonial influences and indigenous resilience. In 1978, Colombo was officially recognized as the commercial capital of Sri Lanka, solidifying its status as a vibrant economic center in the region.</p>

              <p class="content-paragraph"> </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN COLOMBO</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">National Museum of Colombo</h4>
              <p class="content-paragraph">Immerse yourself in the rich tapestry of Sri Lanka's history at the National Museum of Colombo. Home to over 2,500 years of cultural heritage, this iconic institution boasts a vast collection of artifacts, including regalia, relics, and even the skeletal remains of a Blue Whale Bone. From ancient artifacts to colonial-era treasures, the National Museum offers a comprehensive journey through the island's fascinating past.</p>

              <h4 class="content-destination-tittle">Colombo Dutch Museum</h4>
              <p class="content-paragraph">Step back in time at the Colombo Dutch Museum, housed within the former residence of Dutch Governor Thomas van Rhee. Located on Prince Street in Pettah, this museum showcases a diverse array of artifacts from the Dutch colonial period, including weaponry, currency, and traditional attire. Explore the meticulously landscaped gardens and immerse yourself in the captivating history of Dutch influence in Sri Lanka.</p>

              <h4 class="content-destination-tittle">Kelaniya Raja Maha Vihara</h4>
              <p class="content-paragraph">Journey to the ancient town of Kelaniya and discover the sacred Kelaniya Raja Maha Vihara, a revered Buddhist temple with roots dating back to 500 BCE. Legend has it that the temple was consecrated during Lord Buddha's third and final visit to Sri Lanka, making it a site of immense religious significance. Adorned with intricate murals depicting scenes from the Buddha's life, the Kelaniya temple stands as a testament to Sri Lanka's enduring Buddhist heritage.</p>

              <h4 class="content-destination-tittle">St. Lucia Cathedral</h4>
              <p class="content-paragraph">Experience the grandeur of Sri Lanka's oldest and largest cathedral at St. Lucia Cathedral in Kotahena, Colombo. Admire the cathedral's remarkable architecture and spacious interior, adorned with sculptures of saints and altars crafted from exquisite white marble. Whether you're a devout worshiper or an admirer of architectural beauty, St. Lucia Cathedral offers a captivating glimpse into Colombo's religious and cultural heritage.</p>

              <h4 class="content-destination-tittle">Gangaramaya Temple</h4>
              <p class="content-paragraph">Discover the spiritual oasis of Gangaramaya Temple, one of Colombo's most prominent religious sites. More than just a place of worship, Gangaramaya Temple serves as a center for learning and philanthropy, with an orphanage and an exclusive collection of religious artifacts. Explore the temple's serene surroundings and marvel at its intricate architecture, offering a serene retreat amidst the bustling cityscape.</p>

              <h4 class="content-destination-tittle">Viharamahadevi Park</h4>
              <p class="content-paragraph">Escape to the lush tranquility of Viharamahadevi Park, a verdant oasis in the heart of Colombo. Originally known as Victoria Park during the British colonial era, this sprawling green space is one of the oldest and largest parks in Sri Lanka. Named in honor of Queen Viharamahadevi, the mother of King Dutugemunu, the park offers a serene respite from the urban hustle and bustle, with scenic pathways, landscaped gardens, and tranquil lakeshores awaiting exploration.</p>
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
                    echo '<img src="../' . $image_location . '" alt="destination_image">';
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


    <div class="owl-carousel owl-theme destinations-images">
      <a href="Tangalle.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/tangallee.jpg" alt="destination_image"> <h2>Tangalle</h2> </div> </a>
      <a href="Unawatuna.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/Unawatuna.jpg" alt="destination_image"> <h2>Unawatuna</h2> </div> </a>
      <a href="weligamaa.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/weligamaa.jpg" alt="destination_image"> <h2>weligamaa</h2> </div> </a>
      <a href="Dabulla.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/Dambulla.jpg" alt="destination_image"> <h2>Dambulla</h2> </div> </a>
      <a href="Kalpitiya.php"> <div class="owl-caousel-item">  <img src="../destinations/Images/kalpitiyamain.jpg" alt="destination_image"> <h2>Kalpitiya</h2> </div> </a>
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