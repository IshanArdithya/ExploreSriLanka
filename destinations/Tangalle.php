<?php
$cityCondition = "'Hambantota'";
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


  <title>Tangalle | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide10.jpg" alt="destination_image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Tangalle</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Tangalle</h1>
      <p class="lead mini-lead">Nestled along the coastal district of Hambantota in Sri Lanka, Tangalle exudes an enigmatic charm that draws travelers seeking serenity and relaxation. With its unique beaches and tranquil ambiance, Tangalle stands as a sanctuary for both residents and international visitors. As one of the largest cities in the South, Tangalle offers a captivating blend of culture, history, and natural beauty.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/Tangalle.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/tangallee.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/colomboo.jpg" alt="destination_image"> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatun&aaa.jpg" alt="destination_image"> </div>
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

              <p class="content-paragraph">Tangalle, deriving its name from the Sinhala words "Ran" meaning gold and "Gala" meaning stone, boasts a rich history steeped in myth and legend. Its strategic importance has been highlighted throughout the ages, with European colonial powers utilizing it as a key base for trade. Today, Tangalle's economic focus revolves around its port and thriving fisheries industry. Over the past few decades, it has emerged as a premier holiday destination, attracting globe-trotters seeking respite on its golden beaches.</p>

              <p class="content-paragraph">The history of Tangalle is as captivating as its scenic beauty. Legend has it that the city derived its name from a rock that turned into gold after a man of pious belief sat on it to have his meal. Throughout the centuries, Tangalle has played a crucial role in trade and commerce, serving as a vital base for European colonial powers. Today, it continues to thrive as a hub of economic activity, with its port contributing significantly to the country's fisheries industry. </p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN TANGALLE</h3>
              <p class="content-paragraph">While Tangalle is known for its tranquil beaches and laid-back atmosphere, it also offers a plethora of attractions for visitors to explore and enjoy.</p>

              <h4 class="content-destination-tittle">Mulkirigala Raja Maha Vihara</h4>
              <p class="content-paragraph">Dating back to the Anuradhapura era, the Mulkirigala Raja Maha Vihara is an ancient temple perched atop a rock over 600 meters above sea level. Featuring several shrines, this architectural marvel is a must-visit for culture enthusiasts and adventurous trekkers alike.</p>

              <h4 class="content-destination-tittle">Hummanaya</h4>
              <p class="content-paragraph">As the second-largest blowhole in the world, Hummanaya is a natural wonder that never fails to impress visitors. Named for the distinctive "Hoo" sound it emits when expelling water, this geological marvel offers a mesmerizing display of nature's power.</p>

              <h4 class="content-destination-tittle">Dutch Architecture</h4>
              <p class="content-paragraph">Explore Tangalle's colonial past through its Dutch architecture, exemplified by structures like the Dutch Fort and courthouse. While the Dutch Fort now serves as a prison, it remains a fascinating glimpse into Tangalle's colonial heritage.</p>

              <h4 class="content-destination-tittle">Wevurukannala Viharaya</h4>
              <p class="content-paragraph">Located in nearby Dickwella, the Wevurukannala Viharaya boasts the largest seated Lord Buddha statue in Sri Lanka. Visitors can marvel at this impressive statue and explore the temple's eight-story building adorned with vibrant paintings and murals.</p>

              <h4 class="content-destination-tittle">Turtle Sanctuary</h4>
              <p class="content-paragraph">For nature lovers, a visit to the Turtle Sanctuary in the nearby region of Rekawa is a must. Operated by a non-profit organization and locals, the sanctuary provides a haven for various turtle species, including Green Turtles, Loggerhead Turtles, and Hawksbill Turtles. It's a delightful experience for anyone interested in wildlife conservation and appreciation.</p>
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