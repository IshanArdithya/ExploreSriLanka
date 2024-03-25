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
        <li class="active">Coastal Escape Retreat</li>
      </ol>
    </div>

    <!-- Heading -->
    <h1 class="mini-heading" style="margin-top: 20px;">Coastal Escape Retreat</h1>
    <p class="lead mini-lead">Experience the tranquility of Sri Lanka's coastal beauty with our exclusive "Coastal Escape Retreat" package. Immerse yourself in the serene atmosphere of picturesque coastal towns and pristine beaches as you embark on a journey of relaxation and seaside adventures. Indulge in the warm embrace of golden sands and the soothing melody of azure waters that stretch as far as the eye can see. Whether you're seeking a romantic getaway, a family vacation, or a solo retreat, our package offers the perfect blend of luxury, comfort, and exploration. Explore the vibrant local culture, savor delicious seafood delicacies, and witness breathtaking sunsets painting the horizon with hues of orange and pink. From thrilling water sports to leisurely strolls along palm-fringed shores, there's something for everyone to enjoy.</p>



    <!-- Content -->

    <div class="owl-carousel owl-theme" id="owl1">
    <div class="owl-caousel-item"> <img src="./Images/escape8.jpeg" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape9.jpeg" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape6.webp" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape10.jpeg" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape4.jpeg" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape5.webp" alt=""> </div>
    <div class="owl-caousel-item"> <img src="./Images/escape7.avif" alt=""> </div>
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
                <h4 class="content-destination-tittle">Duration: 3 days / 2 nights</h4>
                <h4 class="content-destination-tittle">City: Unawatuna</h4>
                <h4 class="content-destination-tittle">Number of Persons: 8 Persons</h4>

                <p class="content-destination-tittle">
                  Experience serenity by the sea with our "Coastal Escape Retreat" package. Immerse yourself in the tranquil beauty of Sri Lanka's stunning coastal towns and beaches, where golden sands stretch as far as the eye can see and azure waters gently lap against the shore. Indulge in leisurely strolls along the palm-fringed coastline, bask in the warm tropical sunshine, and rejuvenate your senses with refreshing dips in the crystal-clear ocean. Whether you seek peaceful solitude or thrilling water sports, our Coastal Escape Retreat promises an unforgettable seaside getaway that will leave you feeling refreshed, rejuvenated, and utterly enchanted.</p>
                <h3 class="content-destination-tittle">Places to Visit:</h3>
                <ul class="package-main-list">

                  <li>Day 1: Arrival in Unawatuna
                    <ul class="package-list">
                      <li>Welcome to Unawatuna! Your adventure begins as our professional guides pick you up from your designated location. Sit back, relax, and enjoy a comfortable journey to your accommodation in Unawatuna, where you'll check-in and unwind before the excitement of your expedition unfolds.</li>
                      <li>Explore the charming streets of Unawatuna village, browsing local shops for souvenirs and handicrafts.</li>
                      <li>Experience a traditional Sri Lankan live music and cultural performances.</li>
                    </ul>
                  </li>
                  <li>Day 2: Beach Day and Water Activities
                    <ul class="package-list">
                      <li>Relax on the beach and enjoy water sports like surfing, snorkeling, and jet skiing.</li>
                      <li>Take a boat trip to explore nearby coral reefs and go snorkeling to witness colorful marine life.</li>
                      <li>Join a local fisherman for a traditional stilt fishing experience, learning about this unique fishing method.</li>
                      <li>Embark on a guided kayaking tour along the scenic coastline, exploring hidden coves and mangrove forests.</li>
                    </ul>
                  </li>
                  <li>Day 3: Adventure and Nature Exploration
                    <ul class="package-list">
                      <li>Visit the Yatagala Raja Maha Viharaya, an ancient Buddhist temple nestled amidst lush greenery, and admire its intricate carvings and statues.</li>
                      <li>Take a day trip to Galle Fort, a UNESCO World Heritage Site, and explore its historic ramparts, museums, and boutique shops.</li>
                      <li>Relax with a rejuvenating spa treatment at a luxury resort, indulging in traditional Ayurvedic therapies and massages.</li>
                      <li>As your expedition comes to a close, our team will arrange for your comfortable transportation to your departure point, ensuring a seamless conclusion to your unforgettable journey through Unawatuna.</li>
                    </ul>
                  </li>
                </ul>

                <h3 class="content-destination-tittle">Price: LKR 45,000</h3>

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
      <div class="owl-caousel-item"> <img src="../Images/slide1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide1.jpg" alt=""> </div>

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