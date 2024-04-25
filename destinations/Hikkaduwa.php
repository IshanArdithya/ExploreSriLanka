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


  <title>Hikkaduwa | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
    <img src="./Images/slide17.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Destinations</a></li>
        <li class="active">Hikkaduwa</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Hikkaduwa</h1>
      <p class="lead mini-lead">Nestled along the southwestern coast of Sri Lanka, Hikkaduwa beckons travelers with its golden sands and azure waters, offering a quintessential beach getaway just a two-hour drive from Colombo. Renowned as one of Sri Lanka's most beloved holiday destinations, this vibrant coastal town exudes a laid-back charm that captivates visitors from near and far.</p>
    </div>

    <!-- Content -->



    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/hikkaduwa.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/hikkaduwamain.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/bentota-beach.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissaa.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Densely populated with a mix of locals and tourists, Hikkaduwa buzzes with activity along its main road, where a colorful array of shops, eateries, and accommodations cater to every traveler's need. From budget-friendly guesthouses to luxurious resorts, there's lodging to suit every budget and preference, ensuring a comfortable stay amidst the tropical splendor.</p>

              <p class="content-paragraph"> The bustling streets of Hikkaduwa offer a shopping haven, with vendors selling everything from beachwear and sarongs to exquisite jewelry crafted from silver and gold adorned with precious stones. Food enthusiasts will delight in the diverse culinary scene, with numerous cafes and restaurants serving up delectable seafood, Western favorites, and local specialties like the irresistible "roti" – a savory flatbread stuffed with cheese and your choice of meat or seafood.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN HIKKADUWA</h3>
              <p class="content-paragraph">While Hikkaduwa's beaches alone provide ample entertainment, the town boasts several attractions that offer unique experiences and insights into Sri Lanka's natural beauty and cultural heritage.</p>

              <h4 class="content-destination-tittle">Hikkaduwa Marine National Park</h4>
              <p class="content-paragraph">Just steps away from Hikkaduwa Beach lies the Hikkaduwa Marine National Park, a haven for marine life enthusiasts. Snorkelers can rent gear and explore the vibrant coral reefs teeming with exotic fish, or opt for a glass-bottom boat ride for a glimpse of the underwater wonders without getting wet.</p>

              <h4 class="content-destination-tittle">The Sea Turtle Hatchery</h4>
              <p class="content-paragraph">Located north of the railway station, the Sea Turtle Hatchery rescues and rehabilitates endangered sea turtles, providing visitors with the opportunity to learn about these magnificent creatures and even interact with them under the guidance of trained staff.</p>

              <h4 class="content-destination-tittle">Seengama Muhudu Maha Viharaya</h4>
              <p class="content-paragraph">Located north of the railway station, the Sea Turtle Hatchery rescues and rehabilitates endangered sea turtles, providing visitors with the opportunity to learn about these magnificent creatures and even interact with them under the guidance of trained staff.</p>

              <h4 class="content-destination-tittle">Naga Vihara</h4>
              <p class="content-paragraph">Immerse yourself in serenity at Naga Vihara, a tranquil temple adorned with intricate sculptures and revered Buddhist relics. Wander through the temple grounds, adorned with lush greenery and serene courtyards, and admire the enigmatic beauty of the sleeping Buddha and other sacred artifacts.</p>

              <h4 class="content-destination-tittle">Tsunami Community Museum</h4>
              <p class="content-paragraph">For a sobering yet educational experience, visit the Tsunami Community Museum, which commemorates the devastating impact of the 2004 Indian Ocean tsunami. Through poignant exhibits and graphic imagery, visitors gain insight into the resilience of the local community and the importance of disaster preparedness and recovery efforts.</p>
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
      <a href="Pasikudahnew.php"><div class="owl-caousel-item ">  <img src="../destinations/Images/pasikudah.jpg" alt="destination_image"> <h2>pasikudah</h2></div></a>

      <a href="Bentota.php"><div class="owl-caousel-item  ">  <img src="../destinations/Images/bentota-beach.jpg" alt="destination_image"><h2>Bentota</h2> </div></a>

      <a href="Batticaloa.php"><div class="owl-caousel-item ">  <img src="../destinations/Images/Batticaloaa.png" alt="destination_image"><h2>Batticaloa</h2> </div></a>

      <a href="Beruwala.php"><div class="owl-caousel-item ">  <img src="../destinations/Images/Trincomaleeee.jpg" alt="destination_image"><h2>Beruwala</h2> </div></a>

      <a href="Trincomalee.php"><div class="owl-caousel-item ">  <img src="../destinations/Images/tangallee.jpg" alt="destination_image"> <h2>Trincomalee</h2></div></a>
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