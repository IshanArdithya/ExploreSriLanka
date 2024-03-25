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


  <title>About - Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
    <!-- <h1 class="headings sub-heading">Wildlife Adventure</h1>
        <h2 class="heading-normal-txt-mini">Tours</h2> -->
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Tours</a></li>
        <li class="active">Ancient Cities Exploration</li>
      </ol>
    </div>

    <!-- Heading -->
    <h1 class="mini-heading" style="margin-top: 20px;">Ancient Cities Exploration</h1>
    <p class="lead mini-lead">Step back in time and immerse yourself in the grandeur of Sri Lanka's ancient city of Anuradhapura with our "Ancient Cities Exploration" package. Embark on a journey through centuries of history as you explore the remnants of a once-glorious civilization, where echoes of bygone eras resonate through magnificent ruins, sacred temples, and royal palaces. Traverse the storied pathways of Anuradhapura, once the thriving capital of ancient Sri Lanka, and marvel at the architectural wonders and cultural treasures that stand testament to its rich heritage. Wander through sprawling complexes adorned with intricately carved stone monuments, towering stupas, and serene reservoirs, each bearing witness to the city's illustrious past. With our Ancient Cities Exploration package, you'll delve deep into the heart of Sri Lanka's history, forging a profound connection with the island's cultural legacy as you uncover the secrets of Anuradhapura's majestic past.</p>



    <!-- Content -->

    <div class="owl-carousel owl-theme" id="owl1">
      <div class="owl-caousel-item"> <img src="./Images/ancient2.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ancient3.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ancient4.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ancient5.webp" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ancient6.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ancient7.avif" alt=""> </div>
 </div>


    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab2">Hotel</a></li>
            <li><a href="#tab3">Tour Guide</a></li>
            <!-- <li><a href="#tab4">Pricing</a></li> -->
          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">
              </div>
              <div class="text-content">
                <h4 class="content-destination-tittle"> Duration: 3 days / 2 nights</h4>
                <h4 class="content-destination-tittle">City: Anuradhapura</h4>
                <h4 class="content-destination-tittle">Number of Persons: 6 Persons</h4>

                <p class="content-destination-tittle">
                  Step back in time and embark on a journey of discovery with our "Ancient Cities Exploration" package. Immerse yourself in the captivating allure of Sri Lanka's ancient city of Anuradhapura, where echoes of bygone eras resonate through magnificent ruins, sacred temples, and majestic palaces. Traverse the ancient pathways of Anuradhapura, once a glorious capital of ancient Sri Lanka, and marvel at the towering stupas, intricately carved stone monuments, and sacred relics that stand testament to its rich Buddhist heritage. Experience the spiritual serenity of sacred sites like the Ruwanwelisaya and Jetavanaramaya, where centuries-old traditions continue to thrive amidst timeless architectural marvels. With our Ancient Cities Exploration package, you'll embark on a fascinating voyage through time, uncovering the secrets of Anuradhapura's storied past and forging unforgettable memories along the way.</p>


                <h3 class="content-destination-tittle">Places Visit:</h3>
                <ul class="package-main-list">

                  <li>Day 1: Arrival in Anuradhapura
                    <ul class="package-list">
                      <li>Welcome to Anuradhapura! Your journey begins as our professional guides warmly greet you at your designated location. Sit back, relax, and embark on a comfortable journey to your accommodation in Anuradhapura, where you'll check-in and unwind before the excitement of your expedition unfolds.</li>
                      <li>Visit iconic sites including the Ruwanwelisaya, Abhayagiriya and Jetavanaramaya.</li>
                    </ul>
                  </li>

                  <li>Day 2: Arrival in Anuradhapura
                    <ul class="package-list">
                      <li>Breakfast at the hotel.</li>
                      <li>Continue exploring Anuradhapura with visits to other significant sites such as the Jaya Sri Maha Bodhi, Thuparamaya, and Mirisawetiya Stupa , Isurumuniya Temple, Lankaramaya, Samadhi Buddha Statue, Kuttam Pokuna (Twin Ponds), Magul Uyana, Eth Pokuna (Elephant Pond)</li>
                      <li>Explore the ancient monasteries and museum.</li>
                      <li>Return to the hotel for relaxation.</li>
                    </ul>

                  </li>


                  <li>Day 3: Depature <ul class="package-list">
                      <li>Check-out from the hotel after breakfast, cherishing the final moments in the tranquil surroundings of Anuradhapura.</li>
                      <li>As your expedition comes to a close, our team will arrange for your comfortable transportation to your departure point, ensuring a seamless conclusion to your unforgettable journey through Anuradhapura.</li>
                    </ul>
                  </li>

                </ul>

                <h3 class="content-destination-tittle">Price: LKR 60,000</h3>

              </div>
            </div>
          </div>
        </div>
        <div id="tab2" class="item" data-title="Hotel">
          <div class="item-content">
            <div class="itinerary-content">

              <?php
              require_once '../config.php';
              $conn = mysqli_connect($hostname, $username, $password, $database);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT name, short_desc, hotel_picture FROM hotels WHERE city IN ('Kandy', 'Colombo')";
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
                  echo '<p class="content-paragraph">Read more</p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No hotels found in Kandy.";
              }

              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>
        <div id="tab3" class="item" data-title="Tour Guides">
          <div class="item-content">
            <div class="itinerary-content">

              <?php
              require_once '../config.php';
              $conn = mysqli_connect($hostname, $username, $password, $database);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT full_name, picture, specialty, short_desc, experience FROM tourguide WHERE city IN ('Kandy', 'Colombo')";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="tourguide-image-container">';
                  $image_location = $row['picture'];
                  echo '<img src="../' . $image_location . '" alt="">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
                  echo '<p class="content-paragraph"><b>Specialty: </b>' . $row['specialty'] . '</p>';
                  echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                  echo '<p class="content-paragraph"><b>Years of Experience: </b>' . $row['experience'] . ' Years</p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No tourguides found.";
              }

              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>


      </div>
    </div>


    <h1 class="headings">Related <span>Packages</span></h1>

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>

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
  <script src="../js/script.js"></script>

  <script>
    $(document).ready(function() {
      $('#owl1').owlCarousel({
        items: 4,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });

      $('#owl1').owlCarousel({
        items: 3,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });
    });
  </script>
</body>

</html>